<?php
date_default_timezone_set('Asia/Manila');
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<?php
$uploaddir = wp_upload_dir();

/*Array
(
    [path] => /opt/lampp/htdocs/glyphgames.com/wp-content/uploads/2017/07
    [url] => http://localhost/glyphgames.com/wp-content/uploads/2017/07
    [subdir] => /2017/07
    [basedir] => /opt/lampp/htdocs/glyphgames.com/wp-content/uploads
    [baseurl] => http://localhost/glyphgames.com/wp-content/uploads
    [error] => 
)*/

// echo $uploaddir['basedir'];

$url = home_url();
$homeurl = esc_url( $url );

global $wpdb;
global $freebutton;


// QUERY TO GET LIST OF COUNTRIES
$countries = $wpdb->get_results( "SELECT * FROM apps_countries" );
$tablecountries = '';
$tablecountries .= '<option value"">-- Please select --</option>';
foreach ($countries as $key => $value) {
	if(isset($_SESSION['user']['country']) and $value->country_name == $_SESSION['user']['country']):
		$selected = 'selected="selected"';
	else:
		$selected = '';
	endif;

	$tablecountries .= '<option value"'.$value->country_name.'" '. $selected .'>'.$value->country_name.'</option>';
}

if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])):

	// CHECK FOR FREE TOKENS
	$checktoday = date('Y-m-d');
	$checkbutton = $wpdb->get_results( "SELECT * FROM user WHERE id = ".$_SESSION['user']['id']." and free_tokens_status = 1 and free_tokens_date_availed = '".$checktoday."'");

	if(count($checkbutton) > 0):

		// nothing to do, button is disabled
		$freebutton = false;

	else:

		$e_table = 'user';

		$e_data['free_tokens_status'] = 0;

		$wpdb->update( $e_table, $e_data, array('id' => $_SESSION['user']['id']) );

		$freebutton = true;

	endif;

	// CHECK IF USER ALREADY HAS USERNAME
	$nousername = true;
	$checkusername = $wpdb->get_results( "SELECT username FROM user WHERE id = '".$_SESSION['user']['id']."' AND username IS NOT NULL AND username != ''" );
	if(count($checkusername) > 0):
		$nousername = false;
	endif;


endif;
?>


 <?php if ( is_front_page() ) { ?>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			"use strict";
			//  TESTIMONIALS CAROUSEL HOOK
			$('#customers-testimonials').owlCarousel({
			    loop: true,
			    items: 3,
			    margin: 0,
			    autoplay: true,
			    dots:true,
			    nav:true,
			    autoplayTimeout: 8500,
			    smartSpeed: 450,
			  navText: ['<i class="fa fa-angle-left fa-5x"></i>','<i class="fa fa-angle-right fa-5x"></i>'],
			    responsive: {
			      0: {
			        items: 1
			      },
			      768: {
			        items: 1
			      },
			      1170: {
			        items: 1
			      }
			    }
			  });

			});


	</script>

	<style type="text/css">
		.page .panel-content .entry-title, .page-title, body.page:not(.twentyseventeen-front-page) .entry-title {display: none;}
	</style>

<?php } ?>


<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>


  <script>
	  jQuery(document).ready(function($) {
	  	
	  	var current_mobile_number;
	  	var from_login = false;
	  	var saveusername = false;

	    var dialog, form,
	 
	      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
	      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
	      mobile_number = $( "#mobile_number" ),
	      username = $( "#username" ),
	      password = $( "#password" ),
	      retypepassword = $( "#retypepassword" ),
	      loginusername = $( "#loginusername" ),
	      loginpassword = $( "#loginpassword" ),
	      firstname = $( "#firstname" ),
	      lastname = $( "#lastname" ),
	      street = $( "#street" ),
	      city = $( "#city" ),
	      country = $( "#country" ),
	      zip = $( "#zip" ),
	      email = $( "#email" ),
	      verifycode = $( "#verifycode" ),
	      validusername = $( "#validusername" ),
	      allFields = $( [] ).add( mobile_number ),
	      allFieldsaccountdetails = $( [] ).add( username ).add( password ).add( retypepassword ).add( firstname ).add( lastname ).add( street ).add( city ).add( country ).add( zip ).add( email ),
	      allFieldslogin = $( [] ).add( loginusername ).add( loginpassword ),
	      allFieldsverification = $( [] ).add( verifycode ),
	      allFieldsvalidusername = $( [] ).add( validusername ),
	      tips = $( ".validateTips" );
	 
	    function updateTips( t ) {
	      tips
	        .text( t )
	        .addClass( "ui-state-highlight" );
	      setTimeout(function() {
	        tips.removeClass( "ui-state-highlight", 1500 );
	      }, 500 );
	    }
	 
	    function checkLength( o, n, min, max ) {
	      if ( o.val().length > max || o.val().length < min ) {
	        o.addClass( "ui-state-error" );
	        updateTips( "Length of " + n + " must be " +
	          max + " digit numbers only." );
	        return false;
	      } else {
	        return true;
	      }
	    }

	    function checkLengthFields( o, n, min, max ) {
	      if ( o.val().length > max || o.val().length < min ) {
	        o.addClass( "ui-state-error" );
	        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
	        return false;
	      } else {
	        return true;
	      }
	    }
	 
	    function checkRegexp( o, regexp, n ) {
	      if ( !( regexp.test( o.val() ) ) ) {
	        o.addClass( "ui-state-error" );
	        updateTips( n );
	        return false;
	      } else {
	        return true;
	      }
	    }
	 
	    function checkMobile() {
	      var valid = true;
	      allFields.removeClass( "ui-state-error" );
	 
	      valid = valid && checkLength( mobile_number, "mobile number", 11, 11 );
	 
	      valid = valid && checkRegexp( mobile_number, /^[0-9]*$/i, "Mobile number may consist of 0-9." );
	 
	      if ( valid ) {

			  /*console.log(mobile_number.val());*/

			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "registermobile", mobile_number: mobile_number.val() }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

						dialog.dialog( "close" );

						$('#loginusername').val(mobile_number.val());	

						if(data.network == 'Smart'){
							updateTips( "Account created. User this temporary password to sign in: " + "Temporary password: " + data.temppass );
							dialogsuccessfulregister.dialog( "open" );

							// edit here
						}

						if(data.network == 'Globe'){

							updateTips( "Account created. Check you cellphone for your temporary password." );

							dialoglogin.dialog("open");

						}
						

				} else {
					
			        updateTips( "Mobile exists or mobile number is not in proper format!" );

				}


			}, "json");

	        
	      }
	      return valid;
	    }

	    function userlogin() {
	      var valid = true;
	      allFieldslogin.removeClass( "ui-state-error" );
	 
	      valid = valid && checkLengthFields( loginusername, "loginusername", 6, 11 );
	 
	      valid = valid && checkRegexp( loginusername, /^([0-9a-zA-Z])+$/, "Username field only allow : a-z 0-9" );

	      valid = valid && checkLengthFields( loginpassword, "password", 6, 10 );
	 
	      valid = valid && checkRegexp( loginpassword, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
	 
	      if ( valid ) {

			  /*console.log(mobile_number.val());*/

			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "processlogin", loginusername: loginusername.val(), loginpassword: loginpassword.val() }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

					/*if( data.username == '' ){

						current_mobile_number = data.mobile_number;
						from_login = true;

						updateTips( "You don't have username yet. Kindly create please." );
						dialog.dialog( "close" );
						dialogupdateaccountdetails.dialog( "open" );

					} else {

						dialog.dialog( "close" );
						location.reload();

					}*/

					current_mobile_number = data.mobile_number;

					updateTips( "Login Successful." );
					dialoglogin.dialog( "close" );
					dialogsuccessful.dialog( "open" );

					setTimeout(function(){ location.reload(); }, 3000);

				} else {
					
			        updateTips( "Account not found!" );

				}


			}, "json");

	        
	      }
	      return valid;
	    }

	    function createvalidusername	() {
	      var valid = true;
	      allFieldsvalidusername.removeClass( "ui-state-error" );
	 
	      valid = valid && checkLengthFields( validusername, "Username", 6, 11 );
	 
	      valid = valid && checkRegexp( validusername, /^([0-9a-zA-Z])+$/, "Username field only allow : a-z 0-9" );
	 
	      if ( valid ) {

			  /*console.log(mobile_number.val());*/

			$.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "processvalidusername", validusername: validusername.val() }, function( data ) {
			  // console.log( data.id );

				if(data.result == true){

					updateTips( "Thank you! You have successfully created your username. Enjoy playing!" );
					dialogvalidusername.dialog( "close" );
					dialogsuccessful.dialog( "open" );

				} else {
					
			        updateTips( data.errmsg );

				}


			}, "json");

	        
	      }
	      return valid;
	    }

	    function forgotpassword() {
	    	alert('go to forgot password dialog.')
	    }

	    function updateUserAccountDetails() {
	      var valid = true;
	      allFieldsaccountdetails.removeClass( "ui-state-error" );
	 
	      valid = valid && checkLengthFields( username, "username", 6, 10 );
	 
	      valid = valid && checkRegexp( username, /^([0-9a-zA-Z])+$/, "Username field only allow : a-z 0-9" );

	      valid = valid && checkLengthFields( firstname, "firstname", 6, 10 );
	 
	      valid = valid && checkRegexp( firstname, /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/, "Firstname field only allow : a-z 0-9" );

	      valid = valid && checkLengthFields( lastname, "lastname", 6, 10 );
	 
	      valid = valid && checkRegexp( lastname, /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/, "Lastname field only allow : a-z 0-9" );
	 
	      valid = valid && checkRegexp( email, emailRegex, "Please supply valid email." );


	      <?php if(isset($_SESSION['user']['username']) and !empty($_SESSION['user']['username'])): ?>

		      if(password.val() != "") {

			      valid = valid && checkLengthFields( password, "password", 6, 10 );
			 
			      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

			      valid = valid && checkLengthFields( retypepassword, "retype password", 6, 10 );
			 
			      valid = valid && checkRegexp( retypepassword, /^([0-9a-zA-Z])+$/, "Re-Type Password field only allow : a-z 0-9" );
			  }

		  <?php else: ?>

		  		valid = valid && checkLengthFields( password, "password", 6, 10 );
		 
		        valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

		        valid = valid && checkLengthFields( retypepassword, "retype password", 6, 10 );
		 
		        valid = valid && checkRegexp( retypepassword, /^([0-9a-zA-Z])+$/, "Re-Type Password field only allow : a-z 0-9" );

		  <?php endif; ?>
	 
	      if ( valid ) {

	      	<?php if(!empty($_SESSION['user']['mobile_number'])): ?>

	      		current_mobile_number = "<?php echo $_SESSION['user']['mobile_number'] ?>";

	      	<?php endif; ?>

	      	if(password.val() != "") {

		      	if(password.val() != retypepassword.val()) {

					updateTips( "Password and Re-Type Password must match!" );

				} else {

					saveusername = true;

				}

			}else{

				saveusername = true;

			}

			if(saveusername){

				// Variable to store your files
				var files = $('#ImageBrowse')[0].files[0];

				// VALIDATE IMAGE
				var ext = $('#ImageBrowse').val().split('.').pop().toLowerCase();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1 && $('#ImageBrowse').val() != '') {
					    
					    // alert('invalid extension!');

					    updateTips( "Please select image for the avatar." );

				}else{

						var formData = new FormData($('#imageUploadForm')[0]);
						
						formData.append('func', "processupdateaccountdetails");
						formData.append('mobile_number', current_mobile_number);
						formData.append('image', files);

						console.log(formData);
						$.ajax({
						       url:"<?php echo $homeurl.'/?page_id=344' ?>",
						       type: 'POST',
						       data: formData,
						       cache: false,
						       dataType: 'json',
						       processData: false, // Don't process the files
						       contentType: false, // Set content type to false as jQuery will tell the server its a query string request
						       success: function(data, textStatus, jqXHR)
						       {
						           if(data.result)
						           {
						               
						           		dialogupdateaccountdetails.dialog( "close" );

									  	updateTips( "Account successfully updated." );

									  	dialogsuccessful.dialog( "open" );

									  	setTimeout(function(){ location.reload(); }, 3000);

						           }
						           else
						           {
						               // Handle errors here
						               console.log('ERRORS: ' + data.result);

						               updateTips( data.errmsg );


						           }

						            


						       },
						       error: function(jqXHR, textStatus, errorThrown)
						       {
						           // Handle errors here
						           console.log('ERRORS: ' + textStatus);
						           // STOP LOADING SPINNER

						           updateTips( "Unable to update. Check if you have current password, or new username is already used by other user." );
						       }
						  
						});

				} // END VALIDATE IMAGE

			}
	        
	      }
	      return valid;
	    }
	 

	    function buycoins() {

	    	var formData = new FormData($('#buycoinsForm')[0]);
			
			formData.append('func', "processbuycoins");

			console.log(formData);

			$.ajax({
			       url:"<?php echo $homeurl.'/?page_id=344' ?>",
			       type: 'POST',
			       data: formData,
			       cache: false,
			       dataType: 'json',
			       processData: false, // Don't process the files
			       contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			       success: function(data, textStatus, jqXHR)
			       {
			           if(data.result)
			           {

			           		$('#mobile_network').val(data.mobile_network);

			           		if(data.mobile_network == 'SMART'){

			           			$('#ClientReferenceNumber').val(data.ClientReferenceNumber);

			           			dialogbuycoin.dialog( "close" );

							  	updateTips( "You have successfully sent your request to buy this coin. Kindly check your phone and enter the verification code below. REMOVE THIS. Temporary verification code " + data.tempverif );

							  	dialogbuycoinconfirmation.dialog( "open" );

			           		}

			           		if(data.mobile_network == 'GLOBE'){

			           			if(data.haserror) {

			           				dialogbuycoin.dialog( "close" );

			           				updateTips( "Purchase failed. Check your mobile number and load balance." );

							  		dialogsuccessful.dialog( "open" );

			           			}else{

			           				dialogbuycoin.dialog( "close" );

								  	updateTips( "Purchase completed. Coins added to your account. Thank you and enjoy playing!" );

							  		dialogsuccessful.dialog( "open" );

			           			}

			           		}
			               
			           		

			           }
			           else
			           {
			               // Handle errors here
			               console.log('ERRORS: ' + data.result);

			               updateTips( data.errmsg );


			           }

			            


			       },
			       error: function(jqXHR, textStatus, errorThrown)
			       {
			           // Handle errors here
			           console.log('ERRORS: ' + textStatus);
			           // STOP LOADING SPINNER

			           updateTips( "Unable to update. Check if you have current password, or new username is already used by other user." );
			       }
			  
			});

	    	/*updateTips( "You have successfully selected and buy this coin." );
	    	dialogbuycoin.dialog( "close" );
			dialogsuccessful.dialog( "open" );*/
	    }

	    function verifybuycoins () {

			var valid = true;

			allFieldsverification.removeClass( "ui-state-error" );

			valid = valid && checkLengthFields( verifycode, "verifycode", 5, 10 );

			valid = valid && checkRegexp( verifycode, /^([0-9a-zA-Z])+$/, "Verification code field only allow : a-z 0-9" );


			var formData = new FormData($('#formbuycoinsVerification')[0]);
			
			formData.append('func', "processbuycoinsverification");

			console.log(formData);

			$.ajax({
			       url:"<?php echo $homeurl.'/?page_id=344' ?>",
			       type: 'POST',
			       data: formData,
			       cache: false,
			       dataType: 'json',
			       processData: false, // Don't process the files
			       contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			       success: function(data, textStatus, jqXHR)
			       {
			           if(data.result)
			           {
			               
			           		dialogbuycoinconfirmation.dialog( "close" );

						  	updateTips( "Purchase completed. Coins added to your account. Thank you and enjoy playing!" );

						  	dialogsuccessful.dialog( "open" );

			           }
			           else
			           {
			               // Handle errors here
			               console.log('ERRORS: ' + data.result);

			               updateTips( data.errmsg );


			           }

			            


			       },
			       error: function(jqXHR, textStatus, errorThrown)
			       {
			           // Handle errors here
			           console.log('ERRORS: ' + textStatus);
			           // STOP LOADING SPINNER

			           updateTips( "Unable to update. Check if you have current password, or new username is already used by other user." );
			       }
			  
			});

	    }

	    function getrewards() {
	    	
	    }

	    function continuelogin(){
	    	updateTips( "Username or Mobile number is required." );
	    	dialogsuccessfulregister.dialog( "close" );
	    	dialoglogin.dialog("open");
	    }


	    /*FIRST POPUP TO ENTER MOBILE NUMBER ONLY AND TO CHECK IF USERNAME IS EXIST OR NOT. IF NOT WILL OPEN THE NEXT DIALOG.*/
	    dialog = $( "#dialog-form" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Check mobile number": checkMobile,
	        Cancel: function() {
	          dialog.dialog( "close" );
	        }
	      },
	      close: function() {
	        form[ 0 ].reset();
	        allFields.removeClass( "ui-state-error" );
	      }
	    });
	 
	    form = dialog.find( "form" ).on( "submit", function( event ) {
	      event.preventDefault();
	      checkMobile();
	    });
	 
	    /*LOGIN DIALOG.*/
	    dialoglogin = $( "#dialog-form-login" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Sign In": userlogin,
	        // 	"Forgot Password": forgotpassword,
	        Cancel: function() {
	          dialoglogin.dialog( "close" );
	        }
	      },
	      close: function() {
	        form[ 0 ].reset();
	        allFieldslogin.removeClass( "ui-state-error" );
	      }
	    });
	 
	    form = dialoglogin.find( "form" ).on( "submit", function( event ) {
	      event.preventDefault();
	      userlogin();
	    });

	    /*CREATE USERNAME DIALOG.*/
	    dialogvalidusername = $( "#dialog-update-username" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Submit Username": createvalidusername,
	        // 	"Forgot Password": forgotpassword,
	        Cancel: function() {
	          dialogvalidusername.dialog( "close" );
	        }
	      },
	      close: function() {
	        form[ 0 ].reset();
	        allFieldsvalidusername.removeClass( "ui-state-error" );
	      }
	    });
	 
	    form = dialogvalidusername.find( "form" ).on( "submit", function( event ) {
	      event.preventDefault();
	      createvalidusername();
	    });

	    /*DIALOG NUMBER 2. ENTER USERNAME AND PASSWORD*/
	    dialogupdateaccountdetails = $( "#dialog-form-username" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Update Account Details": updateUserAccountDetails/*,
	        Cancel: function() {
	          dialogupdateaccountdetails.dialog( "close" );
	        }*/
	      },
	      close: function() {
	        if(from_login){
	        	location.reload();
	        }else{
	        	formusername[ 0 ].reset();
	        	allFieldsaccountdetails.removeClass( "ui-state-error" );
	        }
	      }
	    });
	 
	    formusername = dialogupdateaccountdetails.find( "form" ).on( "submit", function( event ) {
	      event.preventDefault();
	      updateUserAccountDetails();
	    });

	    /*DIALOG NUMBER 3. USERNAME SUCCESSFULLY UPDATED*/
	    dialogsuccessful = $( "#dialog-successful" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,	      
	      close: function() {
	        location.reload();
	      }
	    });

	    /*DIALOG SUCCESSFULL REGISTER */
	    dialogsuccessfulregister = $( "#dialog-successful-register" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Sign in now": continuelogin,
	        Close: function() {
	          dialogsuccessfulregister.dialog( "close" );
	        }
	      }, 	      
	      close: function() {
	        //location.reload();
	      }
	    });

	    /*DIALOG NUMBER 4. USERNAME SUCCESSFULLY UPDATED*/
	    dialogbuycoin = $( "#dialog-buycoin" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Buy Coins": buycoins/*,
	        Cancel: function() {
	          dialogupdateaccountdetails.dialog( "close" );
	        }*/
	      },      
	      close: function() {
	        // --
	      }
	    });

	    /*DIALOG BUY COINS CONFIRMATION*/
	    dialogbuycoinconfirmation = $( "#dialog-buycoin-confirmation" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 400,
	      modal: true,
	      buttons: {
	        "Submit verification key": verifybuycoins,
	        Cancel: function() {
	          dialogbuycoinconfirmation.dialog( "close" );
	        }
	      },      
	      close: function() {
	        // --
	      }
	    });

	    form = dialogbuycoinconfirmation.find( "form" ).on( "submit", function( event ) {
	      event.preventDefault();
	      verifybuycoins();
	    });

	    /*DIALOG NUMBER 4. USERNAME SUCCESSFULLY UPDATED*/
	    dialoggetrewards = $( "#dialog-getrewards" ).dialog({
	      autoOpen: false,
	      height: 'auto',
	      width: 800,
	      modal: true,	      
	      close: function() {
	        // --
	      }
	    });


	    $( "#mobilecheck" ).button().on( "click", function() {
	      dialog.dialog( "open" );
	    });

	    $( "#userlogin" ).button().on( "click", function() {
	      updateTips( "Username or Mobile number is required." );
	      dialoglogin.dialog( "open" );
	    });

	    $( "#updateusername" ).button().on( "click", function() {
	      dialogupdateaccountdetails.dialog( "open" );
	    });

	    $( "#updateusernameicon" ).button().on( "click", function() {
	      dialogupdateaccountdetails.dialog( "open" );
	    });

	    $( "#logout" ).button().on( "click", function() {
	      $.post( "<?php echo $homeurl.'/?page_id=344' ?>", { func: "logout" }, function( data ) {
			  // console.log( data.id );

		
			  if( data.result ){

			  	location.reload();

			  }


			}, "json");
	    });

	    $( "#buycoins" ).button().on( "click", function() {
	      dialogbuycoin.dialog( "open" );
	    });

	    $( "#getrewards" ).button().on( "click", function() {
	      dialoggetrewards.dialog( "open" );
	    });

	    $( "#reward1" ).button().on( "click", function() {
	    	updateTips( "You have successfully selected this reward 1." );
			dialogsuccessful.dialog( "open" );
	    });

	    $( "#reward2" ).button().on( "click", function() {
	    	updateTips( "You have successfully selected this reward 2." );
			dialogsuccessful.dialog( "open" );
	    });

	    $( "#reward3" ).button().on( "click", function() {
	    	updateTips( "You have successfully selected this reward 3." );
			dialogsuccessful.dialog( "open" );
	    });

	    /*$("#dialog-form").parent().find(".ui-dialog-titlebar-close").css("background","#1C1C1C");*/

	    $( "#mobilecheck" ).removeClass('ui-button');
	    $( "#updateusername" ).removeClass('ui-button');
	    $( "#logout" ).removeClass('ui-button');
	    $( "#logout" ).removeClass('ui-widget');
	    $( "#userlogin" ).removeClass('ui-button');
	    $( "#buycoins" ).removeClass('ui-widget');
	    $( "#buycoins" ).removeClass('ui-button');
	    $( "#getrewards" ).removeClass('ui-widget');
	    $( "#getrewards" ).removeClass('ui-button');


	    $('ul.nav li.dropdown').hover(function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});

	    <?php if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])): ?>
			
			/*CHECK USER IF HAS USERNAME*/

			<?php if($nousername): ?>
				dialogupdateaccountdetails.dialog( "open" );
			<?php endif; ?>

		<?php endif; ?>

	  });
	  </script>

	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/hover.css">

	  <style type="text/css">
	  	.ui-widget-overlay {background: #000; opacity: 0.7; filter: alpha(opacity=70); /* For IE8 and earlier */}
	  </style>

	  <?php if ( !is_front_page() && !is_home() ) : ?>

	  		<style type="text/css">
	  			.site-content {padding-top: 10px;}
	  			/*.logo_wrapper .wrap img {width: 100px;}
				.logo_wrapper .wrap .account_info {margin-top: 0;}
				.logo_wrapper .wrap .account_info img {width: 34px;}
				.logo_wrapper .wrap .account_info span {margin-top: 5px; font-size: 10px;}
				.logo_wrapper .wrap .account_info a {font-size: 10px;}*/
	  		</style>

	  		<script type="text/javascript">
	  			// IFRAME TWEEKS MODIFICATION
	  			jQuery(document).ready(function($) {
	  				window.setTimeout(function(){
			           $('#gamewrapper').contents().find('body').css('background-color','transparent');
			           $('#gamewrapper').contents().find('html').css('background-color','transparent');
		            }, 1000);
		        });
	  		</script>

	  <?php endif; ?>


		<?php if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])): ?>
			
			<style type="text/css">
				.logo_wrapper .wrap .account_info span {margin-right: 42px;}
			</style>

		<?php endif; ?>

</head>

<body <?php body_class(); ?>>

<div id="dialog-form" title="Register with your Mobile Number" style="display: none;"> 
	<p class="validateTips">Mobile number is required.</p>
  <form>
    <fieldset>
      <label for="name">Mobile Number:</label>
      <input type="text" name="mobile_number" id="mobile_number" value="" placeholder="" maxlength="11" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form-login" title="Sign In" style="display: none;"> 
	<p class="validateTips">Username or Mobile number is required.</p>
  <form>
    <fieldset>
      <label for="name">Username or Mobile Number:</label>
      <input type="text" name="loginusername" id="loginusername" value="" placeholder="" class="text ui-widget-content ui-corner-all">
 	  <label for="loginpassword">Password:</label>
 	  <input type="password" name="loginpassword" id="loginpassword" class="text ui-widget-content ui-corner-all">

      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form-username" title="Update Account Details" style="display: none;">
 	
  <form name="photo" id="imageUploadForm" enctype="multipart/form-data">
    <fieldset>
      <label for="username">Username*:
      	<?php if(isset($_SESSION['user']['username']) and empty($_SESSION['user']['username'])): ?>
 	  		<span style="font-size: 10px;">Required to identify you in the GlyphGames Leaderboards.</span>
 	  	<?php endif; ?>
 	  </label>
      <input type="text" name="username" id="username" value="<?php echo $_SESSION['user']['username']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
 	  <label for="password">Password:
 	  	<?php if(isset($_SESSION['user']['username']) and !empty($_SESSION['user']['username'])): ?>
 	  		<span style="font-size: 10px;">Leave blank if you don't want to change your current password.</span>
 	  	<?php endif; ?>
 	  </label>
      <input type="password" name="password" id="password" value="" placeholder="" class="text ui-widget-content ui-corner-all">
      <label for="retypepassword">Re-Type Password:</label>
      <input type="password" name="retypepassword" id="retypepassword" value="" placeholder="" class="text ui-widget-content ui-corner-all">
      <label for="firstname">Firstname*:</label>
      <input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION['user']['firstname']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
      <label for="lastname">Lastname*:</label>
      <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION['user']['lastname']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
      <!--label for="street">Street:</label>
      <input type="text" name="street" id="street" value="<?php echo $_SESSION['user']['street']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
      <label for="city">City:</label>
      <input type="text" name="city" id="city" value="<?php echo $_SESSION['user']['city']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
      <label for="country">Country:</label>
      <select name="country" id="country"><?php echo $tablecountries; ?></select>
      <label for="zip">Zip:</label>
      <input type="text" name="zip" id="zip" value="<?php echo $_SESSION['user']['zip']; ?>" style="width: 40% !important;" placeholder="" class="text ui-widget-content ui-corner-all"-->
      <label for="email">Email*:</label>
      <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email']; ?>" placeholder="" class="text ui-widget-content ui-corner-all">
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
      <center>
      	<br />
      	<?php if(isset($_SESSION['user']['user_avatar']) and !empty($_SESSION['user']['user_avatar'])): ?>

      		<img src="<?php echo $homeurl; ?>/usericon/cropped/<?php echo $_SESSION['user']['user_avatar']; ?>" alt="" class="user_avatar">

      	<?php else: ?>

      		<b>NO AVATAR SELECTED YET!</b>

      	<?php endif; ?>
      </center>
      <label for="name">Upload Avatar: <span style="font-size: 10px;">Max file size: 500 x 500 px.</span></label>
      <input type="file" id="ImageBrowse" name="image" size="30"/>
    </fieldset>
  </form>

  <p class="validateTips">All form fields are required.</p>

</div>

<div id="dialog-update-username" title="Create glyphgames username" style="display: none;"> 
	<p class="validateTips">Username is required to identify you in the glyphgames leaderboards.</p>

	<form name="photo" id="formupdateusername" enctype="multipart/form-data">
		<label for="city">Enter valid username:</label>
	    <input type="text" name="validusername" id="validusername" value="" placeholder="" class="text ui-widget-content ui-corner-all">
	    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </form>
</div>

<div id="dialog-successful" title="Completed" style="display: none;"> 
	<p class="validateTips" style="text-align: center;">You have successfully updated your username.</p>
</div>

<div id="dialog-successful-register" title="Completed" style="display: none;"> 
	<p class="validateTips" style="text-align: center;">Tips here.</p>
</div>

<div id="dialog-buycoin" title="Buy this coin" style="display: none;"> 
	<p>Are you sure you want to buy this coins? This will use your mobile number to buy.</p>
</div>

<div id="dialog-buycoin-confirmation" title="Verify Code" style="display: none;"> 
	<p class="validateTips">Confirmation.</p>

	<form name="photo" id="formbuycoinsVerification" enctype="multipart/form-data">
		<label for="city">Enter verification code:</label>
		<input type="hidden" id="ClientReferenceNumber" name="ClientReferenceNumber" value="">
		<input type="hidden" id="mobile_network" name="mobile_network" value="">
	    <input type="text" name="verifycode" id="verifycode" value="" placeholder="" class="text ui-widget-content ui-corner-all">
	    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </form>
</div>

<div id="dialog-getrewards" title="Select your reward" style="display: none;"> 

	<a href="javascript: void(0);" style="width: 32.5%;" id="reward1"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure01.png" alt="" class="hvr-buzz-out"></a>

	<a href="javascript: void(0);" style="width: 32.5%;" id="reward2"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure02.png" alt="" class="hvr-buzz-out"></a>

	<a href="javascript: void(0);" style="width: 32.5%;" id="reward3"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/Treasure03.png" alt="" class="hvr-buzz-out"></a>

</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="navigation-top">
				<!-- LOGO -->
				<div class="logo_wrapper">
					<div class="wrap">
						<a href="<?php echo $homeurl; ?>"><img src="<?php echo $uploaddir['baseurl'] ?>/2017/07/GlyphGames-Logo-Light.png" alt=""></a>
						<div class="tbluserdata">
							<table border="0">
								<tr>
									<?php if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])): ?>

										<td class="userinfo" style="text-align: left;">
											Welcome! <br />
											<?php
											if(empty($_SESSION['user']['username'])): ?>
												No username
											<?php else: ?>
												<b><a href="javascript: void(0);" id="updateusername"><?php echo $_SESSION['user']['username']; ?></a></b>
											<?php endif; ?>
										</td>
										
										<td>
											<a href="javascript: void(0);" id="updateusernameicon">
												<?php if(isset($_SESSION['user']['user_avatar']) and !empty($_SESSION['user']['user_avatar'])): ?>

										      		<img src="<?php echo $homeurl; ?>/usericon/cropped/<?php echo $_SESSION['user']['user_avatar']; ?>" id="useravatar" alt="">

										      	<?php else: ?>

										      		<img src="<?php echo get_template_directory_uri() ?>/assets/images/Accounts-Def-512x512.png" alt="">

										      	<?php endif; ?>
										    </a>
								      	</td>
									<?php else: ?>
										<td class="userinfo"><a href="javascript: void(0);" id="mobilecheck">Register</a> | <a href="javascript: void(0);" id="userlogin">Sign In</a></td>
										<td><img src="<?php echo get_template_directory_uri() ?>/assets/images/Accounts-Def-512x512.png" alt=""></td>
									<?php endif; ?>
								</tr>
							</table>
						</div>
					</div>
				</div>

				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<div>
						<div class="wrap">
							<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
						</div><!-- .wrap -->
					</div>
				<?php endif; ?>
		</div><!-- .navigation-top -->

		<?php if ( is_front_page() ) { ?>

			<!--CUSTOM BANNER HERE-->
			<section class="testimonials">
		          <div id="customers-testimonials" class="owl-carousel">

		            <!--SLIDE 1 -->
		            <div class="item">
		              
		              <div class="shadow-effect">
		                <img class="pull-right" src="<?php echo $uploaddir['baseurl'] ?>/2017/07/1300x450-Games.png" alt="">
		                <?php /*
						<div class="slider-caption">
							<div class="top-caption">
								<h2>welcome to</h2>
							</div>
						<!-- <div class="middle-caption">
								<h2>Eatingdive</h2>
							</div> -->
							<!--div class="top-caption">
								<h2>Glyphgames.com</h2>
							</div>

							<div class="bottom-caption">
								<h3><i>Have Fun, Enjoy and Relax</i></h3>
							</div-->
								
						</div>
						*/ ?>
		              </div>
		            </div>
		            <!--END OF SLIDE 1 -->
		            <!--SLIDE 2 DISABLED TEMPORARILY -->
		            <!--
		            <div class="item">
		              
		              <div class="shadow-effect">
		                <img class="pull-right" src="<?php echo $uploaddir['baseurl'] ?>/2017/07/1300x450-PlayMore.png" alt="">
		                <?php /*
						<div class="slider-caption slider-caption2">
							<div class="top-caption">
								<h2>More games available!</h2>
							</div>
						<!-- <div class="middle-caption">
								<h2>Eatingdive</h2>
							</div> -->
							<!--div class="top-caption">
								<h2>Exciting, Educational</h2>
							</div>

							<div class="top-caption">
								<h2>And New Games</h2>
							</div>

							<div class="bottom-caption">
								<h3><a href="#">Check it out!</a></h3>
							</div-->
				
						</div>
						*/ ?>
		              </div>
		            </div> -->
		            <!--END OF SLIDE 2 -->

		          </div>
		    </section>
		    <!-- END OF TESTIMONIALS -->
			<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js'></script>
			<!--END CUSTOM BANNER HERE-->

		<?php } else { ?>

			<?php /*get_template_part( 'template-parts/header/header', 'image' );*/ ?>

		<?php } ?>

		

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		/*echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';*/
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
