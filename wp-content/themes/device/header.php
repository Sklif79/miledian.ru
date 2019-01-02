<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<!-- favicon -->
<link rel="icon" href="http://miledian.ru/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://miledian.ru/favicon.ico" type="image/x-icon" />


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?><?php } ?><?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Результаты&nbsp; поиска<?php } ?><?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив автора<?php } ?><?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?><?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?><?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив&nbsp;| &nbsp;<?php single_cat_title(); ?><?php } ?><?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Архив&nbsp; <?php the_time('F'); ?><?php } ?><?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Метки&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?></title>

<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php the_excerpt_rss(); ?>" />
	<?php endwhile; endif; elseif(is_home()) : ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php endif; ?>
		
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<!--// Google Font start -->
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
 	<!--// Google Font end -->
 	
<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 
<div id="container">
<div id="header">
<?php if ( is_home() || is_front_page() ) : ?>
<h1 class="logo"><a href="http://miledian.ru"></a></h1>
<?php else : ?>
<span class="logo"><a href="http://miledian.ru"></a></span> 
<?php endif; ?>

<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" value="Поиск по сайту" name="s" id="s" onfocus="if (this.value == 'Поиск по сайту') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Поиск по сайту';}" />
<input type="submit" id="searchsubmit" value="Искать" />
</form>
</div>
<div id="main_menu" role="navigation"><?php wp_nav_menu('menu=menu'); ?></div>