<?php 
/*** ДОБАВЛЯЕМ meta robots noindex,nofollow ДЛЯ СТРАНИЦ ***/
	function my_meta_noindex () {
		if (
			is_archive() OR // Просмотр любых страниц архива - за месяц, за год, по категориям, по авторам, и т.д.
			is_category() OR // Просмотр архива статей по категориям
			is_tax() OR // Просмотр архива статей по таксономии. Что это?
			is_attachment() OR // Страницы просмотра прикрепленных файлов
			is_paged() OR // Все и любые страницы пагинации
			is_search() // Страницы результатов поиска по сайту
		) {echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";}
	}
	add_action('wp_head', 'my_meta_noindex', 3); // добавляем свой noindex,nofollow в head
  include("includes/theme-options.php");
 	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_custom_background();  
	remove_action('wp_head','wp_generator');

function first_image() {
	global $post, $posts;
	$img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$img = $matches [1] [0];
	return trim($img);
} 

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' =>  ' Выбрать Меню' ,
			 
		)
	);
}

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

 		
if ( function_exists('register_sidebar') )
        register_sidebar(array(	
     'name' => 'Сайдбар',
            'before_title' => '<div  class="title"><h4>',
        'after_title' => '</h4></div>',
		'before_widget' => '<div class="widget">',
        'after_widget' => '<div class="wid-shadow"></div></div> ',
    ));
    
  		
		
if ( function_exists('register_sidebar') )
        register_sidebar(array(	
     'name' => 'Подвал Левый',
            'before_title' => ' <div class="foot-title"><h4>',
        'after_title' => '</h4></div>',
		'before_widget' => '<div class="foot-widget1">',
        'after_widget' => '</div> ',
    ));


if ( function_exists('register_sidebar') )
        register_sidebar(array(	
     'name' => 'Подвал Центр',
            'before_title' => ' <div class="foot-title"><h4>',
        'after_title' => '</h4></div>',
		'before_widget' => '<div class="foot-widget2">',
        'after_widget' => '</div> ',
    ));
    
    if ( function_exists('register_sidebar') )
        register_sidebar(array(	
     'name' => 'Подвал Правый',
            'before_title' => ' <div class="foot-title"><h4>',
        'after_title' => '</h4></div>',
		'before_widget' => '<div class="foot-widget3">',
        'after_widget' => '</div> ',
    )); 

add_action('wp_footer', 'ins2');
function ins2() {
 $content =' <p class="alignright"><a href="http://miledian.ru/obratnaya-svyaz" class="callback-btn" target="_blank">Обратная связь</a></p>';
 echo $content;
}

//спам контроль начало
add_filter('pre_comment_on_post', 'verify_spam');
function verify_spam($commentdata) {
  $spam_test_field = trim($_POST['comment']);
  if(!empty($spam_test_field)) wp_die('спам');
  $comment_content = trim($_POST['real-comment']);
  $_POST['comment'] = $comment_content;
  return $commentdata;
}
//спам контроль конец

// Отключение HTML тегов в комментариях
function plc_comment_post( $incoming_comment ) {
$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
return( $incoming_comment );
}
function plc_comment_display( $comment_to_display ) {
$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
return $comment_to_display;
}
add_filter('preprocess_comment', 'plc_comment_post', '', 1);
add_filter('comment_text', 'plc_comment_display', '', 1);
add_filter('comment_text_rss', 'plc_comment_display', '', 1);
add_filter('comment_excerpt', 'plc_comment_display', '', 1);

// отключение ссылок в комментариях
remove_filter('comment_text', 'make_clickable', 9);

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
?>