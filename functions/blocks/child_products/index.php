<?php

acf_register_block(array(
	'name' => 'child_products_block',
	'title' => 'Child Products',
	'description' => 'A block to display child products',
	'render_template' => get_theme_file_path('/blocks/child_products.php'),
));

?>