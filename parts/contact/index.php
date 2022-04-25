<?php
	$address = get_field('address', 'option');
	$phone = get_field('phone', 'option');
	$email = get_field('email', 'option');

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
<?php if(check_field_value([$phone])): ?>

	<address>
		<a
			target="_blank"
			href="tel:<?php echo preg_replace('/(\s|\(|\))+/', '', $phone); ?>"
		>
			<?php echo inline_svg(get_template_directory_uri() . '/src/img/icons/phone.svg'); ?>
			<?php echo $phone; ?>
		</a>
	</address>

<?php endif; ?>

<?php if(check_field_value([$email])): ?>

	<address>
		<a
			target="_blank"
			href="mailto:<?php echo $email; ?>"
		>
			<?php echo inline_svg(get_template_directory_uri() . '/src/img/email.svg'); ?>
			<?php echo $email; ?>
		</a>
	</address>

<?php endif; ?>

