<?php
// Register Custom Navigation Walker for function.php
require_once('wp_bootstrap_navwalker.php');

// Register Theme Features
function custom_theme_features()  {

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'custom_theme_features' );


// Register Sidebars
function custom_sidebar() {

    $args = array(
        'id'            => 'main-sidebar',
        'name'          => __( 'Main Widget Area', 'text_domain' ),
        'description'   => __( 'Appears on posts and pages in the sidebar.', 'text_domain' ),
        'before_title'  => '<h5 class="card-header">',
        'after_title'   => '</h5><div class="card-body">',
        'before_widget' => '<div class="card my-4" style="width: 100%;margin: auto">',
        'after_widget'  => '</div></div>',
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebar' );






