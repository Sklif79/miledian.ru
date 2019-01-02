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
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
<div class="page-post">
 <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<!--noindex--><div id="LC_Teaser_Block_54839">загрузка...</div><!--/noindex-->
<!--noindex--><div><script type="text/javascript">
teasernet_blockid = 596455;
teasernet_padid = 257511;
</script>
<script type="text/javascript" src="http://mainclc.com/53s/ea0978/c7bfb.js"></script></div><!--/noindex-->

<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  </div><!--//post-->
<?php endwhile; ?>
<?php else : ?>
 <?php include(TEMPLATEPATH . "/404.php"); ?>
 <?php endif; ?>
</div><!--//content-->
 <?php get_sidebar(); ?>
<?php get_footer(); ?>