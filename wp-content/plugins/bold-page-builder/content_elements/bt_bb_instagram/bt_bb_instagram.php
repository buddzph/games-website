<?php

class bt_bb_instagram extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'number'       	=> '',
			'columns'      	=> '',
			'gap'      		=> '',
			'hashtag'      	=> '',
			'client_id'    	=> '',
			'access_token' 	=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}
		
		$resolution = 'standard_resolution';
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
			ob_start();
			the_widget( 'BB_Instagram', array( 'number' => $number, 'resolution' => $resolution, 'hashtag' => $hashtag, 'client_id' => $client_id, 'access_token' => $access_token ) );
			$output .= ob_get_contents();
			ob_end_clean();
		$output .= '</div>';

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => __( 'Instagram', 'bold-builder' ), 'description' => __( 'Instagram photos', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => __( 'Number of photos', 'bold-builder' ), 'preview' => true ),
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
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'default' => 'small', 'heading' => __( 'Gap', 'bold-builder' ),
					'value' => array(
						__( 'No gap', 'bold-builder' ) => 'no_gap',
						__( 'Extra small', 'bold-builder' ) => 'extrasmall',
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large'
					)
				),
				array( 'param_name' => 'hashtag', 'type' => 'textfield', 'heading' => __( 'Hashtag', 'bold-builder' ) ),
				array( 'param_name' => 'client_id', 'type' => 'textfield', 'heading' => __( 'Client ID', 'bold-builder' ) ),
				array( 'param_name' => 'access_token', 'type' => 'textfield', 'heading' => __( 'Access token', 'bold-builder' ) )			
			) )
		);
	}
}