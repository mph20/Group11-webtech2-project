<?php

/***** Fetch Options *****/

$tuto_options = get_option('tuto_options');

/***** Custom Hooks *****/

function tuto_html_class() {
    do_action('tuto_html_class');
}
function tuto_before_header() {
    do_action('tuto_before_header');
}
function tuto_after_header() {
    do_action('tuto_after_header');
}
function tuto_before_page_content() {
    do_action('tuto_before_page_content');
}
function tuto_before_post_content() {
    do_action('tuto_before_post_content');
}
function tuto_after_post_content() {
    do_action('tuto_after_post_content');
}
function tuto_post_header() {
    do_action('tuto_post_header');
}
function tuto_before_footer() {
    do_action('tuto_before_footer');
}
function tuto_after_footer() {
    do_action('tuto_after_footer');
}
function tuto_before_container_close() {
    do_action('tuto_before_container_close');
}

function my_custom_post_product() {
    $labels = array(
      'name'               => _x( 'Products', 'post type general name' ),
      'singular_name'      => _x( 'Product', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'book' ),
      'add_new_item'       => ( 'Add New Product' ),
      'edit_item'          => ( 'Edit Product' ),
      'new_item'           => ( 'New Product' ),
      'all_items'          => ( 'All Products' ),
      'view_item'          => ( 'View Product' ),
      'search_items'       => ( 'Search Products' ),
      'not_found'          => ( 'No products found' ),
      'not_found_in_trash' => ( 'No products found in the Trash' ), 
      'parent_item_colon'  => 'Parent Page:',
      'menu_name'          => 'Products'
    );
    $args = array(
      'labels'        => $labels,
      'menu_icon' => 'dashicons-cart',
      'description'   => 'Holds our products and product specific data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
      'has_archive'   => true,
    );
    register_post_type( 'product', $args ); 
  }
  add_action( 'init', 'my_custom_post_product' );

  function my_taxonomies_product() {
    $labels = array(
      'name'              => _x( 'Product Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Product Categories' ),
      'all_items'         => __( 'All Product Categories' ),
      'parent_item'       => __( 'Parent Product Category' ),
      'parent_item_colon' => __( 'Parent Product Category:' ),
      'edit_item'         => __( 'Edit Product Category' ), 
      'update_item'       => __( 'Update Product Category' ),
      'add_new_item'      => __( 'Add New Product Category' ),
      'new_item_name'     => __( 'New Product Category' ),
      'menu_name'         => __( 'Product Categories' ),
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => true,
    );
    register_taxonomy( 'product_category', 'product', $args );
  }
  add_action( 'init', 'my_taxonomies_product', 0 );



/***** Theme Setup *****/

if (!function_exists('tuto_setup')) {
	function tuto_setup() {
		load_theme_textdomain('tuto', get_template_directory() . '/languages');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));
		add_theme_support('custom-background', array('default-color' => 'f7f7f7'));
		add_theme_support('custom-logo', array('width' => 400, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('custom-header', array('default-image' => '', 'width' => 1350, 'height' => 250, 'flex-width' => true, 'flex-height' => true, 'default-text-color' => '22313f'));
		add_theme_support('customize-selective-refresh-widgets');
		add_filter('use_default_gallery_style', '__return_false');
		add_editor_style();
	}
}
add_action('after_setup_theme', 'tuto_setup');

/***** Add Custom Menus *****/

if (!function_exists('tuto_custom_menus')) {
	function tuto_custom_menus() {
		register_nav_menus(array(
			'tuto_header_nav' => esc_html__('Header Navigation', 'tuto'),
			'tuto_main_nav' => esc_html__('Main Navigation', 'tuto'),
			'tuto_social_nav' => esc_html__('Social Icons', 'tuto')
		));
	}
}
add_action('after_setup_theme', 'tuto_custom_menus');

/***** Add Custom Image Sizes *****/

if (!function_exists('tuto_image_sizes')) {
	function tuto_image_sizes() {
		add_image_size('tuto-content', 905, 509, true);
		add_image_size('tuto-medium', 360, 270, true);
		add_image_size('tuto-small', 100, 75, true);
	}
}
add_action('after_setup_theme', 'tuto_image_sizes');

/***** Set Content Width *****/

if (!function_exists('tuto_content_width')) {
	function tuto_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			if (is_page_template('template-full.php')) {
				$content_width = 1300;
			} else {
				$content_width = 855;
			}
		}
	}
}
add_action('template_redirect', 'tuto_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('tuto_scripts')) {
	function tuto_scripts() {
		wp_enqueue_style('tuto-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400italic,400,500,600,700', array(), null);
		wp_enqueue_style('tuto', get_stylesheet_uri(), false, '1.2.7');
		wp_enqueue_style('tuto-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_script('tuto-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
		if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'tuto_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('tuto_widgets_init')) {
	function tuto_widgets_init() {
		register_sidebar(array('name' => esc_html__('Sidebar', 'tuto'), 'id' => 'sidebar', 'description' => esc_html__('Widget area (sidebar left/right) on single posts, pages and archives.', 'tuto'), 'before_widget' => '<div id="%1$s" class="mh-widget %2$s"><div class="mh-widget-inner">', 'after_widget' => '</div></div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner mh-sidebar-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/3 Width', 'widget area name', 'tuto'), 1), 'id' => 'footer-1', 'description' => esc_html__('Widget area in footer.', 'tuto'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s"><div class="mh-widget-inner">', 'after_widget' => '</div></div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/3 Width', 'widget area name', 'tuto'), 2), 'id' => 'footer-2', 'description' => esc_html__('Widget area in footer.', 'tuto'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s"><div class="mh-widget-inner">', 'after_widget' => '</div></div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/3 Width', 'widget area name', 'tuto'), 3), 'id' => 'footer-3', 'description' => esc_html__('Widget area in footer.', 'tuto'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s"><div class="mh-widget-inner">', 'after_widget' => '</div></div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
	}
}
add_action('widgets_init', 'tuto_widgets_init');

/***** Include Several Functions *****/

require_once('includes/mh-customizer.php');
require_once('includes/mh-widgets.php');
require_once('includes/mh-custom-functions.php');

?>