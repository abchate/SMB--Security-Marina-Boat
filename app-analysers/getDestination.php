<?php

    
	require 'settings.php';

	require __modules . 'forms/Form.class.php';

	require __modules . 'database/Destination.class.php';

	$message  = "";

	$error    = 0;


    $destination = new Destination($instance);

    $data = $destination->all();


    
    echo json_encode(['data' => $data]);

?>