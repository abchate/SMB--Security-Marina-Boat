<?php 
	
	class View
	{

		public static function bind($view)
		{
			$file  = __index.$view.'.php';

			if(file_exists($file))
			{
				return $file;
			}
	
		}

		public static  function add($page)
		{
			$file = __templates.$page.'.php';

			if(file_exists($file))
			{
				return $file;
			}
			else
			{
				return __templates.'home.php';
			}

		}

	}





 ?>