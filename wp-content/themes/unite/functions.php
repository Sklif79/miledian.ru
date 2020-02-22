<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

if ( ! function_exists( 'unite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function unite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'unite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'unite-featured', 730, 410, true );
	add_image_size( 'tab-small', 80, 60 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'unite' ),
		'footer-links' => __( 'Footer Links', 'unite' ) // secondary nav in footer
		) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'unite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // unite_setup
add_action( 'after_setup_theme', 'unite_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function unite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'unite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	register_sidebar(array(
		'id' => 'home1',
		'name' => 'Homepage Widget 1',
		'description' => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));

	register_sidebar(array(
		'id' => 'home2',
		'name' => 'Homepage Widget 2',
		'description' => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));

	register_sidebar(array(
		'id' => 'home3',
		'name' => 'Homepage Widget 3',
		'description' => 'Used only on the homepage page template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));

	register_widget( 'unite_popular_posts_widget' );
}
add_action( 'widgets_init', 'unite_widgets_init' );

include(get_template_directory() . "/inc/popular-posts-widget.php");

/**
 * adding the unite search form (created in extra.php)
 */

add_filter( 'get_search_form', 'unite_wpsearch' );


/**
 * Enqueue scripts and styles.
 */
function unite_scripts() {

	wp_enqueue_style( 'unite-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css' );

	wp_enqueue_style( 'unite-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

	wp_enqueue_style( 'unite-style', get_stylesheet_uri() );

	wp_enqueue_script('unite-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

	wp_enqueue_script( 'unite-functions', get_template_directory_uri() . '/inc/js/main.min.js', array('jquery') );

	wp_enqueue_script( 'unite-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'unite_scripts' );

/**
 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function unite_ie_support_header() {
	echo '<!--[if lt IE 9]>'. "\n";
	echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) . '"></script>'. "\n";
	echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/respond.min.js' ) . '"></script>'. "\n";
	echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'unite_ie_support_header', 1 );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/admin/' );
require_once dirname( __FILE__ ) . '/inc/admin/options-framework.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';

error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

/*** ДОБАВЛЯЕМ meta robots noindex,nofollow ДЛЯ СТРАНИЦ ***/
function my_meta_noindex () {
	if (
			is_archive() OR // Просмотр любых страниц архива - за месяц, за год, по категориям, по авторам, и т.д.
			is_category() OR // Просмотр архива статей по категориям
			is_tax() OR // Просмотр архива статей по таксономии. Что это?
			is_tag() OR // 
			is_attachment() OR // Страницы просмотра прикрепленных файлов
			is_paged() OR // Все и любые страницы пагинации
			is_search() // Страницы результатов поиска по сайту
			) {echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";}
}
	add_action('wp_head', 'my_meta_noindex', 3); // добавляем свой noindex,nofollow в head
	
//отключение фидов
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'wp_shortlink_wp_head'); // Remove WordPress' shortlink links
add_filter('xmlrpc_enabled', '__return_false');//отключение пингбэк

function fb_disable_feed() {
	header("HTTP/1.x 404 Not Found");
	header('Location: 404.php');
	exit;
}

add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);

//удаление поля сайт в комментариях
function remove_comment_fields($fields) { unset($fields['url']); return $fields; } add_filter('comment_form_default_fields', 'remove_comment_fields');

function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}

//Убирает версию файла для js
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
//Убирает версию файла для css
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
//Отключаем XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// асинхронный javascript
function wcs_defer_javascripts ( $url ) {
	if( is_admin() ) return $url;
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js') ) return $url;
	return "$url' defer='defer";
}
add_filter( 'clean_url', 'wcs_defer_javascripts', 11, 1 );

// Отключаем сам REST API
//add_filter('rest_enabled', '__return_false');
// Отключаем фильтры REST API
//remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
//remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
//remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// Отключаем события REST API
//remove_action( 'init', 'rest_api_init' );
//remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
//remove_action( 'parse_request', 'rest_api_loaded' );
// Отключаем Embeds связанные с REST API
//remove_action( 'rest_api_init', 'wp_oembed_register_route');
//remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
//Отключаем type="application/json+oembed"
//remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
//remove_action( 'wp_head', 'rest_output_link_wp_head' );
//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );


/* Disable the emoji's */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/* start views */
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}


