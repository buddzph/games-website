<div class="row">
	<div class="col-md-8">
		<span class="name-area ">Name</span>
	</div>
	<div class="col-md-4">
		<span class="pull-right">
			<span class="coin-count-area">You have <img src="../static/images/icon-glyph-big.png"/>  <?php echo $html5games->getusercoins() ?> coins</span>
		</span>
	</div>
</div>


<div class="col-md-12 yellow-header">
	<div class="row">
		<span class="col-md-10">
			<h2>Details</h2> 
		</span>
		<span class="col-md-2 purple-block">
			<i class="fa fa-pencil fa-5" aria-hidden="true"></i>
		</span>
	</div>
</div>


<div class="row ">
	<div class="col-md-6">
		<?php $account = $html5games->getaccountinfo(); ?>
		<ul class="account-details thumb-details-description">
			<li><strong>Name : </strong><?php echo $account->name . "<br>\n"; ?></li>
			<li><strong>Email : </strong><?php echo $account->email . "<br>\n"; ?></li>
			<li><strong>Address : </strong><?php echo $account->address . "<br>\n"; ?></li>
			<li><strong>Country : </strong><?php echo $account->country . "<br>\n"; ?></li>
			<li><strong>Birthday : </strong><?php echo $account->birthday . "<br>\n"; ?></li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul class="account-details thumb-details-description">
			<li><strong>Gender : </strong><?php echo "gender: " . $account->gender . "<br>\n"; ?></li>
			<li><strong>Mobile Number : </strong>
				<?php
					if ($account->mobilenostatus == "verified") {
					   echo $account->mobileno . "   verified<br>\n";
					}
				?>
			</li>
			<li><strong>City : </strong><?php echo $account->city . "<br>\n"; ?></li>
			<li><strong>ZIP Code : </strong><?php echo $account->zipcode . "<br>\n"; ?></li>
		</ul>
	</div>
</div>


<div class="col-md-12 yellow-header">
	<div class="row">
		<span class="col-md-10">
			<h2>Payment Options</h2> 
		</span>
		<span class="col-md-2 purple-block">
			<i class="fa fa-credit-card fa-5" aria-hidden="true"></i>
		</span>
	</div>
</div>

<div class="row ">
	
	<div class="col-md-12 thumb-details-description">

		<form name="payment" action="" method="POST">
			<div class="form-group">
				<input type="radio" name="phtelco" value="phtelco" checked>Telco (Globe/Smart)<br>
			</div>
		</form>

		<?php
			if ($account->mobilenostatus == "verified") {
			   echo "Your mobile number is verified and can be used to buy coins<br>\n ";
			} else {
			   echo "You mobile number is unverified." . " <a href=/account/verifymobileno.php>Verify it to enable you to buy coins</a><br>\n";
			}
		?>
	</div>
</div>

<div class="clearfix"></div><br/>