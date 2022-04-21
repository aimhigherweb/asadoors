<?php

	function my_acf_init() {
		global $blocks;

		if(function_exists('acf_register_block')) {

			foreach ($blocks as $block) {

				require_once(__DIR__ . '/' . $block . '/index.php');
				
			}
			
		}
	}
	add_action('acf/init', 'my_acf_init');


	if( function_exists('acf_add_local_field_group') ) {

		foreach ($blocks as $block) {

			require_once(__DIR__ . '/' . $block . '/acf.php');
			
		}

	}

?>