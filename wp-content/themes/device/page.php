<?php get_header(); ?>
<div class="breadcrumbs">
<?php
if(function_exists('bcn_display'))
{
 bcn_display();
}
?>
</div>
<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
<div class="page-post">
 <h1><?php the_title(); ?></h1>
<div class="meta"><span class="checkdate"> &nbsp; &nbsp; &nbsp; &nbsp; <?php the_time(' j F Y'); ?> </span>	 	</div>
<?php the_content(); ?>

</div><!--//content-->
 <?php get_sidebar(); ?>
<?php get_footer(); ?>