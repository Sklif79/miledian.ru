<?php
/**
 * @package unite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">
        <h1 class="entry-title "><?php the_title(); ?></h1>
        <div class="entry-meta">
            <?php unite_posted_on(); ?>
            <span class="views" title="Просмотры">
                <i class="fa fa-eye"></i>
                <?php echo getPostViews((int)get_the_ID()); ?>
            </span>
            <?php setPostViews(get_the_ID()); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <?php the_post_thumbnail('unite-featured', array('class' => 'thumbnail')); ?>
    <div class="entry-content">


        <?php /* the_content(); */ ?>




        <!--   закоментить этот блок при выключении рекламы, верхний расскоментить     -->
        <?php
        $paragraphAfter = 4; //display after the first paragraph
        $paragraphAfter2 = 11;
        $content = apply_filters('the_content', get_the_content());
        $content = explode("</p>", $content);
        for ($i = 0; $i < count($content); $i++) {
            if ($i == $paragraphAfter) { ?>
                <!--noindex-->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- adscontentMobile -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3938268256178036"
                 data-ad-slot="6116521103"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
                <!--/noindex-->

            <?php }


            if ($i == $paragraphAfter2) { ?>
                <!--noindex-->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- adscontentMobile2 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3938268256178036"
                 data-ad-slot="4688219901"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
                <!--/noindex-->


            <?php }
            echo $content[$i];
        } ?>
        


        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'unite'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->


    <footer class="entry-meta">
        <?php
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list(__(', ', 'unite'));

        /* translators: used between list items, there is a space after the comma */
        $tag_list = get_the_tag_list('', __(', ', 'unite'));

        if (!unite_categorized_blog()) {
            // This blog only has 1 category so we just need to worry about tags in the meta text
            if ('' != $tag_list) {
                $meta_text = '<i class="fa fa-folder-open-o"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Добавить в закладки</a>.';
            } else {
                $meta_text = '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Добавить в закладки</a>.';
            }

        } else {
            // But this blog has loads of categories so we should probably display them here
            if ('' != $tag_list) {
                $meta_text = '<i class="fa fa-folder-open-o"></i> %1$s <i class="fa fa-tags"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Добавить в закладки</a>.';
            } else {
                $meta_text = '<i class="fa fa-folder-open-o"></i> %1$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Добавить в закладки</a>.';
            }

        } // end check for categories on this blog

        printf(
            $meta_text,
            $category_list,
            $tag_list,
            get_permalink()
        );
        ?>
        <?php edit_post_link(__('Edit', 'unite'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
        <?php unite_setPostViews(get_the_ID()); ?>
        <?php /* echo unite_getPostViews(get_the_ID()); */ ?>
        <hr class="section-divider">
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
