<?php 
	session_start();

	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Reservation.class.php';

	$message  = "";

	$error    = 0;

	$pid  = "";

	$data  = [];

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$client = new Reservation($instance);

		

			if(isset($pid))
			{
				$data = $client->getClient($pid);
			}
			else
			{
				$message = "Vos informations sont invalides";
				$error =1;
			}



	}

	echo json_encode([
		'message' => $message,
		'error'  => $error,
		'pid'   => $pid,
		'data'=>  $data
 	]);
?>