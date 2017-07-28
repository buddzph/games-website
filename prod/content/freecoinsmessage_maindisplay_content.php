<?php

echo "<br>";

$pkg = $_GET['pkg'];

$html5games->addfreecoins($pkg);

$coins = $html5games->getusercoins();

echo "Congrats! You now have " . $coins . " Coins<br><br>";

echo "<a href=\"../games\">Play now from our list of cool games!</a>";
echo "<br>";

?>