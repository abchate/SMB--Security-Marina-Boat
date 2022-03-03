<?php



	require 'settings.php';

	

	require __modules . 'database/Clients.class.php';

	

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$clients = new Clients($instance);

		$added = $clients->add($nom, $prenom, $nin, $phone, $password
							);

		if($added)
		{
			$message = "le compte est créé  ";
            

		}else {
			$message = "le compte n'est pas créé ";
			$error  =1;
            
		}



	}

	echo json_encode(['message' => $message, 'error' => $error]);
?>