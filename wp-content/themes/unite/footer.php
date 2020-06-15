<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package unite
 */
?>
	</div><!-- #content -->



<div id="toTop"><i class="fa fa-angle-up"></i></div>

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<nav class="col-md-6">
				<?php unite_footer_links(); ?>
			</nav>

			<div class="copyright col-sm-8 col-md-12">
				<?php do_action( 'unite_credits' ); ?>
				<?php echo of_get_option( 'custom_footer_text' ); ?>
				<?php do_action( 'unite_footer' ); ?> 
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

<script type="text/javascript">
    (sc_adv_out = window.sc_adv_out || []).push({
        id : '403802',
        domain : "ad.lcads.ru"
    });
</script>
<script type="text/javascript" src="//st.ad.lcads.ru/js/adv_out.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LcvH98UAAAAACW3dCvEt8vqTzql2Qu7ehROFdC5"></script>
</body>
</html>