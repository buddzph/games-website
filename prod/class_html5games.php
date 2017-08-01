<?php

require_once('prod_server_settings.php');

date_default_timezone_set('Asia/Manila');

if($_SERVER['HTTP_HOST'] == 'localhost'):
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'glyphgames');
else:
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'user_html5games');
   define('DB_PASSWORD', 'pw_html5g@m3s!');
   define('DB_DATABASE', 'db_html5games');
endif;

$smart_prefix = array(
   "900", "907", "908", "909", "910", "911", "912", "913", "914", "918", 
   "919", "920", "921", "928", "929", "930", "938", "939", "940", "946",
   "947", "948", "949", "950", "951", "989", "998", "999"
);

$globe_prefix = array(
   "905", "906", "915", "916", "917", "925", "926", "927", "935", "936", 
   "937", "945", "973", "974", "975", "976", "977", "978", "979", "994", 
   "995", "996", "997" 
);

class class_html5games
{
   public $rootpath = ROOT_PATH;
   public $rootpathstyle = ROOT_PATH_STYLE;
   public $contentdir;
   public $contentdir2;
   public $stylesheet;
   public $mysqli;
   public $apiurlbase = "";

   public $pagename = "";
   public $uid = 0;
   public $usertype = "";
   public $betamode_code = 0;
   public $betamode_ui = 0;
   public $userdisplayname = "";
   public $userfirstname = "";
   public $userlastname = "";
   public $useremail = "";
   public $currentgameid = "";
   public $loginstate;

   public function initialize($pagename,$loginstate,$usertype,$tulistatus,$betamodecode,$betamodeui) {

      $this->mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
      if (mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
         die();
      }

//      printf ("System status: %s\n", $this->mysqli->stat());
      $this->pagename = $pagename;

// get and verify the following info from the db, if not ok then exit
      $this->loginstate = $loginstate;
      $this->fbid = "";
      $this->usertype = $usertype;
      $this->tulistatus = $tulistatus;
      $this->betamodecode = $betamodecode;    
      $this->betamodeui = $betamodeui;
      $this->userdisplayname = "";

      // set session vars 
      $notexist = !isset($loginstate["tok"]) || strlen($loginstate["tok"]) == 0;
      $expired  = !isset($loginstate["exp"]) || date("Y-m-d H:i:s") >= date("Y-m-d H:i:s", strtotime("+" . $loginstate["exp"] . " seconds"));

//print_r($loginstate);
//print_r($_SESSION);
//die();
      if ($notexist || $expired) {
         // not logged in
      } else {
         // logged in
         $this->setlocalvarsfromloginstate($loginstate);
      }

      if (isset($_GET['gameid'])) {
         $this->currentgameid = $_GET['gameid'];
      }

      if ($this->usertype == "test") {
         if ($this->betamodeui == 0) {
            $this->apiurlbase = SITE_URL . "/prod/api/";
            $this->contentdir  = $this->rootpath . "prod/content/";
            $this->contentdir2 = $this->rootpath . "prod/content/";
            $this->stylesheet = $this->rootpathstyle . "prod/prod_styles.css";
         } else {
            $this->apiurlbase = SITE_URL . "/test/api/";
            $this->contentdir  = $this->rootpath . "test/content/";
            $this->contentdir2 = $this->rootpath . "prod/content/";
            $this->stylesheet = $this->rootpathstyle . "test_script/test_styles.css";
         }
      } else {
         $this->apiurlbase   = SITE_URL . "/prod/api/";
         $this->contentdir   = $this->rootpath . "prod/content/";
         $this->contentdir2  = $this->rootpath . "prod/content/";
         $this->stylesheet   = $this->rootpathstyle . "prod/prod_styles.css";
      }
   }

   function __destruct() {
      if (!mysqli_connect_errno()) {
         $this->mysqli->close();
      }
   }

   public function getcontent($content_name)
   {
      $content = "";
      $filename = $this->contentdir . $this->pagename . "_" . $content_name . ".html";
      if (file_exists($filename)) {
         $content = file_get_contents($filename);
      } else {
         $filename = $this->contentdir . "default_" . $content_name . ".html";
         if (file_exists($filename)) {
            $content = file_get_contents($filename);
         } else {
            if ($this->contentdir2 != $this->contentdir) {
               $filename = $this->contentdir2 . $this->pagename . "_" . $content_name . ".html";
               if (file_exists($filename)) {
                  $content = file_get_contents($filename);
               } else {
                  $filename = $this->contentdir2 . "default_" . $content_name . ".html";
                  if (file_exists($filename)) {
                     $content = file_get_contents($filename);
                  }
               }
            }
         }
      }
      return($content);
   }

   public function getincludefilename($content_name)
   {
      $content = "";
      $filename = $this->contentdir . $this->pagename . "_" . $content_name . ".php";
      if (file_exists($filename)) {
         $content = $filename;
      } else {
         $filename = $this->contentdir . "default_" . $content_name . ".php";
         if (file_exists($filename)) {
             $content = $filename;
         } else {
            if ($this->contentdir2 != $this->contentdir) {
               $filename = $this->contentdir2 . $this->pagename . "_" . $content_name . ".php";
               if (file_exists($filename)) {
                  $content = $filename;
               } else {
                  $filename = $this->contentdir2 . "default_" . $content_name . ".php";
                  if (file_exists($filename)) {
                     $content = $filename;
                  } else {
                  }
               }
            } else {
            }
         }
      }
//echo "$ontent_name -- $content<br>\r\n";
      return($content);
   }

   public function getjson($json_name)
   {
      $json = "";
      $filename = $this->contentdir . $json_name . ".json";
      if (file_exists($filename)) {
         $json = file_get_contents($filename);
      } else {
         if ($this->contentdir2 != $this->contentdir) {
            $filename = $this->contentdir2 . $this->pagename . "_" . $content_name . ".php";
            if (file_exists($filename)) {
               $json = file_get_contents($filename);
            }
         }
      }
      return($json);
   }

   public function getcarousel($name,$qty,$start_index=0)
   {
/*
      $data = new stdClass();

      $data->name = $name;
      $data->start_index = $start_index;
      $data->qty = $qty;
      $data->qty_total = 100;
      $data->items = array();

      $data->items[0] = new stdClass();
      $data->items[0]->title = "Hello";
      $data->items[0]->image = "http://localhost/prod_image/carousel/carousel1.jpg";
      $data->items[0]->url   = "http://localhost/games";
      $json = $json_encode($data);
*/
      $json = $this->getjson("carousel");
      $carousel = json_decode($json);

      return($carousel);
   }

   public function getfreecoinlist()
   {
      $json = "";
      $json = $this->getjson("coinlist_free");
      $coinlist = json_decode($json);
      return($coinlist);
   }

   public function getbuycoinlist()
   {
      $json = "";
      $json = $this->getjson("coinlist_buy");
      $coinlist = json_decode($json);
      return($coinlist);
   }

   public function getprizelist()
   {
      $json = "";
      $json = $this->getjson("prizelist");
      $list = json_decode($json);
      return($list);
   }

   public function getaccountinfo()
   {
      $json = "";
      $json = $this->getjson("accountinfo");
      $obj = json_decode($json);
      return($obj);
   }

   // this should only be called when a real login occurs / user presses fb login button on the site
   public function login($loginstate)
   {
      $_SESSION['tok'] = $loginstate['tok'];
      $_SESSION['exp'] = $loginstate['exp'];
      $_SESSION['fid'] = $loginstate['fid'];
      $_SESSION['fin'] = $loginstate['fin'];
      $_SESSION['lan'] = $loginstate['lan'];
      $this->setlocalvarsfromloginstate($loginstate);
      if ($this->fbid != "") {
         $userInfo = $this->getuser($this->fbid);
print_r($userInfo);
echo "---<br>\r\n";
         if ($userInfo['status'] == "err") {
            $userInfo = $this->adduser($this->fbid,$this->userfirstname,$this->userlastname,$this->useremail);
print_r($userInfo);
         }
         $this->uid = $userInfo['uid'];
         $_SESSION['uid'] = $userInfo['uid'];
      }
   }

   public function logout()
   {
      // Insert code here - 
      unset($_SESSION["tok"]);
      unset($_SESSION["exp"]);
      unset($_SESSION["fid"]);
      unset($_SESSION["fin"]);
      unset($_SESSION["lan"]);
      unset($_SESSION["uid"]);
   }

   public function isloggedin()
   {
//print_r($_SESSION);
//echo "(" . $this->fbid . ")<br>\r\n";
      if ($this->fbid == "") {
//echo "(false)<br>\r\n";
         return(false);
      } else {
         if ($this->usertype == "test") {
            if ($this->tulistatus == 0) {
               return(false);
            } else {
               return(true);
            }
         } else {
            return(true);
         }
      }
   }

   function setlocalvarsfromloginstate($loginstate)
   {
//print_r($loginstate);
//die();
       if (isset($loginstate['fid'])) {
          $this->fbid = $loginstate['fid'];
       }
       if (isset($loginstate['fin'])) {
          $this->userfirstname = $loginstate['fin'];
          $this->userdisplayname = $loginstate['fin'];
       }
       if (isset($loginstate['lan'])) {
          $this->userlastname = $loginstate['lan'];
       }
       if (isset($loginstate['ema'])) {
          $this->useremail = $loginstate['ema'];
       }
       if (isset($loginstate['uid'])) {
          $this->uid = $loginstate['uid'];
       }
   }

   public function setfavorite($gameid,$flag)
   {
      
   }

   public function getcurrentgameid()
   {
      return($this->currentgameid);
   }

   public function getuserdisplayname()
   {
      return($this->userdisplayname);
   }

   public function gettopplayerlist($gameid,$num)
   {
      $json = $this->getjson("topplayerlist");
      $toplist = json_decode($json);

      return($toplist);
   }

   public function getsiteprotoname()
   {
      $s = SITE_URL;
      return($s);
   }

   public function getapiurl()
   {
      $sessionid = $this->getsessionid();
      $apiurl = $this->apiurlbase . "gpctlstatapi.php&session-id=" . $sessionid;
      return($apiurl);
   }

   // format the celno to 10 digit format i.e. 9xxxxxxxxx
   public function formatCelno10Digits($celno)
   {
      // Insert code here
   }

   // return true if number is globe number
   public function isGlobe($celno)
   {
      // Insert code here
   }

   // return true if number is smart number
   public function isSmart($celno)
   {
      // Insert code here
   }

// MYSQL

   public function getuser($fbid)
   {
      $query = "SELECT * from user WHERE fbid = '" . $fbid ."'";
//echo $query . "<br>\r\n";
      $res = $this->mysqli->query($query);
      if ($res === false) {
         $retArr = array('status' => 'err', 'desc' => $this->mysqli->error);
      } else {
         $result = $res->fetch_assoc();
//print_r($res);
//print_r($result);
//echo "<br>\r\n";
         if ($result === NULL) {
            $retArr = array('status' => 'err', 'desc' => $this->mysqli->error);
         } else {
            $retArr = $result;
            $retArr['status'] = 'ok';
         }
      }
      return($retArr);
   }

   public function adduser($fbid,$firstname,$lastname,$email)
   {
      $datetime_now = date('Y-m-d H:i:s');

      $query = "INSERT INTO user (" .
         "fbid, firstname, lastname , email, dt_registered )VALUES (" .
         "'$fbid', '$firstname', '$lastname', '$email', '$datetime_now')";

      $res = $this->mysqli->query($query);
      if ($res === false) {
         $retArr = array('status' => 'err', 'desc' => $this->mysqli->error);
         return($retArr);
      }
      $insert_id = $this->mysqli->insert_id;
      $retArr = array('status' => 'ok', 'desc' => '', 'uid' => $insert_id);
      return($retArr);
   }

   public function getusercoins()
   {
      $query = "SELECT coins from user WHERE fbid = '" . $this->fbid ."'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
         $retVal = 0;
      } else {
         $result = $res->fetch_assoc();
         if ($result === NULL) {
            $retVal = 0;
         } else {
            $retVal = $result['coins'];
         }
      }
      return($retVal);
   }

   public function getusertickets()
   {
      $query = "SELECT tickets from user WHERE fbid = '" . $this->fbid ."'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
         $retVal = 0;
      } else {
         $result = $res->fetch_assoc();
         if ($result === NULL) {
            $retVal = 0;
         } else {
            $retVal = $result['tickets'];
         }
      }
      return($retVal);
   }

// to do: verify if user still can get free coins

   public function addfreecoins($pkg)
   {
      $datetime_now = date('Y-m-d H:i:s');

      $numcoins = $pkg;
      $query = "UPDATE user SET coins=coins+$numcoins, dt_lastgivenfreecoinds='$datetime_now' WHERE fbid = '" . $this->fbid ."'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
      } else {
      }
   }

   public function deductcoins($numcoins)
   {
      $datetime_now = date('Y-m-d H:i:s');

      $coins = $this->getusercoins();
      if ($numcoins > $coins) {
         $numcoins = $coins;
      }
      $query = "UPDATE user SET coins=coins-$numcoins WHERE fbid = '" . $this->fbid ."'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
      } else {
      }
   }

   public function getgamelist($name,$qty,$start_index=0)
   {
/*
      $data = new stdClass();

      $data->name = $name;
      $data->start_index = $start_index;
      $data->qty = $qty;
      $data->qty_total = 100;
      $data->items = array();

      $data->items[0] = new stdClass();
      $data->items[0]->title = "Hello";
      $data->items[0]->image = "http://localhost/prod/image/carousel/carousel1.jpg";
      $data->items[0]->url   = "http://localhost/games";
      $data->items[0]->amount = 0;
      $json = $json_encode($data);

      $json = "";
      if ($name == "home") {
         $json = $this->getjson("gamelist_home");
      } else if ($name == "") {
         $json = $this->getjson("gamelist_all");
      }
      $gamelist = json_decode($json);
*/
// get count

      $qty_total = 0;

      if ($this->usertype == "test") {
         if ($name == "free") {
            $query = "SELECT count(*) from game WHERE amount=0";
         } else if ($name == "") {
            $query = "SELECT count(*) from game WHERE amount > 0";
         }
      } else {
         if ($name == "free") {
            $query = "SELECT count(*) from game WHERE amount=0 and status='prod'";
         } else if ($name == "") {
            $query = "SELECT count(*)  from game WHERE amount > 0 and status='prod'";
         }
      }
      $res = $this->mysqli->query($query);
      if ($res === false) {
         $qty_total = 0;
      } else {
         $result = $res->fetch_assoc();
         if ($result === NULL) {
            $qty_total = 0;
         } else {
            $qty_total = $result['count(*)'];
         }
      }

      if ($this->usertype == "test") {
         if ($name == "free") {
            $query = "SELECT * from game WHERE amount=0 LIMIT $qty OFFSET $start_index";
         } else if ($name == "") {
            $query = "SELECT * from game WHERE amount > 0 LIMIT $qty OFFSET $start_index";
         }
      } else {
         if ($name == "free") {
            $query = "SELECT * from game WHERE amount=0 and status='prod' LIMIT $qty OFFSET $start_index";
         } else if ($name == "") {
            $query = "SELECT * from game WHERE amount > 0  and status='prod' LIMIT $qty OFFSET $start_index";
         }
      }
      $res = $this->mysqli->query($query);
      if ($res === false) {
         $retVal = 0;
      } else {
         $result = $res->fetch_assoc();
         if ($result === NULL) {
            $retVal = 0;
         } else {
            $data = new stdClass();
            $data->name = $name;
            $data->start_index = $start_index;
            $data->qty_total = $qty_total;
            $data->items = array();
            $data->qty = 0;

            while ($result !== NULL) {
               $data->items[$data->qty] = new stdClass();
               $data->items[$data->qty]->title = $result['title'];
               $data->items[$data->qty]->summary = $result['summary'];
               $data->items[$data->qty]->image_tn = $this->rootpath . $result['parent_folder'] . $result['folder'] . "/tn_" . $result['image_tn'];
               $data->items[$data->qty]->url =  $this->rootpath . "games/play.php?gameid=" .  $result['gameid'];
               $data->items[$data->qty]->amount  = $result['amount'];
               $data->items[$data->qty]->scoreticket_conversion = $result['scoreticket_conversion'];
               $data->qty++;
               $result = $res->fetch_assoc();
            }
         }
      }

      return($data);
   }
   
   public function getgamepath($gameid)
   {
      $gamepath = "";
      $query = "SELECT * from game WHERE gameid='$gameid'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
      } else {
         $result = $res->fetch_assoc();
         if ($result !== NULL) {
            $gamepath = $result['parent_folder'] . $result['folder'] . "/";
         }
      }   
      return($gamepath);
   }

   public function getgamecost($gameid)
   {
      $amount = 0;
      $query = "SELECT * from game WHERE gameid='$gameid'";
      $res = $this->mysqli->query($query);
      if ($res === false) {
      } else {
         $result = $res->fetch_assoc();
         if ($result !== NULL) {
            $amount = $result['amount'];
         }
      }   
      return($amount);
   }

   public function getsessionid()
   {
      $s = date('YmdHis') . $this->uid . "_" . $this->currentgameid;
      return($s);
   }
}
?>