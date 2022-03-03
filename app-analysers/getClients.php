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

		
		
			$userdata = $user->remoteUser($pid);

			if(!empty($userdata) && ($userdata->c_pid == $pid))
			{
				$message ="reussi";
				//$_SESSION['user-pid-active'] = $userdata->u_pid;
				$pid = $userdata->c_pid;
				$data = $userdata;
				//$_SESSION['current-user']  = $userdata;
			}
			else
			{
				$message = "echec";
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