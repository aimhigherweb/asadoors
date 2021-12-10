<?php
	$logo = wp_get_attachment_image_src(get_theme_mod( 'custom_logo' ), 'full')[0];
	$address = get_field('address', 'option');
	$phone = get_field('phone', 'option');
	$email = get_field('email', 'option');
?>

<footer class="footer">
	<div class="footernotcopyright">
		<div>
			<a class="logo" href="/">
				<?php 
				if(preg_match('/\.svg$/', $logo)) {
					echo inline_svg($logo);
				} 
				else {
					echo '<img src="' . $logo . '" />';
				}
			?>
				ASA Flexible Doors
			</a>
			<p>©
				<?php echo date("Y"); ?>

				<?php echo get_bloginfo('name'); ?>.
				<br />

				All rights reserved.
			</p>
		</div>
		<nav>
			<ul>
				<?php 
				wp_nav_menu(array(
					'theme_location' => 'footer_menu',
					'container' => false,
					'items_wrap' => '%3$s'
				));
			?>
			</ul>
		</nav>

		<div class="contact">
			<h2>Contact Us</h2>
			<?php if(check_field_value([$phone])): ?>
			<address>
				<a target="_blank" href="tel:<?php echo preg_replace('/\s+/', '', $phone); ?>">
					<?php echo inline_svg(get_template_directory_uri() . '/src/img/icons/phone.svg'); ?>
					<?php echo $phone; ?>
				</a>
			</address>
			<?php endif; ?>
			<?php if(check_field_value([$email])): ?>
			<address>
				<a target="_blank" href="mailto:<?php echo $email; ?>">
					<?php echo inline_svg(get_template_directory_uri() . '/src/img/email.svg'); ?>
					<?php echo $email; ?>
				</a>
			</address>
			<?php endif; ?>
			<nav class="icons">
				<ul>
					<?php 
					wp_nav_menu(array(
						'theme_location' => 'social_menu',
						'container' => false,
						'items_wrap' => '%3$s'
					));
				?>
				</ul>
			</nav>
		</div>

	</div>



	<p class="copyright">Website by <a href="https://aimhigherweb.design" target="_blank" rel="nofollow">AimHigher Web</a></p>
</footer>