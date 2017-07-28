<?php

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
   $sessionid = $req->sessionid;
   if ($sessionid == "sidtesting0") {
      doPlaystartFail("You have no more coins.");
   } else if ($sessionid == "sidtesting1") {
      doPlaystartSuccess("","gpidtesting1");
   } else {
      doPlaystartFail("Error: Sessionid invalid");
   }
}

function doPlayend($req)
{
   if (!isset($req->gameplayid)) {
      doFail("Error: Gameplayid not set");
   }
   if ($req->sessionid == "sidtesting1") {
      if ($req->gameplayid == "gpidtesting1__") {
         doSuccess("You now have X tickets. Play more to get more!",""); 
      } else {
         doFail("Error: Gameplayid invalid");
      }
   } else {
      doFail("Error: Sessionid invalid");
   }
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

?>