<?php 
	session_start();

	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Users.class.php';

	$message  = "";

	$error    = 0;

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$user = new Users($instance);

		if($user->phoneExist($phone) != $phone)
		{
			$message = "Le numéro $phone est déjà associé à un compte existant";
			$error  = 1;
		}else {
			if(Form::isNom($nom))
			{
				if(Form::isPrenom($prenom))
				{
					if(Form::isNIN($nin))
					{
						if(Form::isPhone($phone))
						{
							if(strlen($password) > 5)
							{
								if($password == $confirm)
								{
									$password = 'sha21-'.md5($password);

									

									$added = $user->add($nom, $prenom, $nin, $phone, $password);

									if($added)
									{
										

										$pid = $user->getPID();

										$_SESSION['user-pid-active'] = $pid;

										$_SESSION['current-user'] = $user->remoteUser($pid);

										$message = "Votre compte a bien été crée !";

									}


									$message = "Enregistrement de l'utilisateur en cours...";
								}
								else
								{
									$message = "Vos deux mots de passe ne sont pas identiques";
									$error   =1;
								}
							}	
							else
							{
								$message = "Votre mot de passe est trop faible";
								$error   =1;
							}

						}
						else
						{
							$message = "Veuillez renseigner un numéro valide";
							$error   = 1;
						}
					}
					else
					{
						$message = "Veuillez renseigner un NIN valide ";
						$error   = 1;
					}
				}
				else
				{
					$message = "Veuillez renseigner un prénom valide";
					$error   =1;
				}
			}
			else
			{
				$message = "Veuillez renseigner un nom valide ";
				$error   = 1;
			}

		}




	}





	echo json_encode([
		'message' => $message, 
		'error' =>$error]
	);

 ?>