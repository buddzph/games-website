[insert_php]
global $wpdb;
$myrows = mysql_query( "select rating_postid, avg(rating_rating) as ar, rating_posttitle from ggames_ratings group by rating_postid order by ar desc, rating_postid" );

if (!$myrows) {
die('Invalid query: ' . mysql_error());
}

while ($row = mysql_fetch_assoc($myrows)) {
	$postid = $row['rating_postid'];
	echo '<div class="highestrated">';
	echo $row['ar'];
	echo get_the_post_thumbnail( $postid, 'twentyseventeen-featured-image' );
	echo '<a href="'.get_permalink( $postid ).'">'.$row['rating_posttitle'].'</a>';
	echo '[ratings id="'.$postid.'" results="true"]';
	echo '</div>';
}
[/insert_php]


SELECT * FROM ggames_posts
LEFT JOIN ggames_postmeta ON(ggames_posts.ID = ggames_postmeta.post_id)
LEFT JOIN ggames_term_relationships ON(ggames_posts.ID = ggames_term_relationships.object_id)
LEFT JOIN ggames_term_taxonomy ON(ggames_term_relationships.term_taxonomy_id = ggames_term_taxonomy.term_taxonomy_id)
WHERE ggames_term_taxonomy.term_id IN (1,2,3)
AND ggames_term_taxonomy.taxonomy = 'category'
AND ggames_posts.post_status = 'publish'
AND ggames_postmeta.meta_key = 'paragraf'
ORDER BY ggames_postmeta.meta_value ASC

$dpost = mysql_query("SELECT * FROM ggames_posts LEFT JOIN ggames_postmeta ON(ggames_posts.ID = ggames_postmeta.post_id) LEFT JOIN ggames_term_relationships ON(ggames_posts.ID = ggames_term_relationships.object_id) LEFT JOIN ggames_term_taxonomy ON(ggames_term_relationships.term_taxonomy_id = ggames_term_taxonomy.term_taxonomy_id) WHERE ggames_term_taxonomy.term_id IN (4) AND ggames_term_taxonomy.taxonomy = 'category' AND ggames_posts.ID = ".$row['rating_postid']." GROUP BY ggames_posts.ID");

	while ($row2 = mysql_fetch_assoc($dpost)) {
		echo $link = $row2['guid'];
	}

	 [ratings id="1" results="true"] 


[insert_php]
global $wpdb;
$myrows = mysql_query( "select rating_postid, avg(rating_rating) as ar, rating_posttitle from ggames_ratings group by rating_postid order by ar desc, rating_postid" );

while ($row = mysql_fetch_assoc($myrows)) {
$postid = $row['rating_postid'];
echo '<div class="highestrated">';
echo '<a href="'.get_permalink( $postid ).'">'.get_the_post_thumbnail( $postid, 'twentyseventeen-featured-image' ).'</a>';
echo '<a href="'.get_permalink( $postid ).'">'.$row['rating_posttitle'].'</a>';
echo '[ratings id="'.$postid.'" results="true"]';
echo '</div>';
}
[/insert_php]


/*********************************/

-- POST LIKES --

[insert_php]
global $wpdb;
$myrows = mysql_query( "SELECT * FROM post_likes ORDER BY likes_count DESC, post_title ASC" );

while ($row = mysql_fetch_assoc($myrows)) {
$postid = $row['post_id'];
echo '<div class="highestrated">';
echo '<a href="'.get_permalink( $postid ).'">'.get_the_post_thumbnail( $postid, 'twentyseventeen-featured-image' ).'</a>';
echo '<a href="'.get_permalink( $postid ).'">'.$row['post_title'].'</a>';
echo '<a href="https://facebook.com/client" class="fb-like js-fb-like"><i class="ico ico-fb"></i>Like</span></a>';
echo '</div>';
}
[/insert_php]