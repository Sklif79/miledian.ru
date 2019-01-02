<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

<p class="nocomments">Защищено паролем.</p>
<?php
		return;
	}
?>

<div class="comments-box"> <a name="comments" id="comments"></a>
  <?php if ( have_comments() ) : ?>
  <h3>
    К записи "<?php the_title(); ?>"  <?php comments_number('пока нет комментариев', 'есть 1 комментарий', 'оставлено % коммент.' );?>
  </h3>
  <ol class="commentlist">
    <?php wp_list_comments('avatar_size=45'); ?>
  </ol>
  <div class="navigation">
    <div class="left">
      <?php previous_comments_link() ?>
    </div>
    <div class="right">
      <?php next_comments_link() ?>
    </div>
  </div>
  <?php else :  ?>
  <?php if ('open' == $post->comment_status) : ?>
   
  <?php else :  ?>
   
  <p>Комментирование закрыто.</p>
  <?php endif; ?>
  <?php endif; ?>
  <?php if ('open' == $post->comment_status) : ?>
  <div id="respond">
    <h3>Оставить свой комментарий</h3>
    <div class="cancel-comment-reply"> <small>
      <?php cancel_comment_reply_link(); ?>
      </small> </div>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>Пожалуйста, <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> зарегистрируйтесь</a>,  чтобы комментировать.</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <p>Здравствуйте&nbsp; <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.&nbsp; <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти">Выход &raquo;</a></p>
      <?php else : ?>
     
       <p><input type="text" name="author" id="author"  value="<?php echo esc_attr($comment_author); ?>"  size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Имя <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Почта <?php if ($req) echo "(обязательно,&nbsp;не публикуется)"; ?></small></label></p>

<!--<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small>Сайт (дополнительно)</small></label></p>-->
     

      
      <?php endif; ?>
   
      <!--<p>
        <textarea name="comment" id="comment" tabindex="4"></textarea>
      </p>-->
      <div class="comm1">
  <textarea id="comment" class="textarea" name="comment"></textarea>
</div>
<p><textarea id="real-comment" class="textarea" name="real-comment"></textarea></p>


      <p>
        <input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="Отправить" />
        <?php comment_id_fields(); ?>
      </p>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php endif; // If registration required and not logged in ?>
  </div>
  <?php endif; // if you delete this the sky will fall on your head ?>
</div>
