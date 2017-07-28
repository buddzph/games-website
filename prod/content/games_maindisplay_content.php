<h2>Games</h2>

<!-- 
<div class="row">
  <div class="text-center">
    <ul class="pagination">
      <li><a href="#" class="orange-button">prev</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#" class="orange-button">next</a></li>
    </ul>
  </div>
</div>
-->

<div class="slick-carousel">

   <?php 
      $gamelist = $html5games->getgamelist("",30,0);
      for ($i=0; $i < $gamelist->qty; $i++) {
   ?> 

   <div class="col-md-3">
      <div class="thumbnail">
         <a href="<?php echo $gamelist->items[$i]->url  ?>">
            <img src="<?php echo $gamelist->items[$i]->image_tn ?>" class="image-responsive thumb-detail-image">
         </a>
         <ul class="thumb-details">
           <li class="thumb-details-title"><?php echo $gamelist->items[$i]->title ?> </li>
           <li class="thumb-details-coins"><img src="../static/images/icon-glyph.png" /> <?php echo $gamelist->items[$i]->amount ?></li>
           <li class="thumb-details-description">
           <?php 
               $description = $gamelist->items[$i]->summary;
               echo substr($description, 0, 50);
           ?>
              
           </li>
         </ul>
      </div>
   </div>


   <?php } ?>

<!-- 
   <div class="text-center">
    <ul class="pagination">
      <li><a href="#" class="orange-button">prev</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#" class="orange-button">next</a></li>
    </ul>
  </div>
-->

</div>




