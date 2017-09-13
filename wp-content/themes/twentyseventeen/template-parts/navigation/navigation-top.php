<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

$url = home_url();
$homeurl = esc_url( $url );

if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):
?>

		<script type="text/javascript">
			function accountstatus(){
		    	jQuery(document).ready(function($) {
					$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "accountstatus" }, function( data ) {
					  // console.log( data.id );

						if(data.result == true){

							updateTips( "Details of your account." );
							$('#accountdetails-wrapper').html(data.table);
							dialogaccountsetting.dialog( "open" );

						} else {
							
					        // updateTips( "You already availed your free coins!" );
					        dialogaccountsetting.dialog( "open" );

						}


					}, "json");
				});
		    }

		    function updateTips( t ) {
		    	jQuery(document).ready(function($) {
			    	tips = $( ".validateTips" );

				      tips
				        .text( t )
				        .addClass( "ui-state-highlight" );
				      setTimeout(function() {
				        tips.removeClass( "ui-state-highlight", 1500 );
				      }, 500 );

				});
			}

		    jQuery(document).ready(function($) {

			    dialogaccountsetting = $( "#dialog-account-status" ).dialog({
				      autoOpen: false,
				      height: 'auto',
				      width: 400,
				      modal: true,	      
				      close: function() {
				        // location.reload();
				      }
				    });
			});
		</script>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/table.css">

		<div class="button-account-status"><a href="javascript: void(0);" onclick="accountstatus();">Account Status</a> | <a href="javascript: void(0);" id="logout">Logout</a></div>

<?php else: ?>

	<!-- <div class="button-account-status"><a href="javascript: void(0);" id="mobilecheck">Register</a> | <a href="javascript: void(0);" id="userlogin">Sign In</a></div> -->

<?php endif; ?>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
		echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'twentyseventeen' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->

<div id="dialog-account-status" title="Account Status" style="display: none;"> 
	<p class="validateTips" style="text-align: center;">You have successfully updated your username.</p>
	<div id="accountdetails-wrapper"></div>
</div>