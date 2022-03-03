<?php 

	class Autoloader
	{

		public static function register()
		{
			spl_autoload_register([__CLASS__, 'autoload']);
		}



		public static function autoload($class)
		{
			$directories = json_decode(file_get_contents(__modules.'autoloader/autoloader.json'));

			foreach($directories->autoloader as $dir)
			{
				$file  = __modules.$dir.'/'.$class.'.class.php';

				if(file_exists($file))
				{
					require $file;
				}
			}
		}
	}




 ?>