<?php

	function my_acf_init() {
		if(function_exists('acf_register_block')) {
			acf_register_block(array(
				'name' => 'address_block',
				'title' => 'Address Block',
				'description' => 'A block to display the office address on the page',
				'render_callback' => 'address_block_render_callback',
				'category' => 'design',
				'icon' => 'location',
			));

			acf_register_block(array(
				'name' => 'subtitle_block',
				'title' => 'Subtitle',
				'description' => 'A block to display a large page subtitle',
				'render_callback' => 'subtitle_block_render_callback',
			));
		}
	}
	add_action('acf/init', 'my_acf_init');

	function address_block_render_callback($block) {
		include(get_theme_file_path('/blocks/address.php'));
	}

	function subtitle_block_render_callback($block) {
		include(get_theme_file_path('/blocks/subtitle.php'));
	}
?>
