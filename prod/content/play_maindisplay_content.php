<?php

// <iframe src="http://cdn-factory.marketjs.com/en/metal-animal/index.html"></iframe>

$gameid = $_GET['gameid'];
$siteprotoname = $html5games->getsiteprotoname();
$apiurl = $html5games->getapiurl();
$gamepath = $html5games->getgamepath($gameid);
$url = $siteprotoname . "/" . $gamepath . "index.html?nocache&api-url=" . $apiurl;
//echo "-------------<br>$url<br>==============------------";
//die();
$s = "<iframe src=\"" . $url .
       "\" style=\"border: 0; width: 100%; height: 600px\"></iframe>";

//$s = "<iframe src=\"" . $siteprotoname . "/prod/game/" . $gameid . "/index.html" . 
//       "\"></iframe>";

//$s = "<iframe src=\"" . $siteprotoname . "/index.php" . "\"></iframe>";

//$s = "<iframe src=\"http://cdn-factory.marketjs.com/en/metal-animal/index.html\"></iframe>";

echo $s;
die();

//echo gethostname();

?>
