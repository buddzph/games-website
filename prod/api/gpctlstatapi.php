<?php
if($_SERVER['HTTP_HOST'] == 'localhost'):
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'glyphgames');
else:
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'glyph_dbuser');
   define('DB_PASSWORD', 'Qebr91951Qw!');
   define('DB_DATABASE', 'db_html5games');
endif;

   date_default_timezone_set('Asia/Manila');

   header("Access-Control-Allow-Origin: *");
   header("Content-Type: application/json");

   $reqRaw = file_get_contents('php://input');
   $req = json_decode($reqRaw);

   
   apilog("REQ: " . $reqRaw . "\r\n");
   if (!isset($req->method)) {
      doFail("Error: Method not set");
      exit(0);
   }
   if (!isset($req->sessionid)) {
      doFail("Error: Sessionid not set");   
      exit(0);
   }

   if ($req->method == "playstart") {
      doPlaystart($req);
   } else if ($req->method == "playend")  {
      doPlayend($req);
   } else {
      doFail("Error: Method unknown.");
      exit(0);
   }

function doPlaystart($req)
{
   $mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   if (mysqli_connect_errno()) {
      doPlaystartFail("Mysql error");
      exit;
   }

   $sessionid = $req->sessionid;
   $coins = getusercoins($mysqli,$sessionid);
   $coins = 9999;
   $cost = getgamecost($mysqli,$sessionid);
   if ($coins < $cost) {
      doPlaystartFail("You don't have enough coins ($coins) to play this game ($cost).");
   } else {
      if ($cost > 0) {
         deductcoins($mysqli,$sessionid,$cost);
      }
      $gameid = getgameidfromsessionid($sessionid);
      doPlaystartSuccess("",$gameid);
   }
//   } else {
//      doPlaystartFail("Error: Sessionid invalid");
//   }
    $mysqli->close();
}

function doPlayend($req)
{
   $mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   if (mysqli_connect_errno()) {
      doPlaystartFail("Mysql error");
      exit;
   }

   if (!isset($req->gameplayid)) {
      doFail("Error: Gameplayid not set");
   }
   $sessionid = $req->sessionid;
   $gameplayid = $req->gameplayid;
   $tickets = getticketswon($mysqli,$sessionid,$gameplayid,$req->score);
// doSuccess($req->sessionid . " " . $req->gameplayid . " " . $req->score);
  doSuccess("You won $tickets tickets. Play more to get more!",""); 
//      } else {
//         doFail("Error: Gameplayid invalid");
//      }
//   } else {
//      doFail("Error: Sessionid invalid");
//   }
    $mysqli->close();
   
}

function doPlaystartSuccess($message,$gameplayid) {
   $reply = new stdClass();
   $reply->status = "success";
   $reply->message = $message;
   $reply->gameplayid = $gameplayid; 
   $json = json_encode($reply);
   apilog("REP: " . $json . "\r\n");
   echo $json;
}

function doSuccess($message) {
   $reply = new stdClass();
   $reply->status = "success";
   $reply->message = $message;
   $json = json_encode($reply);
   apilog("REP: " . $json . "\r\n");
   echo $json;
}

function doPlaystartFail($message) {
   $reply = new stdClass();
   $reply->status = "fail";
   $reply->message = $message;
   $reply->gameplayid = ""; 
   $json = json_encode($reply);
   apilog("REP: " . $json . "\r\n");
   echo $json;
}

function doFail($message) {
   $reply = new stdClass();
   $reply->status = "fail";
   $reply->message = $message;
   $json = json_encode($reply);
   apilog("REP: " . $json . "\r\n");
   echo $json;
}

function apilog($msg)
{
   $taymNow = time();   
   $dey   = date("Y-m-d",$taymNow);
   $taym  = date("H:i:s",$taymNow);
   $ip = $_SERVER['REMOTE_ADDR'];
   $fname = "../../log.txt";
   file_put_contents($fname,$dey . " " . $taym . " " . $ip . " : " . $msg,FILE_APPEND);
}

function getuidfromsessionid($sessionid)
{
   $s = substr($sessionid,14);
   $idx = strpos($s,"_");
   $s = substr($s,0,$idx);
   return($s);
}

function getgameidfromsessionid($sessionid)
{
   $s = substr($sessionid,14);
   $idx = strpos($s,"_");
   $s = substr($s,$idx+1);
   return($s);
}

function getusercoins($mysqli,$sessionid)
{
   $uid = getuidfromsessionid($sessionid);
      $query = "SELECT tokens from user WHERE id = '" . $uid ."'";
apiLog("gETUSRCOINS $query")
      $res = $mysqli->query($query);
      if ($res === false) {
apiLog("1");
         $retVal = 0;
      } else {
         $result = $res->fetch_assoc();
         if ($result === NULL) {
apiLog("2");
            $retVal = 0;
         } else {
apiLog("3");
            $retVal = $result['tokens'];
         }
      }
      return($retVal);
}

function deductcoins($mysqli,$sessionid,$cost)
{
   $uid = getuidfromsessionid($sessionid);

      $query = "UPDATE user SET tokens=tokens-$cost WHERE id = '" . $uid ."'";
      $res = $mysqli->query($query);
      if ($res === false) {
         apilog("ok " . $query . ' ' . $mysqli->error);
      } else {
         apilog("ok " . $query);
      }
}

function getgamecost($mysqli,$sessionid)
{
   $gameid = getgameidfromsessionid($sessionid);
   $amount = 0;
   $query = "SELECT * from game WHERE gameid='$gameid'";
   $res = $mysqli->query($query);
   if ($res === false) {
   } else {
      $result = $res->fetch_assoc();
      if ($result !== NULL) {
         $amount = $result['amount'];
      }
   }   
   return($amount);
}

function getscoreticket_conversion($mysqli,$sessionid)
{
   $gameid = getgameidfromsessionid($sessionid);
   $amount = 0;
   $query = "SELECT * from game WHERE gameid='$gameid'";
   $res = $mysqli->query($query);
   if ($res === false) {
   } else {
      $result = $res->fetch_assoc();
      if ($result !== NULL) {
         $amount = $result['scoreticket_conversion'];
      }
   }   
   return($amount);
}

function getticketswon($mysqli,$sessionid,$gameplayid,$score)
{
   $scoreticket_conversion = getscoreticket_conversion($mysqli,$sessionid);
   $tickets = floor($score * $scoreticket_conversion);
   $uid = getuidfromsessionid($sessionid);
   $query = "UPDATE user SET tickets=tickets+$tickets WHERE id = '" . $uid ."'";
   $res = $mysqli->query($query);
   if ($res === false) {
   } else {
   }
   return($tickets);
}

   function getjson($json_name)
   {
      $json = "";
      $filename = "../content/" . $json_name . ".json";
      if (file_exists($filename)) {
         $json = file_get_contents($filename);
      }
      return($json);
   }
   
   
?>
