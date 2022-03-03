<?php 

	define('__webroot', 'http://localhost/smb/');

	define('__static', 'app-assets/');

	define('__pack', __webroot.'app-assets/');

	define('__templates', 'app-views/templates/');

	define('__index', 'app-views/index/');

	define('__assets', 'app-views/assets/');

	define('__wessets', __webroot.'app-views/assets/');

	define('__render', 'app-views/index.render.php');

	define('__config', 'app-configs/');

	define('__node', 'app-node/');
	
	define('__controllers', 'app-controllers/');
	
	define('__staspots', 'app-analysers/images/');

	define('__wespots', __webroot . 'app-analysers/images/');


	define('__modules', 'app-modules/');

	define("__url", isset($_GET['url']) && !empty($_GET['url']) ? $_GET['url'] : "home");


 ?>