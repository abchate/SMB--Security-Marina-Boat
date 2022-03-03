<?php 
	session_start();
	require 'app-configs/constantes.php';

	require __config.'fonctions.php';

	require __modules.'autoloader/Autoloader.class.php';

	Autoloader::register();

 ?>