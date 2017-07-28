<div class="well">
	<h3>Top Ten list</h3>
	<ul>
	<?php

	$gameid = $html5games->getcurrentgameid();
    $toplist = $html5games->gettopplayerlist($gameid,10);
    for ($i=0; $i < $toplist->qty; $i++) {
    ?>

    <li><?php echo $toplist->items[$i]->name . "  " . $toplist->items[$i]->score ?> </li>


    <?php } ?>
    </ul>
	
</div>
