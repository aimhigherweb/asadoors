<footer class="footer">
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

	<p>©<?php echo date("Y"); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.</p>
	
	<p class="copyright">Website by <a href="https://aimhigherweb.design" target="_blank" rel="nofollow">AimHigher Web</a></p>
</footer>