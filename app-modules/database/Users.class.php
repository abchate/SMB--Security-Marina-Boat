<?php 
	
	class Users
	{
		private $instance;

		private $pid;


		public function __construct($instance)
		{
			$this->instance = $instance;
		}


		public function add($nom, $prenom, $nin, $phone, $password)
		{
			$request = "INSERT INTO `users`(u_nom, u_prenom, u_nin, u_phone, u_pid, u_pass, u_date) 
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
			$request = "SELECT * FROM `users` WHERE u_pid=:pid LIMIT 1";

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
			$request = "SELECT u_phone FROM `users` WHERE u_phone=:phone";

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
			$request = "SELECT * FROM `users` WHERE u_phone=:phone AND u_pass=:pass LIMIT 1";

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