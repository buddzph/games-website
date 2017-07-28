<div class="row">
   <div class="col-md-8">
      <span class="name-area">Name</span>
   </div>
   <div class="col-md-4">
      <span class="pull-right">
         <span class="coin-count-area">You have 
            <img src="../static/images/icon-glyph-big.png"/> 
            <?php echo $html5games->getusercoins() ?> coins
         </span>
      </span>
   </div>
</div>


<div class="col-md-12 yellow-header">
   <div class="row">
      <h2 class="text-center">EARN FREE COINS!</h2>
   </div>
</div>


<div class="row">
   <?php 
      $freecoins = $html5games->getfreecoinlist();
      for ($i=0; $i < $freecoins->qty; $i++) {
   ?> 
   <div class="col-md-4">
      <div class="thumbnail buy-earn">
         <a href="<?php echo $freecoins->items[$i]->url  ?>">
            <img src="<?php echo $freecoins->items[$i]->image ?>" class="image-responsive">
         </a>
         <ul class="thumb-details">
           <li class="thumb-details-title"><?php echo $freecoins->items[$i]->title ?></li>
           <li class="thumb-details-description">
              <?php 
                  $description = $freecoins->items[$i]->description;
                  echo substr($description, 0, 50);
              ?>
           </li>
         </ul>
      </div>
   </div>
   <?php } ?>
</div>


<div class="col-md-12 yellow-header">
   <div class="row">
      <h2 class="text-center">BUY COINS!</h2>
   </div>
</div>


<div class="row">
   <?php 
      $buycoins = $html5games->getbuycoinlist();
      for ($i=0; $i < $buycoins->qty; $i++) {
   ?> 
   <div class="col-md-4">
      <div class="thumbnail buy-earn">
         <a href="<?php echo $buycoins->items[$i]->url  ?>">
            <img src="<?php echo $buycoins->items[$i]->image ?>" class="image-responsive">
         </a>
         <ul class="thumb-details">
           <li class="thumb-details-title"><?php echo $buycoins->items[$i]->title ?></li>
           <li class="thumb-details-description">
              <?php 
                  $description = $buycoins->items[$i]->description;
                  echo substr($description, 0, 50);
              ?>
           </li>
         </ul>
      </div>
   </div>
   <?php } ?>
</div>

<div class="clearfix"></div><br/>

