<?php

if ($html5games->isloggedin()) {
   echo "<li><a href='#'>Welcome " . $html5games->getuserdisplayname() . "</a></li>";
   echo "<li><a href=/account>Account</a></li>";
   echo "<li><a href=/home/logout.php>Sign-out</a></li>";
} else {
   echo "<li><a href=/home/login.php><img src='../static/images/button_fb_signup.png' /></a></li>";
}

?>