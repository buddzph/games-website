<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

global $wpdb;
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>


	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		

		$categories = get_the_category();

		if ( ! empty( $categories ) and $categories[0]->name == "Games" ) {
		    // echo esc_html( $categories[0]->name );
		    // the_field('embed_game_code');

			//$gamecode = get_field('game_code');

		    //echo '<center><a class="button" href="../game-playing?gamecode='.$gamecode.'">Play Now!</a></center>';


		    get_template_part( 'template-parts/post/content', get_post_format() );

		    echo do_shortcode('[frontpage_news widget="415" name="More Games"]');

		} elseif ( ! empty( $categories ) and $categories[0]->name == "Coins" ) {

			if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):

				$coincode = get_field('coin_code');

				$coindata = $wpdb->get_results( "SELECT * FROM coins WHERE coin_code = '". $coincode ."'" );
				
				?>
					
					<div class="coinwrapper">
						<div class="leftrightspace15">
							<?php 
							if(count($coindata) > 0):

								$coinid = $coindata[0]->id;
								$coin_count = $coindata[0]->coin_count;
								$coin_price = $coindata[0]->coin_price;

								echo '<h2>Coin Count: <b>'.$coin_count.'</b></h2>';

								echo '<h2>Coin Price: <b>'.number_format($coin_price,2).'</b></h2>';

								echo '<input type="hidden" id="coinid" value="'.$coinid.'">';

								echo '<center><a href="javascript: void(0);" id="buycoins" class="ui-button">Buy this coin</a> <a href="javascript: void(0);" id="getrewards" class="ui-button">Get your rewards.</a></center>';

								echo '';

							endif;
							?>
						</div>
						<div style="clear: both;"> </div>
					</div>


			<?php
			else:

				echo '<div class="coinwrapper"><div class="leftrightspace15">';

				echo 'Please login to buy this coin.<br />Some important info here.<br />Add any content.';

				echo '</div></div>';

			endif;

		} else {
			dynamic_sidebar( 'sidebar-1' );
		}

	endwhile; // End of the loop.
	?>


</aside><!-- #secondary -->
