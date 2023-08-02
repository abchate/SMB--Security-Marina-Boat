<?php 
	
	class Clients
	{
		private $instance;

		private $pid;


		public function __construct($instance)
		{
			$this->instance = $instance;
		}


		public function add($nom, $prenom, $nin, $phone, $password)
		{
			$request = "INSERT INTO `clients`(c_nom, c_prenom, c_nin, c_phone, c_pid, c_pass, c_date) 
						VALUES (:nom, :prenom, :nin, :phone, :pid, :pass, :dat)";

			$statement = $this->instance->prepare($request);

			$pid = rand(9000, 900000). uniqid() . rand(1000, 9999999);

			$date = date("Y-m-d H:i:s");

			$statement->bindParam(':nom', $nom);
			$statement->bindParam(':prenom', $prenom);
			$statement->bindParam(':nin', $nin);
			$statement->bindParam(':phone', $phone);
			$statement->bindParam(':pass', $password);
			$statement->bindParam(':pid', $pid);
			$statement->bindParam(':dat', $date);

			$saved = $statement->execute();

			if($saved)
			{
				$this->pid = $pid;
				return true;
			}
			else
			{
				return false;
			}
		}

		public function remoteUser($pid)
		{
			$request = "SELECT * FROM `clients` WHERE c_pid=:pid LIMIT 1";

			$state = $this->instance->prepare($request);

			$state->bindParam(':pid', $pid);

			$state->execute();

			$user = $state->fetch(PDO::FETCH_OBJ);

			$state->execute();

			if(!empty($user))
			{
				return $user;
			}
			else
			{
				return [];
			}

		}

		public function phoneExist($phone)
		{
			$request = "SELECT c_phone FROM `users` WHERE c_phone=:phone";

			$state = $this->instance->prepare($request);
			$state->bindParam(':phone', $phone);
			$state->execute();
			$phones = $state->fetchAll(PDO::FETCH_ASSOC);
			$state->execute();
			
			if(!empty($phones[0]))
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		public function connect($login, $password)
		{
			$request = "SELECT * FROM `clients` WHERE c_phone=:phone AND c_pass=:pass LIMIT 1";

			$state = $this->instance->prepare($request);
			$state->bindParam(':phone', $login);
			$state->bindParam(':pass', $password);
			$state->execute();
			$phones = $state->fetchAll(PDO::FETCH_OBJ);
			$state->execute();
			
			if(!empty($phones[0]))
			{
				return $phones[0];
			}
			else
			{
				return [];
			}
		}

		public function getPID()
		{
			return $this->pid;
		}
	}




 ?>