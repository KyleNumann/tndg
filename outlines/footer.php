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

		<div class="social-links">
			<a class="facebook-link" href="https://www.facebook.com/TNDistillersGuild" target="_blank"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
		</div>


		<div class="site-info">
			<div class="credit">
				<p>Legal support provided by: <a href="http://www.bonelaw.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/bone-mcallester-norton-logo.png" alt="Bone McAllester Norton Attorneys"></a></p>
			</div>
			<div class="copyright">
				<p>© 2015-2016 Tennesse Distillers Guild</p>
			</div>
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

	timeout = false;
	$.fn.breakPoints = function() {
		var browserWidth = $( window ).width();
		if(browserWidth < 550){
			$('.associates-slider').slick('slickSetOption', 'slidesToShow', 1, true);
		} else {
			$('.associates-slider').slick('slickSetOption', 'slidesToShow', 3, true);		
		}
	};

	// Check viewport width when user resizes the browser window.
	$( window ).resize( function() {

		//$.fn.breakPoints();

		if ( false !== timeout )
			clearTimeout( timeout );

		timeout = setTimeout( function() {
			$.fn.breakPoints();
		}, 200 );

	} );

	$.fn.breakPoints();



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

    // Load FB Feed
	/*if($('#facebook-content').length){

		$.ajaxSetup({ cache: true });
			  $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
			    FB.init({
			      appId: '1608919102706471',
			      version: 'v2.4' // or v2.0, v2.1, v2.0
			    });   */  
			/*
				Step 1: Create app from your facebook.com/developer area
				Step 2: Get appId: use for appId: value when initializing SDK
				Step 3: In App/Settings click 'Add Platform' and enter your website's domain
				Step 4: in developer Tools & Support/Access Token Tool get your App Token
				Step 5: Call FB.api with a url formulated thusly: '{page id}/posts/?access_token={app token(from step 4)}'

			*/
			/*FB.api(
			    "/626644174099520/posts?limit=3&access_token=CAAW3TauW0ycBACU6ZAmyTC4B40u2fDzgYvZCrZB3xOpcWiRDdBhWTHzphUAdmC2ZBaIHl2j3ZBsNtzcqlgeNgNo6vCtx0IK2rYHeBIrG0FjQ8ZCMAzvdFAsO5HmH35qMNFWiMxX6yleOTjd90pJRI8IZArBGX3FPNQoSKZBwXZBgwCEAs7mhJZATrtmZCbdxniFKZBE1TTFho1JfsQZDZD",
			    function (response) {
			    	
					if (response && !response.error) {
						console.log(response);
						$('#facebook-content').append('<a href="https://www.facebook.com/jdandthestraightshot" target="_blank"><h2 class="section-title"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg> Facebook</h2></a>');
						for(var X=0; X<response.data.length; X++){
							// console.log('Message ' + X + ': ' + response.data[X].message);
							// console.log('status type' + response.data[X].status_type);
							// console.log('type' + response.data[X].type);
							if(response.data[X].message){
								var msgLink ='<br /><a href="https://www.facebook.com/TNDistillersGuild">Link &raquo;</a>';
								if(response.data[X].link){
									msgLink = '<br /><a href="' + response.data[X].link + '">Link &raquo;</a>';
								}
								var fbMessage = '<div class="fb-message">' + response.data[X].message +  msgLink + '</div>';
								$('#facebook-content').append(fbMessage);
							}
							
						}
					} else {
						console.log(response);
					}
			    }
			);
		  });
	}*/



 
});
</script>

</body>
</html>