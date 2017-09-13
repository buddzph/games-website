<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
global $wpdb;

$uid = 0;
if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])): 
	$uid = $_SESSION['user']['id'];
endif;

function g_getsessionid($uid, $gamecode)
{
  $s = date('YmdHis') . $uid . "_" . $gamecode;
  return($s);
}
?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(document).keyup(function(e) {
			if (e.keyCode == 27) { // escape key maps to keycode `27`
		        off();
		    }
		});
	});


	function on(gamelink) {
		document.getElementById("gameoverlay").innerHTML = '<iframe id="gamewrapper" src="' + gamelink + '" style="border: 0; width: 100%; height: 100%;"></iframe><button onclick="off()">X</button></div>';
	    document.getElementById("gameoverlay").style.display = "block";


	}

	/*jQuery(document).ready(function($) {
    	$('#gamewrapper').contents().find('body').keyup(function(event){
		  	if (event.keyCode == 27) { // escape key maps to keycode `27`
		        off();
		    }
		});
	});*/

	function off() {
		document.getElementById("gameoverlay").innerHTML = '';
	    document.getElementById("gameoverlay").style.display = "none";
	}

	
</script>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				?>
				<!--h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1-->
				<?php

				$categories = get_the_category();
 
				if ( ! empty( $categories ) and $categories[0]->name == "Games" ) {
				    // echo esc_html( $categories[0]->name );
				    // the_field('embed_game_code');

					/*get_template_part( 'template-parts/post/content', get_post_format() );

					$gamecode = get_field('game_code');

				    echo '<center><a class="button" href="../game-playing?gamecode='.$gamecode.'">Play Now!</a></center>';

				    echo '<div class="gameraiting">';
				    	if(function_exists('the_ratings')) { the_ratings(); }
				    echo '</div>';*/

				    $gameid = get_field('game_code').'';

				    $gamefolder = get_field('embed_game_code');

				    $hasfreeversion = get_field('has_free_version');

				    $playthegame = false;

				    $gametitle = get_the_title();

				    if(!empty($gamefolder)):

				    	// echo htmlspecialchars_decode($gamefolder);

				    	$url = home_url();
						$homeurl = esc_url( $url );

						$sessionid = g_getsessionid($uid, $gameid);
						
						if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):

							// QUERY TO CHECK IF USER HAS TOKEN
							$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = " . $_SESSION['user']['id']);

							if(count($checkuser[0]->tokens) > 0):

								// PAID VERSION

								$const = $homeurl.'/game_storage/'.$gamefolder.'/index.html?nocache&amp;api-url='.$homeurl.'/prod/api/gpctlstatapi.php&amp;session-id='.$sessionid;

						    	/*echo '<iframe id="gamewrapper" src="http://localhost/glyphgames.com/game_storage/20170524_heros-journey/index.html?nocache&amp;api-url=http://localhost/glyphgames.com/prod/api/gpctlstatapi.php&amp;session-id=201707271628350_20170517_heros-journey" style="border: 0; width: 100%; height: 560px"></iframe>';*/

						    	?>

						    	<div id="gameoverlay" onclick="off()">
						    		
						    		<!-- Play the game -->

						    	</div>
								

						    	<?php

						    	echo '<div class="single-featured-image-header">';
									// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
									the_post_thumbnail( 'full' );
								echo '</div><!-- .single-featured-image-header -->';

								// echo $const;

								echo '<div style="margin-bottom: 25px; margin-top: 25px; text-align: center;"><button onclick="on(\'' . $const . '\')">Play Now!</button></div>';

						    	$playthegame = true;

						    else:

						    	if(count($checkuser[0]->tot_freetokens) > 0):

						    		// PAID VERSION

									$const = $homeurl.'/game_storage/'.$gamefolder.'/index.html?nocache&amp;api-url='.$homeurl.'/prod/api/gpctlstatapi.php&amp;session-id='.$sessionid;

							    	/*echo '<iframe id="gamewrapper" src="http://localhost/glyphgames.com/game_storage/20170524_heros-journey/index.html?nocache&amp;api-url=http://localhost/glyphgames.com/prod/api/gpctlstatapi.php&amp;session-id=201707271628350_20170517_heros-journey" style="border: 0; width: 100%; height: 560px"></iframe>';*/

							    	?>

							    	<div id="gameoverlay" onclick="off()">
							    		
							    		<!-- Play the game -->

							    	</div>
									

							    	<?php

							    	echo '<div class="single-featured-image-header">';
										// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
										the_post_thumbnail( 'full' );
									echo '</div><!-- .single-featured-image-header -->';

									// echo $const;

									echo '<div style="margin-bottom: 25px; margin-top: 25px; text-align: center;"><button onclick="on(\'' . $const . '\')">Play Now!</button></div>';

							    	$playthegame = true;

						    	else:

						    		if($hasfreeversion == 'Yes'):

							    		// FREE VERSION

							    		echo '<h3>You are playing the FREE version of '. $gametitle .'.</h3>';

										$const = $homeurl.'/game_storage/'.$gamefolder.'/index.html?nocache&amp;api-url='.$homeurl.'/prod/api/gpctlstatapi.php&amp;session-id='.$sessionid.'_FREE';

								    	/*echo '<iframe id="gamewrapper" src="http://localhost/glyphgames.com/game_storage/20170524_heros-journey/index.html?nocache&amp;api-url=http://localhost/glyphgames.com/prod/api/gpctlstatapi.php&amp;session-id=201707271628350_20170517_heros-journey" style="border: 0; width: 100%; height: 560px"></iframe>';*/

								    	?>

								    	<div id="gameoverlay" onclick="off()">
								    		
								    		<!-- Play the game -->

								    	</div>
										

								    	<?php

								    	echo '<div class="single-featured-image-header">';
											// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
											the_post_thumbnail( 'full' );
										echo '</div><!-- .single-featured-image-header -->';

										// echo $const;

										echo '<div style="margin-bottom: 25px; margin-top: 25px; text-align: center;"><button onclick="on(\'' . $const . '\')">Play Now!</button></div>';

								    	$playthegame = true;

								    else:

								    	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
											echo '<div class="single-featured-image-header">';
											// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
											the_post_thumbnail( 'full' );
											echo '</div><!-- .single-featured-image-header -->';
										endif;

								    	echo '<h3>There is NO FREE version for the game '. $gametitle .'.</h3>';

								    endif;

						    	endif;

						    endif;

						else:

							if($hasfreeversion == 'Yes'):

					    		// FREE VERSION

					    		echo '<h3>You are playing the FREE version of '. $gametitle .'.</h3>';

								$const = $homeurl.'/game_storage/'.$gamefolder.'/index.html?nocache&amp;api-url='.$homeurl.'/prod/api/gpctlstatapi.php&amp;session-id='.$sessionid.'_FREE';

						    	/*echo '<iframe id="gamewrapper" src="http://localhost/glyphgames.com/game_storage/20170524_heros-journey/index.html?nocache&amp;api-url=http://localhost/glyphgames.com/prod/api/gpctlstatapi.php&amp;session-id=201707271628350_20170517_heros-journey" style="border: 0; width: 100%; height: 560px"></iframe>';*/

						    	?>

						    	<div id="gameoverlay" onclick="off()">
						    		
						    		<!-- Play the game -->

						    	</div>
								

						    	<?php

						    	echo '<div class="single-featured-image-header">';
									// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
									the_post_thumbnail( 'full' );
								echo '</div><!-- .single-featured-image-header -->';

								// echo $const;

								echo '<div style="margin-bottom: 25px; margin-top: 25px; text-align: center;"><button onclick="on(\'' . $const . '\')">Play Now!</button></div>';

						    	$playthegame = true;

						    else:

						    	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
									echo '<div class="single-featured-image-header">';
									// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
									the_post_thumbnail( 'full' );
									echo '</div><!-- .single-featured-image-header -->';
								endif;

						    	echo '<h3>There is NO FREE version for the game '. $gametitle .'.</h3>';

						    endif;


						endif;

						if($playthegame):

					    	echo '<div class="fb-like-wrapper">';

					    	echo fb_like_button();

					    	echo '</div>';

						    echo '<div class="gameraiting">';
						    	if(function_exists('the_ratings')) { the_ratings(); }
						    echo '</div>';

						endif;

				    else:

				    	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
							echo '<div class="single-featured-image-header">';
							// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
							the_post_thumbnail( 'full' );
							echo '</div><!-- .single-featured-image-header -->';
						endif;

						echo '<h2>Game not yet available!</h2>';

				   	endif;

				} else {

					if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
						echo '<div class="single-featured-image-header">';
						// echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
						the_post_thumbnail( 'full' );
						echo '</div><!-- .single-featured-image-header -->';
					endif;

					get_template_part( 'template-parts/post/content', get_post_format() );

				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
