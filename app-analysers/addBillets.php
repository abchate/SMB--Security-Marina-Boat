<?php



	require 'settings.php';

	

	require __modules . 'database/Reservation.class.php';

	$message  = "";

	$error    = 0;

	if(isset($_POST) && !empty($_POST))
	{

		foreach($_POST as $k => $v){ ${$k} = $v;}

		$reserve= new Reservation($instance);

			$added = $reserve->add($nom, $prenom, $phone, $matricule, $nombateau, $ile_depart,$port_depart,$date_depart, $ile_arrive,$port_arrive,$date_arrive, $nbrenfant_10,$nbrenfant_14,$prix,$reserver_par, $addby, $u_phone);


		if($added)
		{
			$message = "reservsation est effectuer  ";
            

		}else {
			$message = "echec de la reservation ";
			$error  =1;
            
		}



	}

	echo json_encode(['message' => $message, 'error' => $error]);
?>