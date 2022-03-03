<?php 
	
	class Reservation
	{
		private $instance;



		public function __construct($instance)
		{
			$this->instance = $instance;
		}



		public function add($nom, $prenom, $phone, $matricule, $nombateau, $ile_depart, $port_depart,
		$date_depart, $ile_arrive, $port_arrive, $date_arrive, $nbrenfant_10, $nbrenfant_14, $prix,$reserver_par, $ajout_par, $u_phone): bool
		{
			$request = "INSERT INTO `reservations` 
				      (nom, prenom, phone, matricule, nombateau, ile_depart, port_depart, date_depart, ile_arrive, port_arrive,
					   date_arrive, nbrenfant_10, nbrenfant_14, prix, reserver_par, ajout_par, u_phone, etat, pid, create_at)
					  VALUES (:nom, :prenom, :phone, :matricule,:nombateau, :ile_depart,:port_depart,:date_depart, :ile_arrive,
					  :port_arrive,:date_arrive, :nbrenfant_10,:nbrenfant_14,:prix,:reserver_par, :addby,:u_phone, :etat, :pid, :dat)";

			$state = $this->instance->prepare($request);
			$etat = "Non Payé";
			$date = date("Y-m-d H:i:s");
			$pid = rand(9000, 900000). uniqid() . rand(1000, 9999999);

			$state->bindParam(':nom', $nom);
			$state->bindParam(':prenom', $prenom);
			$state->bindParam(':phone', $phone);
			$state->bindParam(':matricule', $matricule);
			$state->bindParam(':nombateau', $nombateau);
			$state->bindParam(':ile_depart', $ile_depart);
			$state->bindParam(':port_depart', $port_depart);
			$state->bindParam(':date_depart', $date_depart);
			$state->bindParam(':ile_arrive', $ile_arrive);
			$state->bindParam(':port_arrive', $port_arrive);
			$state->bindParam(':date_arrive', $date_arrive);
			$state->bindParam(':nbrenfant_10', $nbrenfant_10);
			$state->bindParam(':nbrenfant_14', $nbrenfant_14);
			$state->bindParam(':prix', $prix);
			$state->bindParam(':reserver_par', $reserver_par);
			$state->bindParam(':addby', $ajout_par);
			$state->bindParam(':u_phone', $u_phone);
			$state->bindParam(':etat', $etat);
			$state->bindParam(':pid', $pid);
			$state->bindParam(':dat', $date);

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
			$request = "SELECT * FROM `reservations`  WHERE ajout_par=:addby ORDER BY nom";

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

		public function getClient($pid)
		{
			$request = "SELECT * FROM `reservations`  WHERE pid=:pid LIMIT 1";

			$state = $this->instance->prepare($request);
			$state->bindParam(':pid', $pid);
			$state->execute();

			$data = $state->fetch(PDO::FETCH_OBJ);

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function getBillets($reserver_par)
		{
			$request = "SELECT * FROM `reservations`  WHERE reserver_par=:reserver_par";

			$state = $this->instance->prepare($request);
			$state->bindParam(':reserver_par', $reserver_par);
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

		public function deleteBillets($pid)
		{
			$request = "DELETE  FROM `reservations`  WHERE pid=:pid";

			$state = $this->instance->prepare($request);
			$state->bindParam(':pid', $pid);
			$state->execute();

			//$data = $state->fetchAll(PDO::FETCH_OBJ);
			$data = $state->execute();

			if(!empty($data))
			{
				return $data;
			}
			else
			{
				return [];
			}
		}

		public function updateState($id, $etat)
		{
			$request = "UPDATE `reservations` SET etat=:etat WHERE pid=:pid LIMIT 1";

			$state = $this->instance->prepare($request);

			$state->bindParam(':etat', $etat);
			$state->bindParam(':pid', $id);

			$updated = $state->execute();

			if($updated)
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