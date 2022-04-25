<?php

	$subtitle = get_field('subtitle');

	$title_classes = [];
	
	if(get_field('hidden_title')) {
		array_push($title_classes, 'sr-only');
	}

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

<h1
	classes="<?php echo classes($title_classes); ?>"
>
	<?php echo get_the_title(); ?>
</h1>

<?php ?>


<?php if(check_field_value([$subtitle])): ?>

	<p class="subtitle"><?php echo $subtitle; ?></p>

<?php endif; ?>

<div class="content">
	<?php echo the_content(); ?>
</div>