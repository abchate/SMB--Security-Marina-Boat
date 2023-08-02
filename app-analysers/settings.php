<?php 
	
	define('__connection', '../app-node/dbconfig.php');

	define('__modules', '../app-modules/');

	require __connection;

	require __modules. 'database/DBConnect.class.php';


	$connexion = new DbConnect(DSN, LOGIN, PASSWORD);

	$instance  = $connexion->getInstance();




 ?>