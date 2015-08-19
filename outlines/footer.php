<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package outlines
 * @since outlines 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="branding">
			<a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/tndg-logo-lg.png" alt="Tennessee Distillers Guild"></a>
		</div>
		<nav role="navigation" class="footer-nav main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'outlines' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'outlines' ); ?>"><?php _e( 'Skip to content', 'outlines' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->


		<div class="site-info">
			<p>© 2015-2016 Tennesse Distillers Guild</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

<!-- slick cdn -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.min.js"></script>

<script>
jQuery(document).ready(function($){
		 

	$('.slides').slick({
		infinite: true,
		autoplaySpeed: 3000,
		speed: 900,
		dots: true,
		autoplay: true
	});

	$('.associates-slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplaySpeed: 2000,
		speed: 400,
		autoplay: true
	});

	// hidden content reveal
    $(".hidden-info").hide();
    $(".a_show").show();
 
    $('.a_show').click(function( event ){
    	event.preventDefault();
   		$(this).parent().find(".hidden-info").slideToggle();
   		$(this).hide();

    });
    $('.a_hide').click(function( event ){
    	event.preventDefault();
   		$(this).parent().parent().find(".hidden-info").slideToggle();
   		$(this).parent().parent().find(".a_show").show();
    });
 
});
</script>

</body>
</html>