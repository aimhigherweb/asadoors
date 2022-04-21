<?php

	acf_register_block(array(
		'name' => 'address_block',
		'title' => 'Address Block',
		'description' => 'A block to display the office address on the page',
		'render_template' => get_theme_file_path('/blocks/address.php'),
		'category' => 'design',
		'icon' => 'location',
	));

?>