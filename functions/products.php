<?php
    // Custom post type for products
    function create_product_post_type() {
        register_post_type('products',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product',
                ),
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-screenoptions',
				'show_in_rest' => true,
				'supports' => array(
					'editor',
					'title',
                    'page-attributes',
					'thumbnail',
					'revisions',
					'custom-fields',
                    'excerpt'
				),
                'hierarchical' => true
                // 'rewrite' => array(
                //     'slug' => 'products/%cat%',
                // ),
				// 'taxonomies' => array('category')
            )
        );
    };
    add_action('init', 'create_product_post_type');

    // // Custom Categories and Sub-Categories
    // function create_product_post_categories() {
    //     register_taxonomy(
    //         'category',
    //         array('products'),
    //         array(
    //             'hierarchical' => true,
    //             'labels' => array(
    //                 'name'              => 'Categories',
    //                 'singular_name'     => 'Category',
    //             ),
    //             'show_ui' =>  true,
    //             'show_admin_column' => true,
    //             'show_in_rest' => true,
    //             'rewrite' => array(
    //                 'slug' => 'products/categories',
    //                 'hierarchical' => true,
    //                 'with_front' => false
    //             ),
    //             'public' => true,
    //             'publicly_queryable' => true,
    //         )
    //     );
    // };
    // add_action('init', 'create_product_post_categories');

    // function change_product_permalink($post_link, $id = 0) {
    //     $post = get_post($id);
    //     if($post->post_type == 'products') {
    //         if(is_object($post)) {
    //             $terms = wp_get_object_terms($post->ID, 'category');

    //             if($terms && $terms[0]) {
    //                 $main_cat = $terms[0]->slug;
    //                 if($terms[0]->parent) {
    //                     $parent = get_term($terms[0]->parent, 'category');
    //                     $main_cat = $parent->slug;
    //                 }
    //                 return str_replace('%cat%', $main_cat, $post_link);
    //             }
    //         }
    //     }

    //     return $post_link;
    // }
    // add_filter('post_type_link', 'change_product_permalink', 1, 3);

    // function product_pages_rewrite() {

    //     // Search
    //     add_rewrite_rule(
    //         '^products/search/\?([^/\s]+)/?$',
    //         '/products/search\?$matches[1]',
    //         'top'
    //     );          

    //     // Subcategory
    //     add_rewrite_rule(
    //         '^products/categories/([^/\s]+)/([^/\s]+)/?\?(page=(\d+))?/?$',
    //         '/category/$matches[2]?page=$matches[4]',
    //         'top'
    //     );  

    //     // Category
    //     add_rewrite_rule(
    //         '^products/categories/([^/\s]+)/?\?(page=(\d+))?/?$',
    //         '/category/$matches[1]?page=$matches[3]',
    //         'top'
    //     );

    //     // Product
    //     add_rewrite_rule(
    //         '^products/([^/]+)/([^/]+)/?$',
    //         'index.php?post_type=products&name=$matches[2]',
    //         'bottom'
    //     );              
    // };
    // add_action('init', 'product_pages_rewrite');

?>