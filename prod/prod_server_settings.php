<?php

#define("ROOT_PATH","/var/www/html/_testing/");
#define("ROOT_PATH_STYLE","/_testing/");

define("ROOT_PATH","../");
define("ROOT_PATH_STYLE","../");

if($_SERVER['HTTP_HOST'] == 'localhost'):
	define("SITE_URL","http://localhost/glyphgames.com");
else:
	define("SITE_URL","http://glyphgames.com");
endif;

?>
