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
<div class="post">
<h1><?php the_title(); ?></h1>
 <div class="meta"><span class="checkdate"> &nbsp; &nbsp; &nbsp; &nbsp; <?php the_time(' j F Y'); ?>   </span></div>
<?php
$paragraphAfter= 3; //display after the first paragraph
$content = apply_filters('the_content', get_the_content());
$content = explode("</p>", $content);
for ($i = 0; $i <count($content); $i++ ) {
if ($i == $paragraphAfter) { ?>
<div>
<!--noindex--><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Post -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3938268256178036"
     data-ad-slot="7241576309"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><!--/noindex-->
</div>
<?php }
echo $content[$i] . "</p>";
} ?>
<div class="clear"></div>
<div class="meta"><span class="comm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Рубрика:&nbsp;&nbsp; <?php the_category(', ') ?></span></div>
<div class="meta"><span class="comm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php the_tags('Запись имеет метки:&nbsp;&nbsp; '); ?></span></div>

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
  </div><!--//post-->
<div class="post"><!--noindex--><div id="LC_Teaser_Block_54839">загрузка...</div><!--/noindex-->
<!--noindex--><div><script type="text/javascript">
teasernet_blockid = 596455;
teasernet_padid = 257511;
</script>
<script type="text/javascript" src="http://mainclc.com/53s/ea0978/c7bfb.js"></script></div><!--/noindex-->
</div>
<?php comments_template(); ?>

<?php endwhile; ?>
<?php else : ?>
 <?php include(TEMPLATEPATH . "/404.php"); ?>
 <?php endif; ?>
</div><!--//content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>