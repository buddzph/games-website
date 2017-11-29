<?php
/* 
Template Name: Login Process
*/ 
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 1);

//get_header();

global $wpdb;

$wpdb->show_errors();

// SMART NUMBER CHECKER
function isSmart($cellnum) {
	$smart_prefix = array(
		"900", "907", "908", "909", "910", "911", "912", "913", "914", "918", 
		"919", "920", "921", "928", "929", "930", "938", "939", "940", "946",
		"947", "948", "949", "950", "951", "989", "998", "999"
	);
	$numberPrefix = substr($cellnum, -10, 3);

	if (in_array($numberPrefix, $smart_prefix)) return true;
	return false;
}


// GLOBE NUMBER CHECKER
function isGlobe($cellnum) {
	$globe_prefix = array(
	   "905", "906", "915", "916", "917", "925", "926", "927", "935", "936", 
	   "937", "945", "973", "974", "975", "976", "977", "978", "979", "994", 
	   "995", "996", "997" 
	);
	$numberPrefix = substr($cellnum, -10, 3);
	if (in_array($numberPrefix, $globe_prefix)) return true;
	return false;
}

// GENERATE 6 DIGITS TEMPORARY PASSWORD
function genRandStr(){
  $a = '';
  $b = '';

  for($i = 0; $i < 3; $i++){
    $a .= chr(mt_rand(65, 90)); // see the ascii table why 65 to 90.    
    $b .= mt_rand(0, 9);
  }

  return $a . $b;
}

function smartcurlregistration($mobile_number){

                $url = 'https://ykvgdvddr5.execute-api.us-east-1.amazonaws.com/dev/mobile-verify/create';

                $request = array("mobileNum" => $mobile_number);
                
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));

                //$dateLog = date("Ymd");
                //$timeLog = date("Y-m-d H:i:s");
                
                $result = curl_exec($ch);

				return $result;
	
  		
  	//TODO: ADD LOGGER
}

function smartcurl($mobile_number){


 //$url = "http://{$this->ip}:{$this->port}/charge/payment/transactions";
                
                /*$request = array(
                                "request" => array(
                                                "appId" => $data["appId"],
                                                "appAuth" => array(
                                                                "username" => $data["username"],
                                                                "password" => $data["password"]
                                                ),
                                                "accessCode" => $data["accessNumber"],
                                                "serviceId" => $data["serviceId"],
                                                "productId" => $data["productId"],
                                                "chargeInfo" => array(
                                                                "mobileNo" => $data["mobileNo"],
                                                                "billDescription" => $data["billDescription"],
                                                                "amount" => $data["amount"],
                                                                "purchaseCategory" => "IVR"
                                                )
                                )
                );*/

                $url = 'http://52.220.44.97:3000/song/sing/request';

                $request = array("cellnum" => '63'.$mobile_number);
                
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));

                //$dateLog = date("Ymd");
                //$timeLog = date("Y-m-d H:i:s");
                
                $result = curl_exec($ch);

                /*$ARRRES = array();
				$ARRRES['info'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				$ARRRES['authToken'] = $result;*/

/*ang important dyan is ung set opt na CURLOPT_POSTFIELDS
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));*/

				return $result;
	
  		
  	//TODO: ADD LOGGER
}

function validateSmart($num_request, $amount, $ClientReferenceNumber, $pin){

	$url = 'http://52.220.44.97:3000/song/sing/validate';

    $request = array("cellnum" => '63'.$num_request, "amount" => $amount, "referenceCode" => $ClientReferenceNumber, "pin" => $pin);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));

    //$dateLog = date("Ymd");
    //$timeLog = date("Y-m-d H:i:s");
    
    $result = curl_exec($ch);

	return $result;

}

function globecurl($mobile_number, $serviceid, $prodid, $message){

	$url = 'http://119.81.67.158:5672/sms/insurge';

	// $url = 'http://10.64.14.134:5672/sms/insurge';

    $request = array("serviceId" => $serviceid, "productId" => $prodid, "linkId" => '12341234123', "message" => $message, "accessCode" => '5677', "mobileNo" => '63'.$mobile_number);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));

    //$dateLog = date("Ymd");
    //$timeLog = date("Y-m-d H:i:s");
	
	$result = curl_exec($ch);

	if(curl_error($ch)){
		//echo 'error:' . curl_error($c);
		$result = curl_error($ch);
	}

	// return $result.' - '.implode(', ', $request);
	return $result;
	
	//TODO: ADD LOGGER

}

function random_probability($probabilities) {
	$rand = rand(0, array_sum($probabilities));
	do {
			$sum = array_sum($probabilities);
			if($rand <= $sum && $rand >= $sum - end($probabilities)) {
				return key($probabilities);
			}
		} while(array_pop($probabilities));
}

switch ($_REQUEST['func']) {
	case 'registermobile':

		// IMPORTANT TO CHECK GLOBE AND SMART USERS
		// get last 10 digits
		$num_request = substr($_REQUEST['mobile_number'], -10);

		$mobile_number = $num_request;

		$checknumber = false;
		$smartuser = false;
		$globeuser = false;

		if(isSmart($mobile_number)):
			$checknumber = true;
			$smartuser = true;
		endif;

		if(isGlobe($mobile_number)):
			$checknumber = true;
			$globeuser = true;
		endif;
		// END IMPORTANT TO CHECK GLOBE AND SMART USERS

		if($checknumber and strlen($mobile_number) == 10):

			try {

				$myrows = $wpdb->get_results( "SELECT * FROM user WHERE celno = '". $mobile_number ."'" );

				if(count($myrows) > 0):

					// MEANING THE NUMBER IS EXIST IN THE DATABASE
					$res['result'] = false;

				else:

					// INSERT AND SEND TEMPORARY PASSWORD AND FREE COINS
					$temppass = genRandStr();

					$ins['celno'] = $mobile_number;
					
					$ins['dt_registered'] = date('Y-m-d H:i:s');
					// $ins['tot_freetokens'] = 10;
					$ins['tokens'] = 10;

					// PUT THE CODE SEND TEMPORARY PASSWORD TO MOBILE

						if($smartuser):

							$ins['password'] = md5($temppass);

							$res['temppass'] = $temppass;
/*
							$genTempPass = smartcurlregistration($_REQUEST['mobile_number']);

							$gen = json_decode($genTempPass, TRUE);

							$ins['password'] = md5($gen['result'][0]['createdCode']);*/

							$res['network'] = 'Smart';

						endif;

						if($globeuser):

							$serviceid = 'ph56772000044432';
							$prodid = '1000159848';
							$message = 'Thank you! Here is your temporary password: ' . $temppass;

							$getcode = globecurl($mobile_number, $serviceid, $prodid, $message);

							$decoderes = json_decode($getcode, TRUE);

							// print_r($decoderes);

							$ins['password'] = md5($temppass);

							$res['decoderes'] = $decoderes;
							$res['getcode'] = $getcode;

							$res['temppass'] = $temppass;
							$res['network'] = 'Globe';

						endif;

					// END PUT THE CODE SEND TEMPORARY PASSWORD TO MOBILE

					$wpdb->insert( 'user', $ins );

					$res['result'] = true;

				endif;

			} catch (Exception $e) {

          		$res['result'] = false;

          	}

        else:

        	$res['result'] = false;

		endif;

		break;

	case 'processlogin':

		// get last 10 digits
		$username = $_REQUEST['loginusername'];
		$password = md5($_REQUEST['loginpassword']);

		$ismobilenumber = false;
	    if (!preg_match('/^[0-9]+$/', $username)) {
	        // its a username
	    } else {
	    	// its a password
	        $ismobilenumber = true;
	    }

	    if($ismobilenumber):

	    	$num_request = substr($username, -10);

			$mobile_number = $num_request;

			$myrows = $wpdb->get_results( "SELECT * FROM user WHERE celno = '". $mobile_number ."' and password = '". $password ."'" );

		else:

			$myrows = $wpdb->get_results( "SELECT * FROM user WHERE username = '". $username ."' and password = '". $password ."'" );

		endif;

		$res = array();

		/*$table = 'subscribers';
		$data = array();
		$data['lastlogin'] = date('Y-m-d H:i:s');

		$wpdb->update( $table, $data, array('mobile_number' => $mobile_number) );*/

		if(count($myrows) > 0):

			$_SESSION['user']['id'] = $myrows[0]->id;
			$_SESSION['user']['mobile_number'] = $myrows[0]->celno;
			$_SESSION['user']['username'] = $myrows[0]->username;
			$_SESSION['user']['firstname'] = $myrows[0]->firstname;
			$_SESSION['user']['lastname'] = $myrows[0]->lastname;
			/*$_SESSION['user']['street'] = $myrows[0]->street;
			$_SESSION['user']['city'] = $myrows[0]->city;
			$_SESSION['user']['country'] = $myrows[0]->country;
			$_SESSION['user']['zip'] = $myrows[0]->zip;*/
			$_SESSION['user']['email'] = $myrows[0]->email;
			$_SESSION['user']['user_avatar'] = $myrows[0]->user_avatar;

			if(isSmart($myrows[0]->celno)):
				$_SESSION['user']['network'] = 'SMART';
			endif;

			if(isGlobe($myrows[0]->celno)):
				$_SESSION['user']['network'] = 'GLOBE';
			endif;

			$res['result'] = true;

		else:

			$res['result'] = false;

		endif;

		break;
	
	case 'processvalidusername':

		$username = $_REQUEST['validusername'];

		$checkusername = $wpdb->get_results( "SELECT * FROM user WHERE username = '".$username."'" );

		if(count($checkusername) > 0):

			$res['errmsg'] = 'Username is already taken. Kindly supply valid username.';
			$res['result'] = false;

		else:

			$table = 'user';

			$data['username'] = $username;

			$wpdb->update( $table, $data, array('celno' => $_SESSION['user']['mobile_number']) );

			// SIMPLY ADD TO SESSIONS
			$_SESSION['user']['username'] = $username;

			// $res['session'] = $_SESSION; 			

			$res['result'] = true;

		endif;

		break;

	case 'processupdateaccountdetails':

		$table = 'user';
		$data = array();


		if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {

			// NOTHING TO DO

		}else{

			$path = getcwd();

			//echo $path.'/wp-content/themes/twentyseventeen/template-parts/imageManipulator.php';

			//include('imageManipulator.php');

			$uploaddir = $path.'/usericon/';

			$temp = explode(".", $_FILES["image"]["name"]);
			$newbasename = round(microtime(true));
			$newfilename =  $newbasename . '.' . end($temp);

			// AVATAR FILENAME
			$data['user_avatar'] = $newfilename;

			if(move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir . $newfilename)):
				chmod($uploaddir . $newfilename, 0777);

				if(end($temp) == 'jpg' or end($temp) == 'JPG' or end($temp) == 'jpeg' or end($temp) == 'JPEG'):
					$image = imagecreatefromjpeg($uploaddir . $newfilename);
				elseif(end($temp) == 'png' or end($temp) == 'PNG'):
					$image = imagecreatefrompng($uploaddir . $newfilename);
				endif;

				$filename = $uploaddir.'cropped/' . $newfilename;

				$thumb_width = 200;
				$thumb_height = 200;

				$width = imagesx($image);
				$height = imagesy($image);

				$original_aspect = $width / $height;
				$thumb_aspect = $thumb_width / $thumb_height;

				if ( $original_aspect >= $thumb_aspect )
				{
				   // If image is wider than thumbnail (in aspect ratio sense)
				   $new_height = $thumb_height;
				   $new_width = $width / ($height / $thumb_height);
				}
				else
				{
				   // If the thumbnail is wider than the image
				   $new_width = $thumb_width;
				   $new_height = $height / ($width / $thumb_width);
				}

				$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

				if(end($temp) == 'png' or end($temp) == 'PNG'):
					@imagealphablending($thumb, false);
					@imagesavealpha($thumb, true);
				endif;

				// Resize and crop
				imagecopyresampled($thumb,
				                   $image,
				                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
				                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
				                   0, 0,
				                   $new_width, $new_height,
				                   $width, $height);

				if(end($temp) == 'jpg' or end($temp) == 'JPG' or end($temp) == 'jpeg' or end($temp) == 'JPEG'):
					imagejpeg($thumb, $filename, 80);
				elseif(end($temp) == 'png' or end($temp) == 'PNG'):
					imagepng($thumb, $uploaddir.'cropped/' . $newbasename . '.png');
				endif;
				chmod($uploaddir . $newfilename, 0777);

			endif;

		}

		$mobile_number = $_REQUEST['mobile_number'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$firstname = $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		/*$street = $_REQUEST['street'];
		$city = $_REQUEST['city'];
		$country = $_REQUEST['country'];
		$zip = $_REQUEST['zip'];*/
		$email = $_REQUEST['email'];

		$myrows = $wpdb->get_results( "SELECT * FROM user WHERE celno = '". $mobile_number ."'" );

		/*echo "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'";

		echo '<pre>';
		print_r($myrows);
		echo '</pre>';*/

		$res = array();

		if(count($myrows) > 0):
			
			$res['result'] = true;

			$pass = 0;


			/*CHECK EMAIL ADDRESS*/
			$checkemailaddress = $wpdb->get_results( "SELECT * FROM user WHERE email = '".$email."' and celno != '". $mobile_number ."'" );

			if(count($checkemailaddress) > 0): // email is taken

				$res['errmsg'] = 'Email address is already taken. Kindly supply valid email address.';
				$res['result'] = false;

			else: // email pass.

				$res['newusername'] = false;

				if(!empty($myrows[0]->username)):

					if($myrows[0]->username != $username):

						$checkusername = $wpdb->get_results( "SELECT * FROM user WHERE username = '".$username."' and celno != '". $mobile_number ."'" );

						if(count($checkusername) > 0):

							$res['errmsg'] = 'Username is already taken. Kindly supply valid username.';
							$res['result'] = false;

						else:

							if(empty($myrows[0]->password)):

								if(!empty($password)):
									$data['password'] = md5($password);
									$pass++;
								else:
									$res['errmsg'] = 'Please supply valid password.';
									$res['result'] = false;
								endif;

							else:

								if(!empty($password)):
									$data['password'] = md5($password);								
								endif;
								$pass++;

							endif;

						endif;

						//echo 1;

					else:

						if(empty($myrows[0]->password)):

							if(!empty($password)):
								$data['password'] = md5($password);
								$pass++;
							else:
								$res['errmsg'] = 'Please supply valid password.';
								$res['result'] = false;
							endif;

						else:

							if(!empty($password)):
								$data['password'] = md5($password);							
							endif;
							$pass++;

						endif;

						//echo 2;

					endif;

				else:

					$checkusername = $wpdb->get_results( "SELECT * FROM user WHERE username = '".$username."' and celno != '". $mobile_number ."'" );

					if(count($checkusername) > 0):

						$res['errmsg'] = 'Username is already taken. Kindly supply valid username.';
						$res['result'] = false;

					else:

						$res['newusername'] = true;
						
						if(!empty($password)):

							$data['password'] = md5($password);
							$pass++;

						else:

							$res['errmsg'] = 'Please supply valid password.';
							$res['result'] = false;

						endif;

					endif;



					//echo 3;

				endif; // end of checking username

			endif; // end of checking email address

			if($pass > 0):

				$data['username'] = $username;
				$data['firstname'] = $firstname;
				$data['lastname'] = $lastname;
				/*$data['street'] = $street;
				$data['city'] = $city;
				$data['country'] = $country;
				$data['zip'] = $zip;*/
				$data['email'] = $email;

				$wpdb->update( $table, $data, array('celno' => $mobile_number) );

				$session = $wpdb->get_results( "SELECT * FROM user WHERE celno = '". $mobile_number ."'" );

				$_SESSION['user']['id'] = $session[0]->id;
				$_SESSION['user']['celno'] = $session[0]->celno;
				$_SESSION['user']['username'] = $session[0]->username;
				$_SESSION['user']['firstname'] = $session[0]->firstname;
				$_SESSION['user']['lastname'] = $session[0]->lastname;
				/*$_SESSION['user']['street'] = $session[0]->street;
				$_SESSION['user']['city'] = $session[0]->city;
				$_SESSION['user']['country'] = $session[0]->country;
				$_SESSION['user']['zip'] = $session[0]->zip;*/
				$_SESSION['user']['email'] = $session[0]->email;
				$_SESSION['user']['user_avatar'] = $session[0]->user_avatar;

				if(isSmart($session[0]->celno)):
					$_SESSION['user']['network'] = 'SMART';
				endif;

				if(isGlobe($session[0]->celno)):
					$_SESSION['user']['network'] = 'GLOBE';
				endif;

				$res['result'] = true;

			else:

				// $res['errmsg'] = 'Please complete all the required fields.';
				$res['result'] = false;

			endif;

		else:

			$res['errmsg'] = 'Mobile number not found!';
			$res['result'] = false;

		endif;

		break;

	case 'processbuycoins':

		// IMPORTANT TO CHECK GLOBE AND SMART USERS
		// get last 10 digits
		$num_request = $_SESSION['user']['mobile_number'];

		$mobile_number = $num_request;

		$checknumber = false;
		$smartuser = false;
		$globeuser = false;

		if(isSmart($mobile_number)):
			$checknumber = true;
			$smartuser = true;
		endif;

		if(isGlobe($mobile_number)):
			$checknumber = true;
			$globeuser = true;
		endif;
		// IMPORTANT TO CHECK GLOBE AND SMART USERS		

		$ins['subscribers_id'] = $_SESSION['user']['id'];
		$ins['coins_id'] = $_REQUEST['coinid'];

		if($smartuser): // SMART USERS
			
			// {"response":{"ResponseCode":"2012","ResponseDescription":"PIN sent to subscriber","ClientReferenceNumber":"01120-20170824043727","ServerReferenceNumber":"eed73a30-8885-11e7-a3dd-0a6db7b90000"}}</pre>{"response":"{\"response\":{\"ResponseCode\":\"2012\",\"ResponseDescription\":\"PIN sent to subscriber\",\"ClientReferenceNumber\":\"01120-20170824043727\",\"ServerReferenceNumber\":\"eed73a30-8885-11e7-a3dd-0a6db7b90000\"}}","tempverif":"FEJ632","result":true}

			$getcode = smartcurl($mobile_number);

			$decoderes = json_decode($getcode, TRUE);

			foreach ($decoderes as $key => $value) {
				$ClientReferenceNumber = $value['ClientReferenceNumber'];
			}

			//echo $ClientReferenceNumber = $getcode['response']['ClientReferenceNumber'];

			$ins['mobile_network'] = 'SMART';
			$ins['smart_ClientReferenceNumber'] = $ClientReferenceNumber;

			$wpdb->insert( 'coinsavailed', $ins );

			//$resArr = json_decode($getcode);
			// echo "<pre>"; print_r($getcode); echo "</pre>";

			$res['mobile_network'] = 'SMART';
			$res['ClientReferenceNumber'] = $ClientReferenceNumber;

			$msgstatus = true;

		endif;

		// $res['response'] = $getcode;
		// $res['cellnum'] = $mobile_number;

		if($globeuser): // GLOBE USERS

			$verificationcode = genRandStr(); // NO NEED FOR SMART USERS

			$ins['verificationcode'] = $verificationcode;

			//$res['tempverif'] = $verificationcode; // NO NEED FOR SMART USERS

			$serviceid = 'ph56772000044433'; // 2.50 pesos
			$prodid = '1000159911';
			$message = 'CHARGED Thank you! You have successfully purchased the coins at GlyphGames.com. Enjoy playing!';

			$getcode = globecurl($mobile_number, $serviceid, $prodid, $message);

			if($getcode == 'OK'):

				$ins['mobile_network'] = 'GLOBE';
				$ins['status'] = 1;
				$wpdb->insert( 'coinsavailed', $ins );

				$getcoinamount = $wpdb->get_results( "SELECT c.coin_count, c.coin_price FROM coins AS c
													WHERE c.id = '". $_REQUEST['coinid'] ."'" );

				$coincount = $getcoinamount[0]->coin_count;


				// CHECK USER EXISTING TOKENS
				$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

				if(count($checkuser) > 0):
					$totalcoins = $checkuser[0]->tokens + $coincount;
				endif;

				// UPDATE USER
				$tableuser = 'user';

				$upduser['tokens'] = $totalcoins;

				$wpdb->update( $tableuser, $upduser, array('id' => $_SESSION['user']['id']) );

			else:

				$res['haserror'] = true;

			endif;

			$res['mobile_network'] = 'GLOBE';

			$msgstatus = true;

		endif;
		
		$res['result'] = $msgstatus;

		break;

	case 'processbuycoinsverification':

		$mobile_network = $_REQUEST['mobile_network'];

		if($mobile_network == 'SMART'):

			$ClientReferenceNumber = $_REQUEST['ClientReferenceNumber'];
			$num_request = $_SESSION['user']['mobile_number'];
			$pin = $_REQUEST['verifycode'];

			$getcoinamount = $wpdb->get_results( "SELECT c.coin_count, c.coin_price FROM coins AS c
													LEFT JOIN coinsavailed AS cs 
													ON c.id = cs.coins_id
													WHERE cs.subscribers_id = '". $_SESSION['user']['id'] ."' 
														AND cs.smart_ClientReferenceNumber = '".$ClientReferenceNumber."'" );

			$coincount = $getcoinamount[0]->coin_count;
			$amount = $getcoinamount[0]->coin_price;

			$validateSmart = validateSmart($num_request, $amount, $ClientReferenceNumber, $pin);

			$decodevalidate = json_decode($validateSmart, TRUE);

			$haserror = 0;
			foreach ($decodevalidate as $key => $value) {
				if(!empty($value['error']['error_code'])):
					$haserror++;
				endif;
			}

			if($haserror > 0):

				$res['result'] = false;

			else:

				// CHECK USER EXISTING TOKENS
				$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

				if(count($checkuser) > 0):
					$totalcoins = $checkuser[0]->tokens + $coincount;
				endif;

				$table = 'coinsavailed';

				$data['status'] = 1;

				$wpdb->update( $table, $data, array('subscribers_id' => $_SESSION['user']['id'], 'smart_ClientReferenceNumber' => $ClientReferenceNumber) );

				// UPDATE USER
				$tableuser = 'user';

				$upduser['tokens'] = $totalcoins;

				$wpdb->update( $tableuser, $upduser, array('id' => $_SESSION['user']['id']) );

				$res['result'] = true;

			endif;


		elseif($mobile_network == 'GLOBE'):

			/*$verificationcode = $_REQUEST['verifycode'];

			$checkverif = $wpdb->get_results( "SELECT * FROM coinsavailed WHERE subscribers_id = '". $_SESSION['user']['id'] ."' AND verificationcode = '".$verificationcode."'" );

			if(count($checkverif) > 0):

				$table = 'coinsavailed';

				$data['status'] = 1;

				$wpdb->update( $table, $data, array('subscribers_id' => $_SESSION['user']['id'], 'verificationcode' => $verificationcode) );

				// GET COIN COUNTS
				$checkcoins = $wpdb->get_results( "SELECT * FROM coins WHERE id = '". $checkverif[0]->coins_id ."'" );

				if(count($checkcoins) > 0):
					$coincount = $checkcoins[0]->coin_count;
				endif;

				// CHECK USER EXISTING TOKENS
				$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

				if(count($checkuser) > 0):
					$totalcoins = $checkuser[0]->tokens + $coincount;
				endif;

				// UPDATE USER
				$tableuser = 'user';

				$upduser['tokens'] = $totalcoins;

				$wpdb->update( $tableuser, $upduser, array('id' => $_SESSION['user']['id']) );

				$res['result'] = true;

			endif;*/

		endif;

		break;

	case 'availfreecoins':

		$checktoday = date('Y-m-d');
		$checkbutton = $wpdb->get_results( "SELECT * FROM user WHERE id = ".$_SESSION['user']['id']." and free_tokens_status = 1 and free_tokens_date_availed = '".$checktoday."'");

		if(count($checkbutton) > 0):

			$res['result'] = false;

		else:

			$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

			if(count($checkuser) > 0):
				$totalcoins = $checkuser[0]->tokens + 10;
			endif;

			$e_table = 'user';

			$e_data['free_tokens_status'] = 1;
			$e_data['free_tokens_date_availed']= date('Y-m-d');
			$e_data['tokens'] = $totalcoins;

			$wpdb->update( $e_table, $e_data, array('id' => $_SESSION['user']['id']) );

			$res['result'] = true;

		endif;

		$res['result'] = true;

		break;

	case 'accountstatus':

		$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

		$table = '<table class="rwd-table" style="font-size: 11px;">
						  <tr>
						    <th>Username</th>
						    <th style="text-align: center;">Coins Left</th>
						    <th style="text-align: center;">Total Tickets</th>
						  </tr>';

		foreach ($checkuser as $key => $value) {
			$table .= '<tr>
								    <td data-th="Username">'. $value->username .'</td>
								    <td data-th="Coinsleft" style="text-align: center;">'. $value->tokens .'</td>
								    <td data-th="TotalTickets" style="text-align: center;">'. $value->tickets .'</td></tr>';
		}


		$table .= '</table>';

		// echo $table;

		$res['table'] = $table;
		$res['result'] = true;

		break;

	case 'getuserdata':

		$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

		$grewards_limit = $wpdb->get_results( "SELECT * FROM rewards_limit");

		if($checkuser[0]->tickets >= $grewards_limit[0]->rewards_limit):

			$rewards = floor($checkuser[0]->tickets / $grewards_limit[0]->rewards_limit);

		else:

			$rewards = 0;

		endif;

		$table = '<table style="width: auto;">
	    			<tr>
	    				<th>Username:</th>
	    				<td>'.$checkuser[0]->username.'</td>
	    			</tr>
	    			<tr>
	    				<th>Coin balance:</th>
	    				<td>'.$checkuser[0]->tokens.'</td>
	    			</tr>
	    			<tr>
	    				<th>Total earned tickets:</th>
	    				<td>'.$checkuser[0]->tickets.'</td>
	    			</tr>
	    		</table>';

		

		// echo $table;

		$res['userdata'] = $table;
		$res['try'] = $rewards;
		$res['result'] = true;

		break;

	case 'getreward':

		$checkuser = $wpdb->get_results( "SELECT * FROM user WHERE id = '". $_SESSION['user']['id'] ."'" );

		$grewards_limit = $wpdb->get_results( "SELECT * FROM rewards_limit");

		if($checkuser[0]->tickets >= $grewards_limit[0]->rewards_limit):

			// $rewards = floor($checkuser[0]->tickets / 5000);

			$checkbutton = $wpdb->get_results( "SELECT * FROM rewards WHERE status = 1 and counts != running");

    		$probabilities = array();

    		foreach ($checkbutton as $key => $value) {
    		
    			$probabilities[$value->id] = $value->probability;

    		}

    		$key = random_probability($probabilities);

    		$checkreward = $wpdb->get_results( "SELECT * FROM rewards WHERE id = $key");

    		$rewardtype = $checkreward[0]->type;
    		$reward = $checkreward[0]->reward;

			$e_table = 'user';
		
    		if($rewardtype == 'coins'):
				$e_data['tokens'] = $checkuser[0]->tokens + $reward;
			endif;

			$e_data['tickets']= $checkuser[0]->tickets - $grewards_limit[0]->rewards_limit;

			$wpdb->update( $e_table, $e_data, array('id' => $_SESSION['user']['id']) );

			if($reward != 0):
				$r_table = 'rewards';
				$r_data['running'] = $checkreward[0]->running + 1;
				$wpdb->update( $r_table, $r_data, array('id' => $key) );
			endif;

			$res['rewardtype'] = $rewardtype;
    		$res['reward'] = $reward;
    		$res['result'] = true;

		else:

			$rewards = 0;

			$res['result'] = false;

		endif;

		break;

	case 'refreshbtn':

		$uploaddir = wp_upload_dir();

		$arraybtns = array('Treasure01.png', 'Treasure02.png', 'Treasure03.png');

		shuffle($arraybtns);

		$images = '';
		$cntimages = 0;
		foreach ($arraybtns as $image)
		{
			$cntimages++;
		    $images .= '<a href="javascript: void(0);" onclick="pickreward('.$cntimages.');" class="reward_img" id="reward'.$cntimages.'">';
		    $images .= "\t" . '<img src="' . $uploaddir['baseurl'] . '/2017/07/' . $image . '" class="hvr-buzz-out"/>';
		    $images .= '</a>';
		}

		$res['buttons'] = $images;
		$res['result'] = true;

		break;

	case 'logout':

		unset($_SESSION['user']);
		$res['result'] = true;

		break;

	default:
		# code...
		break;
}

echo json_encode($res);

//get_footer(); ?>