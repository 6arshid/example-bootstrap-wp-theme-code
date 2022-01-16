<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
        <?php wp_title(''); ?>
        <?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?> -
        <?php } ?>
        <?php bloginfo('name'); ?>
    </title>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body  style="background-color:  <?php echo get_theme_mod( 'body_bg_color' ); ?>!important;color: <?php echo get_theme_mod( 'body_text_color' ); ?>!important;">

<nav class="navbar navbar-expand-lg <?php echo get_theme_mod( 'navbar_light_dark' ); ?>" style="background-color:  <?php echo get_theme_mod( 'navbar_color' ); ?>">
    <div class="<?php echo get_theme_mod( 'navbar_width' ); ?>">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

            if ( has_custom_logo() ) {
                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
            } else {
                echo '<h1>' . get_bloginfo('name') . '</h1>';
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
            </ul>

            <form role="search" method="get" class="d-flex" action="<?php echo home_url( '/' ); ?>">
                <input type="search" class="form-control me-2"
                       placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
                       value="<?php echo get_search_query() ?>" name="s"
                       title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                <button class="btn btn-outline" style="background-color:<?php echo get_theme_mod( 'navbar_search_button_color' ); ?>;color: #fff" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>