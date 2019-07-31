<?php
/**
 * ethical_geo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ethical_geo
 */

if ( ! function_exists( 'ethical_geo_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ethical_geo_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on ethical_geo, use a find and replace
     * to change 'ethical_geo' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'ethical_geo', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'menu-1' => esc_html__( 'Primary', 'ethical_geo' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'ethical_geo_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'ethical_geo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ethical_geo_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'ethical_geo_content_width', 640 );
}
add_action( 'after_setup_theme', 'ethical_geo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ethical_geo_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'ethical_geo' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'ethical_geo' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'ethical_geo_widgets_init' );

function ethical_geo_call_to_action_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Call to Action', 'ethical_geo' ),
    'id'            => 'call-to-action',
    'description'   => esc_html__( 'Add custom html widget here.', 'ethical_geo' ),
    'before_widget' => '<div class="cta bordered-top">',
    'after_widget'  => '</div>',
  ) );
}
add_action( 'widgets_init', 'ethical_geo_call_to_action_init' );

function ethical_geo_press() {
  register_sidebar( array(
    'name'          => esc_html__( 'Press Widget', 'ethical_geo' ),
    'id'            => 'eg-press',
    'description'   => esc_html__( 'Add custom html widget here.', 'ethical_geo' ),
    'before_widget' => '<div class="eg-press">',
    'after_widget'  => '</div>',
  ) );
}
add_action( 'widgets_init', 'ethical_geo_press' );

function ethical_geo_footer() {
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget', 'ethical_geo'),
    'id'            => 'eg-footer',
    'description'   => esc_html__( 'Add custom html widget here.', 'ethical_geo' ),
    'before_widget' => '<div class="eg-footer-wrapper">',
    'after_widget'  => '</div>',
  ) );
}
add_action( 'widgets_init', 'ethical_geo_footer' );

/**
 * Enqueue scripts and styles.
 */
function ethical_geo_scripts() {
  wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap' );
  wp_enqueue_style( 'ethical_geo-style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'ethical_geo-scripts', get_template_directory_uri() . '/js/dist/script.js', array(), '20191919', true );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'ethical_geo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Video contest registration / login prompt.
 * IMPORTANT: Delete if Video Contest plugin is removed
 */
function ethical_geo_registration_prompt( $attrs ) {
  $a = shortcode_atts( array(
    'registration_link' => '/wp-login.php?action=register',
    'login_link' => '/wp-login.php',
  ), $attrs );
  return '<a href="' . $a['registration_link'] . '">Register</a> | <a href="' . $a['login_link'] . '">Login</a>';
}

add_shortcode( 'eg_registration', 'ethical_geo_registration_prompt');

function ethical_geo_dynamic_menu_items( $menu_items ) {
  if(is_user_logged_in()) {
    $username = wp_get_current_user()->user_login;
    $first_name = wp_get_current_user()->user_firstname;
    $display_name = $first_name ? $first_name : $username;

    foreach ( $menu_items as $menu_item ) {
      if ( strpos($menu_item->title, '##profile_name##') !== false) {
        $menu_item->title = str_replace("##profile_name##",  "Welcome, " . $display_name, $menu_item->title);
      }
    }
  }

  return $menu_items;
}
add_filter( 'wp_nav_menu_objects', 'ethical_geo_dynamic_menu_items' );

function wppbc_send_credentials_checkbox($requestdata, $form){
   return '<li class="wppb-form-field wppb-send-credentials-checkbox"><label for="send_credentials_via_email"><input id="send_credentials_via_email" type="checkbox" name="send_credentials_via_email" value="sending"'.( ( isset( $request_data['send_credentials_via_email'] ) && ( $request_data['send_credentials_via_email'] == 'sending' ) ) ? ' checked' : '' ).'/>'.
   __( 'Send me my username and password via email.', 'profilebuilder').'</label></li>';
}
add_filter('wppb_send_credentials_checkbox_logic', 'wppbc_send_credentials_checkbox', 10, 2);
