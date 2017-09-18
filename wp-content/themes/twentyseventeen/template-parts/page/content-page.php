<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$url = home_url();
$homeurl = esc_url( $url );
$uploaddir = wp_upload_dir();
?>

<!-- <script type="text/javascript" src="../LIB/jquery-2.0.3.js"></script> -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.countdownTimer.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.countdownTimer.css" />

<script>
/*    jQuery(document).ready(function($) {
        $('#future_date').countdowntimer({
            dateAndTime : "2020/01/01 00:00:00",
            size : "lg",
            regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
regexpReplaceWith: "$1<sup class='displayformat'>days</sup> / $2<sup class='displayformat'>hours</sup> / $3<sup class='displayformat'>minutes</sup> / $4<sup class='displayformat'>seconds</sup>"
        });
    });*/

    var c_try = 0;

    function availfreecoins (){
    	jQuery(document).ready(function($) {
			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "availfreecoins" }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

					updateTips( "You have successfully availed your free coins." );
					dialogsuccessful.dialog( "open" );

					setTimeout(function() {
				        location.reload();
				      }, 500 );

				} else {
					
			        updateTips( "You already availed your free coins!" );
			        dialogsuccessful.dialog( "open" );

				}


			}, "json");
		});
    }

    function getuserdata (){
    	jQuery(document).ready(function($) {
			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "getuserdata" }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

					$('#userdata').html(data.userdata);

					c_try = data.try;

					/*alert(c_try);*/

				} else {
					
			        $('#userdata').html('No user records to display.');

				}


			}, "json");
		});
    }

    function getreward (){
    	jQuery(document).ready(function($) {
			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "getreward" }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

					$('#dialog-rewards').attr('title', 'Rewards process completed');
					
					if(data.reward == 0){						
						updateTips( "Please try again." );
					}else{
						updateTips( "Congratulations! " + data.reward + " was successfully added to your current coins." );
					}

					getuserdata();

					dialogrewards.dialog( "open" );

				} else {
					
					$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
					updateTips( "Your tickets is not enough to avail rewards." );
					dialogrewards.dialog( "open" );

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

	    dialogsuccessful = $( "#dialog-successful" ).dialog({
		      autoOpen: false,
		      height: 'auto',
		      width: 400,
		      modal: true,	      
		      close: function() {
		        location.reload();
		      }
		    });

	    dialogrewards = $( "#dialog-rewards" ).dialog({
		      autoOpen: false,
		      height: 'auto',
		      width: 400,
		      modal: true,	      
		      close: function() {
		        // location.reload();
		      }
		    });


		getuserdata();

		$( "#reward1" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
			
		});

		$( "#reward2" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward3" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward4" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward5" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward6" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward7" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward8" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});

		$( "#reward9" ).button().on( "click", function() {
			if(c_try > 0){
				getreward ();
				$(this).fadeOut(600, function(){ $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box-opened-500x600.jpg">')}).fadeIn(600);
			}else{
				$('[aria-describedby="dialog-rewards"] .ui-dialog-title').html('Ooops!');
				updateTips( "Your tickets is not enough to avail rewards." );
				dialogrewards.dialog( "open" );
			}
		});
	});
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="dialog-successful" title="Completed" style="display: none;"> 
		<p class="validateTips">You have successfully updated your username.</p>
	</div>

	<div id="dialog-rewards" title="Completed" style="display: none;"> 
		<p class="validateTips">Rewards content.</p>
	</div>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>


		<?php
		$pagetitle = get_the_title();

		// THIS IS FOR THE COINS PAGE
        if($pagetitle == 'Coins'):

        	if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):

		        	$checktoday = date('Y-m-d');
					$checkbutton = $wpdb->get_results( "SELECT * FROM user WHERE id = ".$_SESSION['user']['id']." and free_tokens_status = 1 and free_tokens_date_availed = '".$checktoday."'");

					if(count($checkbutton) > 0):

						// nothing to do, button is disabled
						$freebutton = false;

					else:

						$freebutton = true;

					endif;


					$date1 = new DateTime("now");
					$date2 = new DateTime("tomorrow");

					$interval = $date1->diff($date2);

					// print_r($interval);

					$hours = $interval->h;
			        $minutes = $interval->i;
			        $seconds = $interval->s;
			        ?>

			        <script>
			            jQuery(document).ready(function($) {
			                $('#hm_timer').countdowntimer({
			                    hours : <?php echo $hours; ?>,
			                    minutes : <?php echo $minutes; ?>,
			                    seconds : <?php echo $seconds; ?>,
			                    size : "lg"
			                });
			            });
			        </script>

			        <?php
			        if($freebutton):

			        	echo '<div class="availfreecoins"><a href="javascript: void(0)" onclick="availfreecoins()" id="freecoins">Get your free coins Now!</a></div>';

			        else:

			        	echo '<div id="countdown"><div id="hm_timer"></div></div>';

			        	echo '<div class="availfreecoins" style="background: none; height: auto;"><h1>You already availed your free coins!<br />Wait for the time of reflenish.</h1></div>';

			        endif;

			        if(isset($_SESSION['user']['network']) and $_SESSION['user']['network'] == 'GLOBE'):
			        	
		        		echo '<br /><center><a href="'.$homeurl.'/?page_id=239" class="button buymorecoins">Buy More Coins!</a></center>';

		        	endif;

			else:

				echo 'MUST LOGIN TO AVAIL YOUR FREE COINS.';

			endif;
	        ?>


	    <!-- THIS IS THE REWARDS PAGE -->
	    <?php elseif($pagetitle == 'Rewards'): ?>


	    	<?php
	    	if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):

	    		?>

	    		<div id="userdata"></div>
	    		
	    		<div id="rewardsboxes">
	    			<h2>CHOOSE YOUR REWARD</h2>
	    			<a href="javascript: void(0);" class="reward_img" id="reward1"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure01.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward2"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure02.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward3"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure03.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward4"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure02.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward5"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure03.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward6"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure01.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward7"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure03.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward8"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure01.png" alt="" class="hvr-buzz-out"></a>
					<a href="javascript: void(0);" class="reward_img" id="reward9"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure02.png" alt="" class="hvr-buzz-out"></a>
	    		</div>

	    		<?php

				/*echo '<pre>';
				print_r($getusertickets);
				echo '</pre>';*/

	    	else:

	    		echo '<center>SIGN IN TO GET YOUR REWARDS.</center>';

	    	endif;
	    	?>


	    <?php endif; ?>

		<?php

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
