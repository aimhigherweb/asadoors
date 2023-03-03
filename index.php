<?php
/**
 * The main template file
 *
 *
 * @package ASA Flexible Doors
 * @version 1.0
 */

	if($wp_query->query['post_type'] == 'casestudies') {
		get_template_part(
			'partials/layout', 
			null, 
			array(
				'template' => 'casestudy'
			)
		);
	}
	else {
		get_template_part('partials/layout');
	}
 

	

?>
