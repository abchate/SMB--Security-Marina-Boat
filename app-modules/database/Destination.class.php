<?php 

	class Destination
	{

		private $instance;

		public function __construct($instance)
		{
			$this->instance = $instance;
		}


		public function add($nom, $numero, $addby,$phone, $ile_depart, $port_depart, $date_depart, $ile_arrive, 
							$port_arrive, $date_arrive, $passagers): bool
		{
			$request = "INSERT INTO `bateaux` 
				      (nom, numero, addby,phone, ile_depart,	port_depart, date_depart, ile_arrive, port_arrive, date_arrive, passagers, pid, date_add)
					  VALUES (:nom, :numero,:addby,:phone, :ile_depart, :port_depart, :date_depart, :ile_arrive, :port_arrive,:date_arrive, :passagers, :pid, :date_add)";

			$state = $this->instance->prepare($request);

			$date = date("Y-m-d H:i:s");

			$pid = rand(9000, 900000). uniqid() . rand(1000, 9999999);

			$state->bindParam(':nom', $nom);
			$state->bindParam(':numero', $numero);
			$state->bindParam(':addby', $addby);
			$state->bindParam(':phone', $phone);
			$state->bindParam(':ile_depart', $ile_depart);
			$state->bindParam(':port_depart', $port_depart);
			$state->bindParam(':date_depart', $date_depart);
			$state->bindParam(':ile_arrive', $ile_arrive);
			$state->bindParam(':port_arrive', $port_arrive);
			$state->bindParam(':date_arrive', $date_arrive);
			$state->bindParam(':passagers', $passagers);
			$state->bindParam(':pid', $pid);
			$state->bindParam(':date_add', $date);

			$added = $state->execute();

			if($added)
			{
				return true;
			}
			else
			{
				return false;
			}

		}

		public function getAll($addby)
		{
			$request = "SELECT * FROM `bateaux`  WHERE addby=:addby ORDER BY nom";

			$state = $this->instance->prepare($request);
			$state->bindParam(':addby', $addby);
			$state->execute();

			$data = $state->fetchAll(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function all()
		{
			$request = "SELECT * FROM `bateaux` ORDER BY nom";

			$state = $this->instance->prepare($request);
			$state->execute();

			$data = $state->fetchAll(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function allNgazidja()
		{
			$request = "SELECT * FROM `bateaux` WHERE ile_depart='Ngazidja' Or ile_arrive= 'Ngazidja' ORDER BY nom";

			$state = $this->instance->prepare($request);
			$state->execute();

			$data = $state->fetchAll(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function allAnjouan()
		{
			$request = "SELECT * FROM `bateaux` WHERE ile_depart='Anjouan' Or ile_arrive= 'Anjouan' ORDER BY nom";

			$state = $this->instance->prepare($request);
			$state->execute();

			$data = $state->fetchAll(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function allMoheli()
		{
			$request = "SELECT * FROM `bateaux` WHERE ile_depart='Moheli' Or ile_arrive= 'Moheli' ORDER BY nom";

			$state = $this->instance->prepare($request);
			$state->execute();

			$data = $state->fetchAll(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

	}


 ?>