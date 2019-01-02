<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
		
<!--<hr class="section-divider">-->
			<?php unite_post_nav(); ?>
			
			<!-- Асинхронный код информера news.gnezdo.ru -->
<!-- <div id="gnezdo_ru_14109">Загрузка...</div>
<script language='JavaScript'>
	var s = document.createElement("script"),
	f = function(){ document.getElementsByTagName("head")[0].appendChild(s); };
	s.type = "text/javascript";
	s.async = true;
	s.src = '//news.gnezdo.ru/show/14109/block_a.js';
	if (window.opera == "[object Opera]") {
		document.addEventListener("DOMContentLoaded", f);
	} else { f(); }
</script> -->
<!-- Конец кода информера news.gnezdo.ru -->

	
	<!-- <div id="SC_TBlock_175352" class="SC_TBlock"></div> -->


<div class="articles-related">
<!-- Асинхронный код информера news.gnezdo.ru -->
<div id="gnezdo_ru_14109">Загрузка...</div>
<script language='JavaScript'>
	var s = document.createElement("script"),
	f = function(){ document.getElementsByTagName("head")[0].appendChild(s); };
	s.type = "text/javascript";
	s.async = true;
	s.src = '//news.gnezdo.ru/show/14109/block_a.js';
	if (window.opera == "[object Opera]") {
		document.addEventListener("DOMContentLoaded", f);
	} else { f(); }
</script>
<!-- Конец кода информера news.gnezdo.ru -->
</div>

	<!--Похожие статьи-->
<?/*	<div class="articles-related">
<h3 class="relatedtitle">Похожие статьи из категории: <?php the_category( ', ' ) ?></h3>
<div><?php
 global $post;
 $backup = $post;
 $categories = get_the_category($post->ID);
 if ($categories) {
 $categories_ids = array();
 foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
 
$args=array(
 'category__in' => $category_ids,
 'post__not_in' => array($post->ID),
 'posts_per_page'=>8, // Количество похожих статей.
 'ignore_sticky_posts'=>1
 );
 $my_query = new wp_query($args);
 if( $my_query->have_posts() ) {
 echo '<ul class="relatedPosts">';
 while ($my_query->have_posts()) {
 $my_query->the_post();
 ?>
 <li><div class="relatedblok"><a href="<?php the_permalink() ?>" rel="bookmark" title="Перейти к статье <?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?><br><?php the_title(); ?></a></div></li>
 <?php
 }
 echo '</ul>';
 }
 }
 $post = $backup;
 wp_reset_query();
 ?></div>
</div>
*/?>



			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>