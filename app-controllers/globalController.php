<?php 
	/**
	 * @requires ['inclusion du fichier de configuration pour la connexion à la base de données']
	 */
	require __node.'dbconfig.php';

	/**
	 * @method ['Fonction vérifiant si la session active selon l'utilisateur ']
	 */
	hasSession($page);


	$pid = (isset($_SESSION['user-pid-active']) && !empty($_SESSION['user-pid-active']) ? $_SESSION['user-pid-active'] : 'void');

	$connexion  = new DbConnect(DSN, LOGIN, PASSWORD);

	$instance   = $connexion->getInstance();
	
	$user = new Users($instance);

	$fetch_user = $user->remoteUser($pid);


	$_activeUser = isset($_SESSION['current-user']) && !empty($_SESSION['current-user']) ? $_SESSION['current-user'] : $fetch_user;


	$images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg"];

	$image = $images[array_rand($images)];


 ?>