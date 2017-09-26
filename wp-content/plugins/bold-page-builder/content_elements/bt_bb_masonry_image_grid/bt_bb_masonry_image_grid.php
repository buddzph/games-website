<?php

class bt_bb_masonry_image_grid extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'images'      => '',
			'columns'     => '',
			'format'      => '',
			'gap'         => '',
			'no_lightbox' => ''
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script( 'jquery-masonry' );

		wp_enqueue_script( 
			'bt_bb_image_grid',
			plugin_dir_url( __FILE__ ) . 'bt_bb_masonry_image_grid.js',
			array( 'jquery' )
		);

		$class = array( $this->shortcode, 'bt_bb_grid_container' );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}	

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}

		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}

		if ( $no_lightbox == 'no_lightbox' ) {
			$class[] = $this->prefix . 'no_lightbox';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '';
		
		$output .= '<div class="bt_bb_grid_sizer"></div>';

		$images_arr = explode( ',', $images );
		$format_arr = explode( ',', $format );
		
		$n = 0;

		foreach( $images_arr as $id ) {
			$img = wp_get_attachment_image_src( $id, 'large' );
			$img_src = $img[0];
			$img_full = wp_get_attachment_image_src( $id, 'full' );
			$img_src_full = $img_full[0];			
			$image_post = get_post( $id );
			if ( isset( $format_arr[ $n ] ) ) {
				$tile_format = 'bt_bb_tile_format';
				if ( $format_arr[ $n ] == '21' ) {
					$tile_format .= "_" . $format_arr[ $n ];
				} else {
					$tile_format .= '11';
				}
			}
			$output .= '<div class="bt_bb_grid_item ' . $tile_format . '" data-hw="' . ( $img[2] / $img[1] ) . '" data-src="' . $img_src . '" data-src-full="' . $img_src_full . '" data-title="' . $image_post->post_title . '"><div class="bt_bb_grid_item_inner" data-hw="' . ( $img[2] / $img[1] ) . '" ><div class="bt_bb_grid_item_inner_image"></div><div class="bt_bb_grid_item_inner_content"></div></div></div>';
			$n++;
		}

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-columns="' . $columns . '"><div class="bt_bb_masonry_post_image_content" data-columns="' . $columns . '">' . $output . '</div></div>';

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => __( 'Masonry Image Grid', 'bold-builder' ), 'description' => __( 'Masonry grid with images', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'images', 'type' => 'attach_images', 'heading' => __( 'Images', 'bold-builder' ) ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'heading' => __( 'Columns', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( '1', 'bold-builder' ) => '1',
						__( '2', 'bold-builder' ) => '2',
						__( '3', 'bold-builder' ) => '3',
						__( '4', 'bold-builder' ) => '4',
						__( '5', 'bold-builder' ) => '5',
						__( '6', 'bold-builder' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => __( 'Gap', 'bold-builder' ),
					'value' => array(
						__( 'No gap', 'bold-builder' ) => 'no_gap',
						__( 'Extra small', 'bold-builder' ) => 'extrasmall',
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large'
					)
				),
				array( 'param_name' => 'format', 'type' => 'textfield', 'preview' => true, 'heading' => __( 'Tiles format', 'bold-builder' ), 'description' => __( 'e.g. 21, 11, 11' ) ),
				array( 'param_name' => 'no_lightbox', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'no_lightbox', __( 'No', 'bold-builder' ) => 'hide_share' ), 'heading' => __( 'Disable lightbox', 'bold-builder' ) )
			)
		) );
	} 
}