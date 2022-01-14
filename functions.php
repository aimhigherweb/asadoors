<?php
    require_once(__DIR__ . '/functions/acf.php');
    require_once(__DIR__ . '/functions/wordpress.php');
    require_once(__DIR__ . '/functions/gutenberg.php');
    require_once(__DIR__ . '/functions/blocks.php');

    // Main Nav
    register_nav_menus(array (
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu',
        'social_menu' => 'Social Menu',
        'legal_menu' => 'Legal Menu'
    ));

    //Add Social Icons to Nav Menu
    function social_menu_icons($items, $args) {
        if($args->theme_location == 'social_menu') {            
            foreach($items as &$item) {
                $icon = inline_svg(get_field('icon', $item));

                if($icon) {
                    $item->title = $icon . '<span class="sr-only">' . $item->title . '</span>';
                }
            }

            return $items;
        }
        else {
            return $items;
        }
    }
    add_filter('wp_nav_menu_objects', 'social_menu_icons', 10, 2);

    function main_sub_menu($items, $args) {
        if($args->theme_location == 'main_menu') {            
            foreach($items as &$item) {
                if(in_array('menu-item-has-children', $item->classes)) {
                    $item->title = '<span class="sub">' . $item->title . inline_svg(get_template_directory_uri() . '/src/img/chevron.svg') . '</span>';
                }
            }

            return $items;
        }
        else {
            return $items;
        }
    }
    add_filter('wp_nav_menu_objects', 'main_sub_menu', 10, 2);

    

    // Support Featured Images
    add_theme_support( 'post-thumbnails' );

    // Custom Image Sizes
    add_image_size( 'block_image', 400, 350, false );
    add_image_size( 'block_news', 500, 375, array( 'center', 'center' ) );
    add_image_size( 'block_featured', 1000, 400, array( 'center', 'center' ) );
    add_image_size( 'profile', 200, 200, array( 'center', 'center' ) );
    add_image_size( 'med_square', 300, 300, false );
    add_image_size('banner_s', 800, 300, array('center', 'center'));
    add_image_size('banner_m', 1000, 400, array('center', 'center'));
    add_image_size('banner_l', 1200, 500, array('center', 'center'));
    add_image_size('banner_xl', 1500, 500, array('center', 'center'));
    add_image_size('banner_xxl', 3000, 500, array('center', 'center'));

    // Add Options Page
    if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Business Details',
            'menu_title'	=> 'Business Details',
            'menu_slug' 	=> 'business-details',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
    }

    
    
?>