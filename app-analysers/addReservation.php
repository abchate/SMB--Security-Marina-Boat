<?php 
	session_start();

	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Reservation.class.php';

	$message  = "";

	$error    = 0;

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		if(Form::isNom($nom))
		{
			if(Form::isPrenom($prenom))
			{
				if(Form::isPhone($phone))
				{
					if(Form::notEmpty($destination))
					{
						if(Form::notEmpty($nombateau))
						{
							$depart = str_replace("T", " ", $depart).':00';

							$arrive = str_replace("T", " ", $arrive).':00';
							
							$reserve= new Reservation($instance);

							$added = $reserve->add($nom, $prenom, $phone, $destination, $nombateau, $depart, $arrive, $nbrenfant, $addby);

							if($added)
							{
								$message = "La réservation est ajoutée avec succès";
							}

						}
						else
						{
							$message = "Précisez le nom du bateau";
							$error   =1;
						}
					}
					else
					{
						$message = "Entrez la destination pour cette réservation ";
						$error   =1;
					}
				}
				else
				{
					$message = "Veuillez renseigner le numéro téléphone du client";
					$error   =1;
				}
			}
			else
			{
				$message = "Veuillez renseigner un prénom valide pour ce client";
				$error   =1;
			}
		}
		else
		{
			$message = "Veuillez renseigner un valide pour ce client";
			$error   =1;
		}






	}

	echo json_encode(['message' => $message, 'error' => $error]);

?>