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

		else:

			$res['result'] = false;

		endif;


		break;
	

	case 'processusername':

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

			$table = 'subscribers';
			$data = array();
			$data['username'] = $username;
			$data['password'] = md5($password);
			$data['lastlogin'] = date('Y-m-d H:i:s');

			$wpdb->update( $table, $data, array('mobile_number' => $mobile_number) );

			$session = $wpdb->get_results( "SELECT * FROM subscribers WHERE mobile_number = '". $mobile_number ."'" );

			$_SESSION['user']['id'] = $session[0]->id;
			$_SESSION['user']['mobile_number'] = $session[0]->mobile_number;
			$_SESSION['user']['username'] = $session[0]->username;

			$res['result'] = true;

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