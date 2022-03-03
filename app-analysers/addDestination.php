<?php 
	session_start();

	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Destination.class.php';

	$message  = "";

	$error    = 0;

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$destination = new Destination($instance);

		$added = $destination->add($nom, $numero, $addby,$phone, $ile_dep, $port_dep, $date_depart, $ile_arrive, 
							$port_arrive, $date_arrive, $passagers);

		if($added)
		{
			$message = "Votre destination a été ajoutée ";

		}else {
			$message = "Votre destination n'a pas été ajoutée ";
			$error  =1;
		}



	}

	echo json_encode(['message' => $message, 'error' => $error]);

?>