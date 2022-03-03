<?php 
	
	class Form
	{
		public static function isSting(String $var): bool
		{
			return is_string($var);
		}

		public static function isNom(String $nom) : bool
		{
			if(self::notEmpty($nom) && preg_match("#^[a-zA-Zçéèùïöêâûîô]+$#", $nom) && self::isSting($nom))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function isPrenom(String $prenom) : bool
		{
			if(self::notEmpty($prenom) && preg_match("#^[a-zA-Zçéèùïöêâûîô ]+$#", $prenom) && self::isSting($prenom))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function isNIN(String $nin) : bool
		{
			if(self::notEmpty($nin) && preg_match("#^[A-Z0-9]+$#", $nin))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function isPhone(String $phone) : bool
		{
			if(self::notEmpty($phone) && preg_match("#^[0-9+]+$#", $phone) && strlen($phone) >= 7)
			{
				return true;
			}
			else
			{
				return false;
			}
		}



		public static function notEmpty($data): bool
		{
			if(isset($data) && !empty($data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}


	}

	



 ?>