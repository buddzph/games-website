<?php
   session_start();

global $html5games;

// perform securitycheck here 

securitycheck();

function securitycheck()
{
  // verify if the function is called internally. if not then exit immediately
}

// gets the user's login status from the cookie

function initialize($pagename)
{
   global $html5games;

// check if logged in
   if (isset($_SESSION)) {
      $loginstate = $_SESSION;
   } else {
      $loginstate = array();
   }

// to do: extract the following from the loginstate
   if (!isset($loginstate['ut'])) { 
      $usertype = "";
   } else {
      $usertype = $loginstate['ut'];
   }
   if (!isset($loginstate['ts'])) { 
      $tulistatus = 1;
   } else {  
      $tulistatus = $loginstate['ts'];
   }
   if (!isset($loginstate['bc'])) { 
      $betamodecode = 0;
   } else {
      $betamodecode = $loginstate['bc'];
   }
   if (!isset($loginstate['bu'])) { 
      $betamodeui = 0;
   } else {
      $betamodeui = $loginstate['bu'];
   }

// include the class based on usertype
// if regular user, load the prduction class
// if test user and betamode_code == 0, load production class, else load test class

   if ($pagename == "api") {
      if ($usertype == "test") {
         if ($betamode_code == 0) {
            include("../../prod/class_html5games.php");
         } else {
            include("../../test/class_html5games.php");
         }
      } else {
         include("../../prod/class_html5games.php");
      }
   } else {
      if ($usertype == "test") {
         if ($betamode_code == 0) {
            include("../prod/class_html5games.php");
         } else {
            include("../test/class_html5games.php");
         }
      } else {
         include("../prod/class_html5games.php");
      }
   }

   $html5games = new class_html5games();
   $html5games->initialize($pagename,$loginstate,$usertype,$tulistatus,$betamodecode,$betamodeui);
}

function fblogin() {
	// prod - Add the proper URLS
	$facebookAppId = "171460470053660";
	$facebookAppSecret = "5278f1106c1887c4dbbb9c4cd16b5e61";
	$baseUrl = "http://glyphgames.com";
  
	$facebookBaseUrl = "https://graph.facebook.com/v2.9";
	$redirect = "$baseUrl/home/login.php";
	
	$params = array("client_id=$facebookAppId", "redirect_uri=$redirect");
	$loginParams = array_merge($params, array("scope=public_profile,email"));
	$loginDialog = "https://www.facebook.com/dialog/oauth?" . implode("&", $loginParams);
	$response = array();

	// If no access token in session OR expired, then get new access token
//	$condition1 = !isset($_SESSION["tok"]) || strlen($_SESSION["tok"]) == 0;
//	$condition2 = !isset($_SESSION["exp"]) || date("Y-m-d H:i:s") >= date("Y-m-d H:i:s", strtotime("+" . $_SESSION["exp"] . " seconds"));
        $condition1 = true;
        $condition2 = true;

	try {
		if (isset($_GET["error"])) {
			// Likely from no permissions granted - cancel at the permissions screen
			throw new Exception("Facebook Error: " . $_GET["error_description"] . " - " . $_GET["error_reason"]);
		}
		if ($condition1 || $condition2) {
			// Initial call - get code
			if (!isset($_GET["code"])) {
				header("Location: $loginDialog");
				return;
			} else {
				$accessTokenParams = array_merge($params, array("client_secret=$facebookAppSecret", "code=" . $_GET["code"]));
				$url = implode("&", $accessTokenParams);

				// Exchange code for access token
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, "$facebookBaseUrl/oauth/access_token?$url");
                                $result = curl_exec($ch);
				$access_token = json_decode($result, true);
				$token = $access_token["access_token"];
				curl_close($ch);
				if (isset($access_token["error"])) {
				  throw new Exception("Facebook Access Token Error: " . $access_token["error"]["message"]);
				}
				// print_r($access_token);
				// echo "\n\n";

				// Get permissinos
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, "$facebookBaseUrl/me/permissions?client_id=$facebookAppId&access_token=$token");
				$permissions = json_decode(curl_exec($ch), true);
				curl_close($ch);
				if (isset($permissions["error"])) {
				  throw new Exception("Facebook Permissions Error: " . $permissions["error"]["message"]);
				}
				// print_r($permissions);
				// echo "\n\n";

				// Get /me info for email, name, etc
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, "$facebookBaseUrl/me?fields=id,first_name,last_name,email&access_token=$token");
				$details = json_decode(curl_exec($ch), true);
				curl_close($ch);
				if (isset($details["error"])) {
				  throw new Exception("Facebook Details Error: " . $details["error"]["message"]);
				}
				// print_r($details);
				// echo "\n\n";
				
/*
				// TODO - session vars save in html5gamesclass
				$_SESSION["tok"] = $token;
				$_SESSION["exp"] = $access_token["expires_in"];
				$_SESSION["fid"] = $details["id"],
				$_SESSION["fin"] = $details["first_name"],
				$_SESSION["lan"] = $details["last_name"]
*/
				return array(
				  "tok" => $token,
				  "exp" => $access_token["expires_in"],
				  "fid" => $details["id"],
				  "ema" => $details["email"],
				  "fin" => $details["first_name"],
				  "lan" => $details["last_name"]
				);
			}
                }
	} catch (Exception $e) {
		// DEBUG
		clearFacebookRelatedSessionVars();
		echo "DEBUG\n\n" . $e->getMessage() . "\n\n";
		return null;
	}


}

	function clearFacebookRelatedSessionVars() {
		unset($_SESSION["tok"]);
		unset($_SESSION["exp"]);
		unset($_SESSION["fid"]);
		unset($_SESSION["fin"]);
		unset($_SESSION["lan"]);
	}

?>
