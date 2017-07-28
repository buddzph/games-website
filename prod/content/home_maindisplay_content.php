<h2>Welcome</h2>

<div><img src="static/images/home-banner.jpg" alt="" id="banner" class="img-responsive"></div>

<div class="slick-carousel">

   <?php 
      $gamelist = $html5games->getgamelist("free",4);
      for ($i=0; $i < $gamelist->qty; $i++) {
   ?> 

   <div class="thumbnail">
      <a href="<?php echo $gamelist->items[$i]->url  ?>">
         <img src="<?php echo $gamelist->items[$i]->image_tn ?>" class="image-responsive thumb-detail-image">
      </a>
      <ul class="thumb-details">
        <li class="thumb-details-title"><?php echo $gamelist->items[$i]->title ?> </li>
        <li class="thumb-details-coins"><img src="static/images/icon-glyph.png" /> <?php echo $gamelist->items[$i]->amount ?></li>
        <li class="thumb-details-description">
        <?php 
            $description = $gamelist->items[$i]->summary;
            echo substr($description, 0, 50);
        ?>
           
        </li>
      </ul>
   </div>


   <?php } ?>

</div>


