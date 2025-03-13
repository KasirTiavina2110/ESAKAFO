<?php
	class Restaurant extends CI_Model {
		
		protected $table = "Restaurant";
		
		public function getRestaurant() {
			$restaurant = $this->db->query("select * from Restaurant");
			return $restaurant;
		}
		
		public function getNextSeq() {
			$seq = $this->db->query("select max(Id) from restaurant")->row_array();
			foreach($seq as $s)
			return $s+1;
		}
		
		public function search($critere) {
			$client = $this->db->query("select * from restaurant where Nom like '%".$critere."%'");
			return $client;
		}
		
		public function login($login, $mdp) {
			$client = $this->db->query("select count(*) from restaurant where login ='".$login."' and mdp ='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from restaurant where nom ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getNomRestaurant($id) {
			$client = $this->db->query("select nom from restaurant where idrestaurant ='".$id."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getNomRestaurantPlat($idplat) {
			$client = $this->db->query("select restaurant.nom from restaurant join plat on restaurant.idrestaurant=plat.idrestaurant where plat.idplat ='".$idplat."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		public function getIdRestaurant($nom,$mdp) {
			$client = $this->db->query("select idrestaurant from restaurant where nom ='".$nom."' and mdp='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		public function getRestaurantById($id) {
			$client = $this->db->query("select * from restaurant where IdRestaurant ='".$id."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getColonnes() {
			$colonne = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name = 'restaurant' AND table_schema='esakafo'");
			return $colonne;
		}
		
		public function getChiffreAffaire() {
			$restaurant = $this->db->query("select sum(commande.montant) as MONTANT,restaurant.nom as NOM from restaurant join plat on restaurant.idrestaurant=plat.idrestaurant join commande on plat.idplat=commande.idplat  group by restaurant.nom");
			return $restaurant;
		}
		
	}
;?>