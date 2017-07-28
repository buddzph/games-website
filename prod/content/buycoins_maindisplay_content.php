<?php

echo "<br>";

echo "This is the main display of the buycoins page<br>" .
     "code is in prod_content/buycoins_maindisplay_content.php<br>";

echo "This is where user buys a coin package<br><br>";

echo "<B>You have chosen to buy the X coin package</b><br><br>";

echo "For Smart<br>Text get xxx to 8950<br>For Globe<br>Text get xxx to 8950<br><br>";
echo "Enter the code you receive in the edit box below";

?>

<form action="buycoinscodesubmit.php">
  Code:<br>
  <input type="text" name="Code" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php


?>