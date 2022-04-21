<?php

	acf_register_block(array(
		'name' => 'subtitle_block',
		'title' => 'Subtitle',
		'description' => 'A block to display a large page subtitle',
		'render_template' => get_theme_file_path('/blocks/subtitle.php'),
	));

?>