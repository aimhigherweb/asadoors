<?php
    // Custom post type for casestudies
    function create_casestudy_post_type() {
        register_post_type('casestudies',
            array(
                'labels' => array(
                    'name' => 'Case Studies',
                    'singular_name' => 'Case Study',
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
                //     'slug' => 'casestudies/%cat%',
                // ),
				// 'taxonomies' => array('category')
            )
        );
    };
    add_action('init', 'create_casestudy_post_type');

    // // Custom Categories and Sub-Categories
    // function create_casestudy_post_categories() {
    //     register_taxonomy(
    //         'category',
    //         array('casestudies'),
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
    //                 'slug' => 'casestudies/categories',
    //                 'hierarchical' => true,
    //                 'with_front' => false
    //             ),
    //             'public' => true,
    //             'publicly_queryable' => true,
    //         )
    //     );
    // };
    // add_action('init', 'create_casestudy_post_categories');

    // function change_casestudy_permalink($post_link, $id = 0) {
    //     $post = get_post($id);
    //     if($post->post_type == 'casestudies') {
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
    // add_filter('post_type_link', 'change_casestudy_permalink', 1, 3);

    // function casestudy_pages_rewrite() {

    //     // Search
    //     add_rewrite_rule(
    //         '^casestudies/search/\?([^/\s]+)/?$',
    //         '/casestudies/search\?$matches[1]',
    //         'top'
    //     );          

    //     // Subcategory
    //     add_rewrite_rule(
    //         '^casestudies/categories/([^/\s]+)/([^/\s]+)/?\?(page=(\d+))?/?$',
    //         '/category/$matches[2]?page=$matches[4]',
    //         'top'
    //     );  

    //     // Category
    //     add_rewrite_rule(
    //         '^casestudies/categories/([^/\s]+)/?\?(page=(\d+))?/?$',
    //         '/category/$matches[1]?page=$matches[3]',
    //         'top'
    //     );

    //     // Case Study
    //     add_rewrite_rule(
    //         '^casestudies/([^/]+)/([^/]+)/?$',
    //         'index.php?post_type=casestudies&name=$matches[2]',
    //         'bottom'
    //     );              
    // };
    // add_action('init', 'casestudy_pages_rewrite');

?>