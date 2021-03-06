<?php
if(isset($_SERVER['HTTP_HOST']) and $_SERVER['HTTP_HOST'] == 'localhost'):
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'glyphgames');
else:
   define('DB_HOSTNAME', 'localhost');
   define('DB_USERNAME', 'glyph_dbuser');
   define('DB_PASSWORD', 'Qebr91951Qw!');
   define('DB_DATABASE', 'db_html5games');
endif;

// Create connection
$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Script is running. Please wait!...";


$sql = "SELECT * FROM ggames_posts LEFT JOIN ggames_postmeta ON(ggames_posts.ID = ggames_postmeta.post_id) LEFT JOIN ggames_term_relationships ON(ggames_posts.ID = ggames_term_relationships.object_id) LEFT JOIN ggames_term_taxonomy ON(ggames_term_relationships.term_taxonomy_id = ggames_term_taxonomy.term_taxonomy_id) WHERE ggames_term_taxonomy.term_id IN (4) AND ggames_term_taxonomy.taxonomy = 'category' GROUP BY ggames_posts.ID";

$result = $conn->query($sql);

echo '<pre>';
print_r($result);
echo '</pre>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo "id: " . $row["ID"]. " - Name: " . $row["post_name"]. " - Guid: ".$row["guid"];*/

        $test = file_get_contents('https://graph.facebook.com/?id='.$row["guid"]);

        $json = json_decode($test, true);
        

        if(isset($json['og_object']['id']) and !empty($json['og_object']['id'])):

        	$pid = $json['og_object']['id'];

	        $getcount = file_get_contents('https://graph.facebook.com/'.$pid.'/likes/?summary=true&access_token=201797403675582%7C9a37ed77d8b694e1bcc2d30197096dac');

			$jsoncount = json_decode($getcount, true);

			$likescount = $jsoncount['summary']['total_count'];

			$sqlpostlikes = "SELECT id FROM post_likes WHERE post_id = ".$row["ID"];

			$resultpostlikes = $conn->query($sqlpostlikes);

			if ($resultpostlikes->num_rows > 0) {
				// UPDATE
				$update = "UPDATE post_likes SET post_title = '".$row["post_title"]."', og_object = '".$pid."', likes_count = '".$likescount."', url = '".$row["guid"]."' WHERE post_id = '".$row["ID"]."'";
				$resins = $conn->query($update);
			}else{
				// INSERT
				$insert = "INSERT INTO post_likes (post_id, post_title, og_object, likes_count, url) VALUES ('".$row["ID"]."', '".$row["post_title"]."', '".$pid."', '".$likescount."', '".$row["guid"]."')";
				$resins = $conn->query($insert);
			}

		endif;

    }

    echo 'Done! ';
} else {
    echo "0 results";
}

$conn->close();


/*$test = file_get_contents('https://graph.facebook.com/?id=http://glyphgames.com/?p=337');

$json = json_decode($test, true);

echo '<pre>';
print_r($json);
echo '</pre>';

$pid = $json['og_object']['id'];

$getcount = file_get_contents('https://graph.facebook.com/'.$pid.'/likes/?summary=true&access_token=201797403675582%7C9a37ed77d8b694e1bcc2d30197096dac');

$jsoncount = json_decode($getcount, true);

echo '<pre>';
print_r($jsoncount);
echo '</pre>';

echo $jsoncount['summary']['total_count'];*/
?>