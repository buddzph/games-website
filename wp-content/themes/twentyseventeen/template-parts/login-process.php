<?php
/* 
Template Name: Login Process
*/ 


//get_header();

global $wpdb;

switch ($_REQUEST['func']) {
	case 'processlogin':
		$mobile_number = $_REQUEST['mobile_number'];


		$myrows = $wpdb->get_results( "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'" );

		/*echo "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'";

		echo '<pre>';
		print_r($myrows);
		echo '</pre>';*/

		$res = array();

		$table = 'subscribers';
		$data = array();
		$data['lastlogin'] = date('Y-m-d H:i:s');

		$wpdb->update( $table, $data, array('mobile_number' => $mobile_number) );

		if(count($myrows) > 0):

			$res['id'] = $myrows[0]->id;
			$res['mobile_number'] = $myrows[0]->mobile_number;
			$res['username'] = $myrows[0]->username;
			$res['firstname'] = $myrows[0]->firstname;
			$res['lastname'] = $myrows[0]->lastname;
			$res['email'] = $myrows[0]->email;
			$res['result'] = true;

			$_SESSION['user']['id'] = $myrows[0]->id;
			$_SESSION['user']['mobile_number'] = $myrows[0]->mobile_number;
			$_SESSION['user']['username'] = $myrows[0]->username;
			$_SESSION['user']['user_avatar'] = $myrows[0]->user_avatar;

		else:

			$res['result'] = false;

		endif;


		break;
	

	case 'processusername':

		$table = 'subscribers';
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

		$myrows = $wpdb->get_results( "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'" );

		/*echo "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'";

		echo '<pre>';
		print_r($myrows);
		echo '</pre>';*/

		$res = array();

		if(count($myrows) > 0):
			
			$res['result'] = true;

			$pass = 0;
			if(!empty($myrows[0]->username)):

				if($myrows[0]->username != $username):

					$checkusername = $wpdb->get_results( "SELECT * FROM subscribers WHERE username = '".$username."' and mobile_number != '". $mobile_number ."'" );

					if(count($checkusername) > 0):

						$res['result'] = false;

					else:

						if(empty($myrows[0]->password)):

							if(!empty($password)):
								$data['password'] = md5($password);
								$pass++;
							else:
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

				if(!empty($password)):
					$data['password'] = md5($password);
					$pass++;
				else:

					$res['result'] = false;

				endif;

				//echo 3;

			endif;

			if($pass > 0):

				$data['username'] = $username;
				$data['lastlogin'] = date('Y-m-d H:i:s');

				$wpdb->update( $table, $data, array('mobile_number' => $mobile_number) );

				$session = $wpdb->get_results( "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'" );

				$_SESSION['user']['id'] = $session[0]->id;
				$_SESSION['user']['mobile_number'] = $session[0]->mobile_number;
				$_SESSION['user']['username'] = $session[0]->username;
				$_SESSION['user']['user_avatar'] = $session[0]->user_avatar;

				$res['result'] = true;

			else:

				$res['result'] = false;

			endif;

		else:

			$res['result'] = false;

		endif;

		break;

	case 'logout':

		unset($_SESSION['user']);
		$res['result'] = true;

		break;

	default:
		# code...
		break;
}

// echo json_encode(array("result"=>$mobile_number));


/*[0] => stdClass Object
        (
            [id] => 1
            [mobile_number] => 09062846807
            [username] => thebuddz
            [password] => 5f4dcc3b5aa765d61d8327deb882cf99
            [firstname] => Frederick
            [lastname] => de Guzman
            [email] => frederick@glyphgames.com
            [dateentered] => 2017-07-26 15:41:29
        )*/

echo json_encode($res);

//get_footer(); ?>