<?php 
	
	class DbConnect
	{

		/**
		 * @var variable qui stoque l'instance de la connexion à la base de données
		 */
		private $pdo;

		/**
		 * @method fait la connexion à la base données 
		 * @param les informations  
		 */
		public function __construct($dsn, $login, $password)
		{
			$dsn = $this->varExit($dsn);
			$login = $this->varExit($login);
			$password = $this->varExit($password);
			$this->createInstance($dsn, $login, $password);
		}

		public function createInstance($dsn, $login, $password)
		{

			$options = [
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

			];

			try
			{

				$this->pdo = new PDO($dsn, $login, $password, $options);
			}
			catch(PDOException $e) 
			{
				echo "Erreur de requette ";
			}

		}



		public function varExit($var)
		{
			if(isset($var) && !empty($var))
			{
				return $var;
			}
		}


		public function getInstance()
		{
			return $this->pdo;
		}
	}


 ?>