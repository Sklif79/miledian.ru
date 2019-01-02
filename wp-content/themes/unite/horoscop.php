<?php
/*
Template Name: Horoscope
*/
?>
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
		<?php the_content();?>
<?php 
$filename = $_SERVER['DOCUMENT_ROOT']."/bn_xml.cgi"; 
$modif=time()-@filemtime ("$filename"); 
if(!file_exists($filename) || $modif>"3600") 
  { 
   $rss = file_get_contents("http://www.hyrax.ru/cgi-bin/bn_xml.cgi"); 
   $handle = fopen ("$filename", "w"); 
   fwrite($handle, $rss); 
   fclose($handle); 
  } 
$RSS = simplexml_load_file($filename); 
foreach ($RSS->channel->item as $item) {

        echo "<h4 class='horotitle'>$item->title</h4><p class='horo-description'>$item->description</p>";
    }
?>

<hr class="section-divider">

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