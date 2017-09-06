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

$url = home_url();
$homeurl = esc_url( $url );
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/table.css">

<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>


	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		

		$categories = get_the_category();
		$gametitle = get_the_title();

		if ( ! empty( $categories ) and $categories[0]->name == "Games" ) {
		    // echo esc_html( $categories[0]->name );
		    // the_field('embed_game_code');

			//$gamecode = get_field('game_code');

		    //echo '<center><a class="button" href="../game-playing?gamecode='.$gamecode.'">Play Now!</a></center>';

			get_template_part( 'template-parts/post/content', 'excerpt' );

			$gamecode = get_field('game_code');

			$gameid = $wpdb->get_results( "SELECT id FROM game WHERE gameid = '". $gamecode ."'" );

			$leaderboards_entries = false;

			if(count($gameid) > 0):

				$leaderboards = $wpdb->get_results( "SELECT u.username, g.title, l.scoretickets FROM leaderboards AS l
												LEFT JOIN game AS g ON l.gameid = g.id
												LEFT JOIN user AS u ON l.userid = u.id
												WHERE l.gameid = '". $gameid[0]->id ."'
												AND u.username IS NOT NULL 
												AND u.username != ''
												ORDER BY l.scoretickets DESC" );

				if(count($leaderboards) > 0):
					$leaderboards_entries = true;
				endif;

			endif;

			// DO NOT DELETE, ITS THE POST CONTENT
		    // get_template_part( 'template-parts/post/content', get_post_format() );


			// LEADERBOARDS
			?>

			<style type="text/css">
				
			</style>

			<script type="text/javascript">
				
			</script>

			<div class="leaderboards-wrapper">

				<h1>Leaderboard</h1>
				<div id="leaderboard">
					
					<?php if($leaderboards_entries): ?>

						<table class="rwd-table">
						  <tr>
						    <th>Username</th>
						    <th>Game</th>
						    <th style="text-align: center;">Score</th>
						  </tr>

						  <?php foreach ($leaderboards as $key => $value) { ?>
						  	
						  		 <tr>
								    <td data-th="Username"><?php echo $value->username; ?></td>
								    <td data-th="Game"><?php echo $value->title; ?></td>
								    <td data-th="Score" style="text-align: center;"><?php echo $value->scoretickets; ?></td>
								  </tr>

						  <?php } ?>
						</table>

					<?php else:

						echo 'Leaderboards is Empty! You might be the first lucky 20.';

					endif;
					?>

				</div>
			</div>

			<?php


		    if($_SERVER['HTTP_HOST'] == 'localhost'):

		    	echo do_shortcode('[frontpage_news widget="452" name="More Games"]');
		    	
		    else:

		    	echo do_shortcode('[frontpage_news widget="415" name="More Games"]');
		   	endif;

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

								echo '<h2>Coin Price: <br />PHP <b>'.number_format($coin_price,2).'</b> for <b>'.$coin_count.'</b> coins</h2>';

								echo '<form name="photo" id="buycoinsForm" enctype="multipart/form-data">';

									echo '<input type="hidden" name="coinid" id="coinid" value="'.$coinid.'">';

									echo '<input type="hidden" name="coin_count" id="coin_count" value="'.$coin_count.'">';

									echo '<input type="hidden" name="coin_price" id="coin_price" value="'.$coin_price.'">';

								echo '</form>';

								echo '<center><button id="buycoins" class="hvr-overline-from-center">Buy this coin</button> <button id="getrewards" class="hvr-overline-from-center">Get your rewards.</button></center>';

								echo '<div class="usersettings">';

								// QUERY TO CHECK IF USER HAS TOKEN
								$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = " . $_SESSION['user']['id']);

								/*Array
								(
								    [0] => stdClass Object
								        (
								            [id] => 5
								            [celno] => 9062846807
								            [username] => buddzph
								            [password] => fda3d9d0fbe5aae3177ad16c1739a16f
								            [adminflag] => 0
								            [testuserstatus] => 0
								            [firstname] => Frederick
								            [lastname] => de Guzman
								            [street] => 
								            [city] => 
								            [country] => Philippines
								            [zip] => 
								            [email] => frederickdeguzman@gmail.com
								            [dt_registered] => 2017-08-11 03:07:05
								            [dt_lastplayed] => 2001-01-01 00:00:00
								            [tot_gamesplayed] => 0
								            [tot_playtime] => 0
								            [dt_lastgivenfreetokens] => 2001-01-01 00:00:00
								            [tot_freetokens] => 10
								            [dt_lastpurchased] => 2001-01-01 00:00:00
								            [tot_amountpurchased] => 0.00
								            [tot_tickets] => 0
								            [tot_leaderboardtickets] => 0
								            [tokens] => 10
								            [tickets] => 0
								            [user_avatar] => 1502420918.jpg
								        )

								)*/

								echo '<br />';
								?>

								<center>
							      	<br />
							      	<?php if(isset($_SESSION['user']['user_avatar']) and !empty($_SESSION['user']['user_avatar'])): ?>

							      		<img src="<?php echo $homeurl; ?>/usericon/cropped/<?php echo $_SESSION['user']['user_avatar']; ?>" alt="" class="user_avatar">

							      	<?php else: ?>

							      		<img src="<?php echo $homeurl; ?>/usericon/blank-user.png" alt="" class="user_avatar">

							      	<?php endif; ?>
							    </center>

							    <?php

							    echo '<h3>Account Information</h3>';

								$table = '';

								$table .= '<table border=0 cellpadding=0 cellspacing=0 width=100%>';

									$table .= '<tr>';
										$table .= '<th>Name: </th><td>'.$checkuser[0]->firstname.' '.$checkuser[0]->lastname.'</td>';
									$table .= '</tr>';
									$table .= '<tr>';
										$table .= '<th>Tickets: </th><td>'.$checkuser[0]->tickets.'</td>';
									$table .= '</tr>';
									/*$table .= '<tr>';
										$table .= '<th>Free Coins: </th><td>'.$checkuser[0]->tot_freetokens.'</td>';
									$table .= '</tr>';*/
									$table .= '<tr>';
										$table .= '<th>Current Coins: </th><td>'.$checkuser[0]->tokens.'</td>';
									$table .= '</tr>';

								$table .= '</table>';


								echo $table;

								echo '</div>';

							endif;
							?>
						</div>
						<div style="clear: both;"> </div>
					</div>

					<?php

					if($_SERVER['HTTP_HOST'] == 'localhost'):

				    	echo do_shortcode('[frontpage_news widget="452" name="More Games"]');
				    	
				    else:

				    	echo do_shortcode('[frontpage_news widget="415" name="More Games"]');
				   	endif;


			else:

				echo '<div class="coinwrapper"><div class="leftrightspace15">';

				echo 'Please login to buy this coin.<br />Some important info here.<br />Add any content.';

				echo '</div></div>';

				if($_SERVER['HTTP_HOST'] == 'localhost'):

			    	echo do_shortcode('[frontpage_news widget="452" name="More Games"]');
			    	
			    else:

			    	echo do_shortcode('[frontpage_news widget="415" name="More Games"]');
			   	endif;

			endif;

		} else {
			dynamic_sidebar( 'sidebar-1' );
		}

	endwhile; // End of the loop.
	?>


</aside><!-- #secondary -->
