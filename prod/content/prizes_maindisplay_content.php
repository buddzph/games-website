<div class="row">
   <div class="col-md-8">
      <span class="name-area">Name</span>
   </div>
   <div class="col-md-4">
      <span class="pull-right">
         <span class="coin-count-area">
<!-- You have 
            <img src="../static/images/icon-glyph-big.png"/> 
            <?php echo $html5games->getusercoins(); ?> coins
-->
         </span>
      </span>
   </div>
</div>


<div class="col-md-12 yellow-header">
   <div class="row">
      <h2 class="text-center">
      You have <?php echo $html5games->getusertickets() ?> TICKETS<br />
      </h2>
      <h3 class="text-center">Use your TICKETS to buy AWESOME PRIZES below!</h3>
   </div>
</div>


<div class="row">
   <?php 
      $prizelist = $html5games->getprizelist();
      for ($i=0; $i < $prizelist->qty; $i++) {
   ?> 
   <div class="col-md-4">
      <div class="thumbnail buy-earn">
         <a href="<?php echo $prizelist->items[$i]->url  ?>">
            <img src="<?php echo $prizelist->items[$i]->image ?>" class="image-responsive thumb-detail-image">
         </a>
         <ul class="thumb-details">
           <li class="thumb-details-title"><?php echo $prizelist->items[$i]->title ?></li>
           <li class="thumb-details-description">
              <?php 
                  $description = $prizelist->items[$i]->description;
                  echo substr($description, 0, 50);
              ?>
           </li>
         </ul>
      </div>
   </div>
   <?php } ?>
</div>

<div class="clearfix"></div><br/>