<?php 
	class IMG
	{
		public static function pack($img)
		{
			$file = __static.'packs/'.$img;


			if(file_exists($file))
			{
				return __pack.'packs/'.$img;
			}
			else
			{
				return __pack . "packs/back.jpg";	
			}
		}

		public static function bind($img)
		{
			$file = __staspots.$img;


			if(file_exists($file))
			{
				return __wespots.$img;
			}
			else
			{
				return __pack . "packs/back.jpg";	
			}
		}
	}




 ?>