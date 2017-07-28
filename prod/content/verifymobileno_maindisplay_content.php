<?php

echo "<br>";

echo "This is the main display of the verify mobile no page<br>";
echo "Click the button and we will send you a verification code";
?>
<form action="verifymobilenosendcode.php">
  <input type="submit" value="Submit" class="btn btn-default">
</form> 

<br>
<br>
<h4>Enter that code into the field below</h4>


<form class="form-inline" action="verifymobilenosubmitcode.php">
  <div class="form-group">
    
    <div class="input-group">
      <div class="input-group-addon">Enter Code</div>
      <input type="text" name="Name" class="form-control" id="exampleInputAmount" placeholder="Code">
      
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<br /><br />