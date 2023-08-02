<?php 
	
	class Profile
	{

		/**
		 *@var string | Variable contenant la variable super global $_FILES[]
		 */
		private $photo;

		/**
		 * @var String | Variable portant l'extension du fichier en sortie
		 */
		private $extension;

		/**
		 * @var String | Variable contenant le nom final de la photo
		 */
		private $photoname;


		/**
		 * @method Contructeur 
		 * @param string Nom de la photo
		 */
		public function __construct($photo)
		{
			$this->photo = $photo;
		}


		/**
		 * @method vérifie si l'élement passé en dans $_FILES est bien une image
		 *
		 * @param void
		 *
		 * @return {boolean}
		 *
		 * @test Vérifie si l'extension fichier est valide
		 */
		public  function validType()
		{
			$type_valid = ['jpg', 'png', 'jpeg', 'gif'];

			$file_name  = $this->photo['profil']['name'];

			$cplte_name = explode('.', $file_name);

			$extension  = array_pop($cplte_name);

			$this->extension = strtolower($extension);

			if(in_array($this->extension, $type_valid))
			{
				return true;
			}
			else
			{
				return false;
			}
		} 


		/**
		 * @method vérifie si la taille de la photo n'est pas dépassé
		 *
		 * @param void
		 *
		 * @return {boolean}
		 *
		 * @test Vérifie seulement la taille
		 */
		public function validSize() 
		{
			$maxzise    = 1861922;

			$file_size  = $this->photo['profil']['size'];

			if($file_size < $maxzise) {
				return true;
			}
			else{
				return false;
			}
		}


		/**
		 * @method vérifie si la variable $_FILES n'a pas renvoyé une erreur
		 *
		 * @param void
		 *
		 * @return {boolean}
		 *
		 * @test Vérifie les erreurs du fichier
		 */
		public function hasNotError()
		{
			$error = $this->photo['profil']['error'];

			if($error === 0) 
			{
				return true;
			}
			else{
				return false;
			}
		}


		/**
		 * @method deplacement du fichier temporaire dans un dossier valide
		 *
		 * @param string | Path dans lequel on veut placer l'élément final
		 * @param string | Name final du fichier
		 *
		 * @return {boolean}
		 *
		 * @test Vérifie si le fichier a bien été déplacé
		 */
		public function moveFile(string $path,  string $name)
		{
			$fakePath = $this->photo['profil']['tmp_name'];

			$this->photoname = $name.'.'.$this->extension;
			
		
			$isMoved = move_uploaded_file($fakePath, $path.'/'.$name.'.'.$this->extension);

			if($isMoved)
			{
				return true;
			}
			else {
				return false;
			}
		}

		public  static function removeFile($dir) 
		{
			if(is_dir($dir))
			{
				$objects = scandir($dir);

				foreach ($objects as $object)
				{
					if($object !== "." && $object !== "..")
					{
						if(filetype($dir.'/'.$object) == "dir")
						{
							rmdir($dir.'/'.$object);
						}
						else
						{
							unlink($dir.'/'.$object);
						}
					}
				}
				reset($objects);
				rmdir($dir);
			}

		 }
		/**
		 * @method Renvoie le nom de la photo
		 * @param void
		 * @return {string} Le nom de la photo
		 *
		 */
		public function getFinalName()
		{
			return $this->photoname;
		}
	}



 ?>