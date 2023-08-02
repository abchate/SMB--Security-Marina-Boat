<?php 
	session_start();

	require 'settings.php';


	require __modules . 'database/Clients.class.php';

	$message  = "";

	$error    = 0;

	$pid  = "";

	$data = "";

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$user = new Clients($instance);

		//$password = 'sha21-'.md5($password);

		
		
			$userdata = $user->connect($login, $password);

			if(!empty($userdata) && ($userdata->c_pass == $password))
			{
				$message ="Vous êtes connecté";
				//$_SESSION['user-pid-active'] = $userdata->u_pid;
				$pid = $userdata->c_pid;
				$data = $userdata;
				//$_SESSION['current-user']  = $userdata;
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
		'data' => $data
 	]);
?>