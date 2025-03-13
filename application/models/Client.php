<?php
	class Client extends CI_Model {
		
		protected $table = "Client";
		
		
		public function insererclient($nom, $mdp, $mail) {
			//	Ces données seront automatiquement échappées
			// $this->db->set('Id',  $this->getNextSeq());
			$this->db->set('NOM',   $nom);
			$this->db->set('MDP', $mdp);
			$this->db->set('MAIL', $mail);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from client where nom ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getIdClient($nom,$mdp) {
			$client = $this->db->query("select idclient from client where nom ='".$nom."' and mdp='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		public function getNomClient($id) {
			$client = $this->db->query("select nom from client where Idclient ='".$id."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getNomClientPanier($id) {
			$client = $this->db->query("select client.nom as nom from client join panier on client.idclient=panier.idclient where idpanier ='".$id."'")->row_array();
			foreach($client as $c)
			return $c;
		}
	}
;?>