<?php
	class Livreur extends CI_Model {
		
		protected $table = "Livreur";
		
		
		public function getLivreur($nom) {
			$restaurant = $this->db->query("select * from Livreur where nom='".$nom."'");
			return $restaurant;
		}
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from livreur where nom ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getIdLivreur($login,$mdp) {
			$client = $this->db->query("select idlivreur from livreur where nom ='".$login."' and mdp ='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, "IDLIVREUR = '".$id."'");
		}
		
		public function update($idLivreur,$statut) {
			$data = array(
				'STATUT' => $statut
			);
			$this->db->where('IDLIVREUR', $idLivreur);
			$this->db->update($this->table, $data);
		}
	}
;?>