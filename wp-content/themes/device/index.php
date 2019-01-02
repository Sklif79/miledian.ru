<?php get_header(); ?>
<div id="content">
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post();  ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="meta"><span class="checkdate"> &nbsp; &nbsp; &nbsp; &nbsp; <?php the_time(' j F Y'); ?> </span> &nbsp;	&nbsp;&nbsp;<span class="comm"> &nbsp; &nbsp; &nbsp; &nbsp; <?php comments_popup_link('Прокомментировать', '1 комментарий', ' % коммент.'); ?></span></div>
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