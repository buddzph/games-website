<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

$uploaddir = wp_upload_dir();
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<center>
					<img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/GlyphGames-Logo-Light.png" alt=""><br /><br /><br />
					info@glyphgames.com<br />

					<?php
					if ( has_nav_menu( 'social' ) ) : ?>
							<div class="social-navigation">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
								) );
							?>
							</div>
					<?php endif; ?>
					<br /><br /><br /><br /><br />
				</center>
				<?php
				/*get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );*/
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>


<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery('.navigation-top').removeClass('site-navigation-fixed');

		jQuery(window).scroll(function () {
	        var top_offset = jQuery(window).scrollTop();
	        if (top_offset == 0) {
	            jQuery('.navigation-top').removeClass('site-navigation-fixed');
	        } else {
	        	jQuery('.navigation-top').removeClass('remove-site-navigation-fixed');
	            jQuery('.navigation-top').addClass('site-navigation-fixed');
	        }
	    });

	    /*checkSize();*/

	    jQuery(window).resize(function() {
		  checkSize();
		});

	});

	function checkSize(){
	   
            jQuery('.navigation-top').addClass('remove-site-navigation-fixed');
	}
</script>

</body>
</html>