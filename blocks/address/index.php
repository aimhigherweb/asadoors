<?php
/**
 * Block Name: Address Block
 * 
 */
	$address = get_field('address', 'option');

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

<div class="<?php echo classes([$styles['block']]); ?>">
	<?php get_template_part('parts/contact/index'); ?>

	<?php if(check_field_value([$address, $address['line_1']])): ?>

		<h2><?php echo get_bloginfo('name'); ?></h2>

		<address>
			<?php echo $address['line_1']; ?><br/>
			<?php if($address['line_2']) : ?>
				<?php echo $address['line_2']; ?><br/>
			<?php endif; ?>
			<span>
				<?php echo $address['suburb']; ?>
				<?php echo $address['state']; ?>
				<?php echo $address['post_code']; ?>
			</span>
		</address>

	<?php endif; ?>

</div>