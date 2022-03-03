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

		$reserve= new Reservation($instance);

        $updated= $reserve->updateState($pid, $etat);


            if(!empty($updated) )
			{
				$message ="reussi";
				//$_SESSION['user-pid-active'] = $userdata->u_pid;
				//$pid = $data->reserver_par;
				//$updated = $updated ;
				//$_SESSION['current-user']  = $userdata;
			}
			else
			{
				$message = "echec";
				$error =1;
			}




	}
    echo json_encode(['message' => $message, 'error' => $error]);

?>