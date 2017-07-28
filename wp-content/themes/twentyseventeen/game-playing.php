<?php
/* 
Template Name: Game Playing 
*/ 


get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$gamecode = $_GET['gamecode'];

			if(!empty($gamecode)):
				$posts = get_posts(array(
					'numberposts'	=> -1,
					'post_type'		=> 'post',
					'meta_key'		=> 'game_code',
					'meta_value'	=> $gamecode
				));
				
				if( $posts ): ?>
					
					<div class="gamewrapper">
						<?php foreach( $posts as $post ): ?>

							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							
							<?php

							setup_postdata( $post );
							$embedded_game = get_field('embed_game_code');
							$game_play = get_field('game_play');

							echo '<div class="gameleftcontent">';

								echo htmlspecialchars_decode($embedded_game);							

							echo '</div>';

							echo '<div class="gamerightcontent">';

								echo $game_play;

								echo '<div class="gameraiting">';
							    	if(function_exists('the_ratings')) { the_ratings(); }
							    echo '</div>';

							echo '</div>';

						endforeach;
						?>
						<div style="clear: both;"> </div>
					</div>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

			<?php else: ?>

				<h1>Game not yet added!</h1>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();

?>