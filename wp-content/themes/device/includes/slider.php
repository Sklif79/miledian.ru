<div id="slider-wrapper">
 <div class="shadow1"></div>
<div id="slider" class="nivoSlider">
<?php 
	$my_query = new WP_Query("cat=".get_theme_mod('sliderid')."&showposts=".get_theme_mod('count').""); 
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
 <?php $thumb = get_post_meta($post->ID, 'big', $single = true); ?>
 <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=350&amp;w=920&amp;q=90&amp;zc=1" alt="" /></a>
 <?php endwhile; ?>
 </div>
  </div> 
 <?php wp_reset_query(); ?>
  <div class="clear"></div>