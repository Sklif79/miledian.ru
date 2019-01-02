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

 <div id="intro">
	<h3 style="margin:30px 0 0 30px;" >Вы искали информацию по запросу "<?php the_search_query(); ?>"</h3> 
</div><!--end:intro-->
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post();  ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<div class="meta"><span class="checkdate"> &nbsp; &nbsp; &nbsp; &nbsp; <?php the_time(' j F Y'); ?> </span> &nbsp;	&nbsp;&nbsp;<span class="comm"> &nbsp; &nbsp; &nbsp; &nbsp; <?php comments_popup_link('Прокомментировать', '1 комментарий', ' % коммент.'); ?></span>	 	</div>

<?php the_content('Продолжение&nbsp;&rArr;'); ?>

 <div class="clear"></div>
 </div><!--//post-->
<?php endwhile; ?>
<?php else : ?>
<p style="margin:30px 0 0 30px;">По Вашему запросу ничего не найдено. Попробуйте другие варианты.</p>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>