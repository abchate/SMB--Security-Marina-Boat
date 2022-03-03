<?php 
	session_start();

	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Users.class.php';

	$message  = "";

	$error    = 0;

	$pid  = "";

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$user = new Users($instance);

		$password = 'sha21-'.md5($password);

		if(Form::isPhone($login))
		{
			$userdata = $user->connect($login, $password);

			if(!empty($userdata) && ($userdata->u_pass == $password))
			{
				$message ="Vous êtes connecté";
				$_SESSION['user-pid-active'] = $userdata->u_pid;
				$pid = $userdata->u_pid;
				$_SESSION['current-user']  = $userdata;
			}
			else
			{
				$message = "Vos informations sont invalides";
				$error =1;
			}

		}
		else
		{
			$message = "Votre identifiant n'a pas suvi les normes de notre site";
			$error   =1;
		}


	}

	echo json_encode([
		'message' => $message,
		'error'  => $error,
		'pid'   => $pid
 	]);
?>