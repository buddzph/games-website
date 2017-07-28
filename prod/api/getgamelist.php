<?php

   if ($_GET['name'] == "home") {
      $json = file_get_contents("../content/gamelist_home.json");
   } else {
      $json = file_get_contents("../content/gamelist_all.json");
   }
   echo $json;

?>