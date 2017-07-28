<?php

class bt_bb_tab_item extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {	
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'title'  => ''
		) ), $atts, $this->shortcode ) );
		
		$output = '';
		
		$output1 = '<li><span>' . $title . '</span></li>';

		$output2 = '<div class="bt_bb_tab_item">
			<div class="bt_bb_tab_content">' . wptexturize( do_shortcode( $content ) ) . '</div>
		</div>';
		
		$output .= $output1 . '%$%' . $output2 . '%$%';
		
		return $output;

	}
	
	function add_params() {
		// removes default params from BT_BB_Element
	}	

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => __( 'Tab', 'bold-builder' ), 'description' => __( 'Tab item', 'bold-builder' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tabs' => false, 'bt_bb_accordion' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'accept_all' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => __( 'Title', 'bold-builder' ), 'preview' => true )			
			)
		) );
	}
}