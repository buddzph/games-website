<?php

class bt_bb_countdown extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'datetime'        => '',
			'size'            => '',
			'hide_indication' => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode, 'btCounterHolder' );

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

		$class[] = $size;

		$datetime = sanitize_text_field( $datetime );
		
		$target = strtotime( $datetime );
		$now = strtotime( 'now' );
		
		$init_seconds = $target - $now;
		if ( $init_seconds < 0 ) {
			$init_seconds = 0;
		}
		
		$d_text = __( 'Days', 'bold-builder' );
		$h_text = __( 'Hours', 'bold-builder' );
		$m_text = __( 'Minutes', 'bold-builder' );
		$s_text = __( 'Seconds', 'bold-builder' );
		
		if ( $hide_indication == 'yes' ) {
			$d_text = '';
			$h_text = '';
			$m_text = '';
			$s_text = '';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
			$output .= '<div class="btCountdownHolder" data-init-seconds="' . $init_seconds . '">';
							
				$output .= '<span class="days" data-text="' . $d_text . '"></span>';
				
				$output .= '<span class="hours"><span class="n0"><span></span><span></span></span><span class="n1"><span></span><span></span></span><span class="hours_text"><span>' . $h_text . '</span></span></span>';
				
				$output .= '<span class="minutes"><span class="n0"><span></span><span></span></span><span class="n1"><span></span><span></span></span><span class="minutes_text"><span>' . $m_text . '</span></span></span>';
				
				$output .= '<span class="seconds"><span class="n0"><span></span><span></span></span><span class="n1"><span></span><span></span></span><span class="seconds_text"><span>' . $s_text . '</span></span></span>';
			$output .= '</div>';
		$output .= '</div>';
			
		return $output;
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => __( 'Countdown', 'bold-builder' ), 'description' => __( 'Animated countdown', 'bold-builder' ),  
			'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'datetime', 'type' => 'textfield', 'heading' => __( 'Target date and time', 'bold-builder' ), 'description' => __( 'YY-mm-dd HH:mm:ss, e.g. 2017-02-22 22:45:00' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => __( 'Size', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'Normal', 'bold-builder' ) => 'btCounterNormalSize',
						__( 'Large', 'bold-builder' ) => 'btCounterLargeSize'
				) ),
				array( 'param_name' => 'hide_indication', 'type' => 'dropdown', 'heading' => __( 'Hide indication', 'bold-builder' ), 'description' => __( 'Hide indication of days, hours, minutes and seconds', 'bold-builder' ),
					'value' => array(
						__( 'No', 'bold-builder' ) => 'no',
						__( 'Yes', 'bold-builder' ) => 'yes'
				) )
			) 
		) );

	}
}