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

	$title_classes = [$styles['title']];
	
	if(get_field('hidden_title')) {
		array_push($title_classes, $styles['hidden_title']);
	}

	if(check_field_value([$subtitle])) {
		array_push($title_classes, $styles['has_subtitle']);
	}

?>

<h1
	class="<?php echo classes($title_classes); ?>"
>
	<?php echo get_the_title(); ?>
</h1>

<?php ?>


<?php if(check_field_value([$subtitle])): ?>

	<p class="<?php echo classes([$styles['subtitle']]); ?>"><?php echo $subtitle; ?></p>

<?php endif; ?>

<div class="<?php echo classes([$styles['content']]); ?>">
	<?php echo the_content(); ?>
</div>