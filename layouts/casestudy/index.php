<?php

	$subtitle = get_field('subtitle');

	$data = fetch_styles(__DIR__);
	
	$template = $data['template'];
	$styles = $data['styles'];
	
	get_template_part(
		'parts/modules',
		null,
		array(
			'name' => $template,
			'dir' => __DIR__,
			'env' => 'dev'
		)
	);

?>


<p class="<?php echo classes([$styles['subtitle']]); ?>">Case Study</p>

<h1>
	<?php echo get_the_title(); ?>
</h1>

<?php ?>

<div class="<?php echo classes([$styles['content']]); ?>">
	<?php echo the_content(); ?>
</div>