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
<!--noindex--><div align="justify"><?php the_content(); ?>
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
   // выводим гороскоп
        echo "<h7><b>$item->title</h7></b><br>$item->description<br><br>";
    } 
?> </div><!--/noindex-->
<!--социальные кнопки-->
<center><script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script>
<div data-share-size="40" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1278849" data-mode="share" data-background-color="#ededed" data-share-shape="round-rectangle" data-share-counter-size="14" data-icon-color="#ffffff" data-text-color="#ffffff" data-buttons-color="#ff9300" data-counter-background-color="#ffffff" data-share-counter-type="separate" data-orientation="horizontal" data-following-enable="false" data-sn-ids="fb.tw.ok.vk.gp.mr." data-selection-enable="false" data-exclude-show-more="false" data-share-style="10" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div></center>
<br />
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