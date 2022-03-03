<?php 

	function __renderView(string $view)
	{
		if(file_exists($view))
		{
			return $view;
		}
		else
		{
			return __render;
		}

	}

	
	function __bindController($view)
	{
		$file = __controllers.$view.'Controller.php';
		
		if(file_exists($file))
		{
			return $file;
		}
	}

	function redirect($path) 
	{
		header("location:". __webroot . $path);
	}

	function hasSession($p) {
		if((!isset($_SESSION['user-pid-active']) || empty($_SESSION['user-pid-active'])) && ($p != 'login' && $p !='register'))
		{
			redirect("login/");
		}
	}

	
 ?>