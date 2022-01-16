<?php
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
//End Logo
add_theme_support( 'post-thumbnails' );

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');
//End Menu
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div class="p-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fst-italic">',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
//end sidebar
function danskesite_customize_register( $wp_customize ) {
    $wp_customize->add_section('theme_setting' , array(
        'title' => __('Theme Setting'),
        'priority'       => 35,
    ));
    $wp_customize->add_setting( 'body_bg_color', array(
        'default'        => '#fff',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg_color', array(
        'label'   => 'Body background color',
        'section' => 'theme_setting',
        'settings'   => 'body_bg_color',
    ) ) );

    $wp_customize->add_setting( 'body_text_color', array(
        'default'        => '#000',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text_color', array(
        'label'   => 'Body text color',
        'section' => 'theme_setting',
        'settings'   => 'body_text_color',
    ) ) );

    $wp_customize->add_setting( 'navbar_color', array(
        'default'        => '#0b3953',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_color', array(
        'label'   => 'Navbar color setting',
        'section' => 'theme_setting',
        'settings'   => 'navbar_color',
    ) ) );
    $wp_customize->add_setting( 'navbar_search_button_color', array(
        'default'        => '#c71432',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_search_button_color', array(
        'label'   => 'Search button color',
        'section' => 'theme_setting',
        'settings'   => 'navbar_search_button_color',
    ) ) );
    $wp_customize->add_setting('navbar_light_dark', array(
        'default'        => 'navbar-dark',
    ));
    $wp_customize->add_control('navbar_light_dark', array(
        'label'      => __('Navbar light or dark version'),
        'section'    => 'theme_setting',
        'settings'   => 'navbar_light_dark',
        'type'    => 'select',
        'choices'    => array(
            'navbar-dark' => 'Navbar Dark Version',
            'navbar-light' => 'Navbar Light Version',
        ),
    ));

    $wp_customize->add_setting('navbar_width', array(
        'default'        => 'container-fluid',
    ));
    $wp_customize->add_control('navbar_width', array(
        'label'      => __('Navbar light or dark version'),
        'section'    => 'theme_setting',
        'settings'   => 'navbar_width',
        'type'    => 'select',
        'choices'    => array(
            'container-fluid' => 'Full width',
            'container' => 'Boxed width',
        ),
    ));

    $wp_customize->add_setting('main_width', array(
        'default'        => 'container-fluid',
    ));
    $wp_customize->add_control('main_width', array(
        'label'      => __('Main width'),
        'section'    => 'theme_setting',
        'settings'   => 'main_width',
        'type'    => 'select',
        'choices'    => array(
            'container-fluid' => 'Full width',
            'container' => 'Boxed width',
        ),
    ));

    $wp_customize->add_setting('main_margin_top', array(
        'default'        => '3',
    ));
    $wp_customize->add_control('main_margin_top', array(
        'label'      => __('Margin from top for main content'),
        'section'    => 'theme_setting',
        'settings'   => 'main_margin_top',
        'type'    => 'select',
        'choices'    => array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ),
    ));

    $wp_customize->add_setting('main_margin_bottom', array(
        'default'        => '3',
    ));
    $wp_customize->add_control('main_margin_bottom', array(
        'label'      => __('Margin from bottom for main content'),
        'section'    => 'theme_setting',
        'settings'   => 'main_margin_bottom',
        'type'    => 'select',
        'choices'    => array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ),
    ));


    $wp_customize->add_setting('posts_col-size-home', array(
        'default'        => '4',
    ));
    $wp_customize->add_control('posts_col-size-home', array(
        'label'      => __('Size of post columns homepage'),
        'section'    => 'theme_setting',
        'settings'   => 'posts_col-size-home',
        'type'       => 'radio',
        'choices'    => array(
            '2'   => '6',
            '3'  => '4',
            '4'  => '3',
            '6'  => '2',
        ),
    ));


    $wp_customize->add_setting('single_width', array(
        'default'        => 'container',
    ));
    $wp_customize->add_control('single_width', array(
        'label'      => __('Post page width'),
        'section'    => 'theme_setting',
        'settings'   => 'single_width',
        'type'    => 'select',
        'choices'    => array(
            'container-fluid' => 'Full width',
            'container' => 'Boxed width',
        ),
    ));

    $wp_customize->add_setting('page_width', array(
        'default'        => 'container-fluid',
    ));
    $wp_customize->add_control('page_width', array(
        'label'      => __('Page width'),
        'section'    => 'theme_setting',
        'settings'   => 'page_width',
        'type'    => 'select',
        'choices'    => array(
            'container-fluid' => 'Full width',
            'container' => 'Boxed width',
        ),
    ));


    $wp_customize->add_setting('page_margin_top', array(
        'default'        => '2',
    ));
    $wp_customize->add_control('page_margin_top', array(
        'label'      => __('Margin from top for main content'),
        'section'    => 'theme_setting',
        'settings'   => 'page_margin_top',
        'type'    => 'select',
        'choices'    => array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ),
    ));

    $wp_customize->add_setting('page_margin_bottom', array(
        'default'        => '2',
    ));
    $wp_customize->add_control('page_margin_bottom', array(
        'label'      => __('Margin from bottom for main content'),
        'section'    => 'theme_setting',
        'settings'   => 'page_margin_bottom',
        'type'    => 'select',
        'choices'    => array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ),
    ));
    $wp_customize->add_setting( 'footer_bg_color', array(
        'default'        => '#0b3953',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'label'   => 'Footer background color',
        'section' => 'theme_setting',
        'settings'   => 'footer_bg_color',
    ) ) );

    $wp_customize->add_setting('footer_more_text', array(
    ));
  
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('More text for footer'),
        'section'    => 'theme_setting',
        'settings'   => 'footer_more_text',
    ));


//for add more check this document
//    https://developer.wordpress.org/reference/hooks/customize_register/



}
add_action( 'customize_register', 'danskesite_customize_register' );
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'twentytwentyone_child_register_required_plugins' );
function twentytwentyone_child_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

    
       
        array(
            'name'      => 'Layout Grid Block',
            'slug'      => 'layout-grid',
        ),
        array(
            'name'        => 'One Click Demo Import',
            'slug'        => 'one-click-demo-import',
        ),
        array(
            'name'        => 'Getwid – Gutenberg Blocks',
            'slug'        => 'getwid',
        ),
        array(
            'name'        => 'Gutenberg Blocks – Ultimate Addons for Gutenberg',
            'slug'        => 'ultimate-addons-for-gutenberg',
        ),
        array(
            'name'        => 'Post/Page specific custom CSS',
            'slug'        => 'postpage-specific-custom-css',
        ),
        array(
            'name'        => 'Recent Posts Widget With Thumbnails',
            'slug'        => 'recent-posts-widget-with-thumbnails',
        ),
        array(
            'name'        => 'Blocks Animation: CSS Animations for Gutenberg Blocks',
            'slug'        => 'blocks-animation',
        ),
        
        

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'danskesite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'plugins.php',            // Parent menu slug.
        'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}

