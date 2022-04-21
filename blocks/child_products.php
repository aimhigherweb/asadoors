<?php

	global $query_string;

	wp_parse_str( $query_string, $args );

	$product = get_queried_object();

	$post_args = array(
		'post_type' => 'products',
		'order_by' => 'menu_order title',
		'order' => 'ASC',
		'posts_per_page' => -1,
		'post_parent' => $product->ID,
	);

	$child_products = new WP_Query( $post_args );

?>

<ul class="child_products">
	<?php while ( $child_products->have_posts() ) : $child_products->the_post(); ?>
		<li class="product">
			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php echo get_the_post_thumbnail($product->ID, 'product_thumbnail'); ?>
			<?php echo get_the_excerpt(); ?>
		</li>
	<?php endwhile; ?>
</ul>