<?php
// assets\css\main.css
function fashion_assets(){
    wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime(get_template_directory() . '/assets/css/main.css'), 'all' );
    wp_enqueue_style( 'vendorscss', get_template_directory_uri() . '/assets/css/vendor.css' );    
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
}
add_action('wp_enqueue_scripts', 'fashion_assets');
show_admin_bar(false);
add_theme_support('post-thumbnails');
// add_theme_support('post-thumbnails', array('port'))