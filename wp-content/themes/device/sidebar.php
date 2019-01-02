<div id="sidebar">

<!--noindex--><div class="widgetreklama">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Sidebar -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-3938268256178036"
     data-ad-slot="6784233503"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div><!--/noindex-->

<div class="widget"><div class="title"><h4>Популярное на сайте</h4></div>
<div class="popular">
<ul>
<?php
$pc = new WP_Query('orderby=comment_count&posts_per_page=5'); ?>
<?php while ($pc->have_posts()) : $pc->the_post(); ?>
<li>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array()); ?></a>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</li>
<?php endwhile; ?>
</ul>
</div>
<div class="wid-shadow"></div></div>

<div class="widgetreklama">
<center>
<script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script>
<div data-share-size="40" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1294505" data-mode="follow" data-background-color="#ededed" data-share-shape="round-rectangle" data-share-counter-size="14" data-icon-color="#ffffff" data-text-color="#000000" data-buttons-color="#ff9300" data-counter-background-color="#ffffff" data-follow-ok="group51805541761166" data-share-counter-type="common" data-orientation="horizontal" data-following-enable="false" data-follow-gp="115761981162486293398" data-sn-ids="fb.vk.tw.ok.gp." data-selection-enable="false" data-exclude-show-more="false" data-share-style="1" data-follow-vk="club67119597" data-follow-tw="Miledianru" data-counter-background-alpha="1.0" data-top-button="false" data-follow-fb="291640430987672" class="uptolike-buttons" ></div></center>
</div>

<!--noindex--><center><div class="widgetreklama">
<script type="text/javascript">
teasernet_blockid = 596339;
teasernet_padid = 257511;
</script>
<script type="text/javascript" src="http://viewclc.com/17ie8724e4c1946c6/29/e.js"></script></div></center><!--/noindex-->

<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar(1) ) : ?>
<?php endif; ?>
</div> 