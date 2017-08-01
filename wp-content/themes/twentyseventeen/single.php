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

				    if(!empty($gamefolder)):

				    	// echo htmlspecialchars_decode($gamefolder);

				    	$url = home_url();
						$homeurl = esc_url( $url );

						$sessionid = g_getsessionid($uid, $gameid);
						

				    	$const = $homeurl.'/game_storage/'.$gamefolder.'/index.html?nocache&amp;api-url='.$homeurl.'/prod/api/gpctlstatapi.php&amp;session-id='.$sessionid;

				    	/*echo '<iframe src="http://localhost/glyphgames.com/game_storage/20170524_heros-journey/index.html?nocache&amp;api-url=http://localhost/glyphgames.com/prod/api/gpctlstatapi.php&amp;session-id=201707271628350_20170517_heros-journey" style="border: 0; width: 100%; height: 600px"></iframe>';*/

				    	echo '<iframe src="'.$const.'" style="border: 0; width: 100%; height: 600px"></iframe>';

					    echo '<div class="gameraiting">';
					    	if(function_exists('the_ratings')) { the_ratings(); }
					    echo '</div>';

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
