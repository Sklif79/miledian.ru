<?php get_header(); ?>
<div id="content">
<div class="breadcrumbs">
<?php
if(function_exists('bcn_display'))
{
 bcn_display();
}
?>
</div>

 <br>
<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
<h3 style="margin: 0 0 0 30px;">Архив рубрики "<?php single_cat_title(); ?>" </h3>
<?php echo category_description(); ?>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h3 style="margin: 0 0 0 30px;">Записи с меткой "<?php single_tag_title(); ?>"</h3>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h3 style="margin: 0 0 0 30px;">Архив за <?php the_time(' j F Y'); ?></h3>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h3 style="margin: 0 0 0 30px;">Архив  <?php the_time(' F Y'); ?></h3>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h3 style="margin: 0 0 0 30px;">Архив  <?php the_time('Y'); ?></h3>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h3 style="margin: 0 0 0 30px;">Архив автора  <?php the_author_posts_link(); ?></h3>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h3 style="margin: 0 0 0 30px;">Архив блога</h3>
	<?php } ?>




<?php while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<div class="meta"><span class="checkdate"> &nbsp; &nbsp; &nbsp; &nbsp; <?php the_time(' j F Y'); ?> </span> &nbsp;	&nbsp;&nbsp;<span class="comm"> &nbsp; &nbsp; &nbsp; &nbsp; <?php comments_popup_link('Прокомментировать', '1 комментарий', ' % коммент.'); ?></span>	 	</div>

<?php the_content('Продолжение&nbsp;&rArr;'); ?>

 <div class="clear"></div>
 </div><!--//post-->
<?php endwhile; ?>
<?php else : ?>
 <?php include(TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>