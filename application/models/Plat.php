<?php
	class Plat extends CI_Model {
		
		protected $table = "Plat";
		
		public function getRestaurant() {
			$Plat = $this->db->query("select * from Plat");
			return $Plat;
		}
		
		public function getNextSeq() {
			$seq = $this->db->query("select max(Id) from Plat")->row_array();
			foreach($seq as $s)
			return $s+1;
		}
		
		public function getPlat($critere) {
			$client = $this->db->query("select * from Plat where Idplat='".$critere."'");
			return $client;
		}
		
		public function recherchemulti($nomplat,$categorie,$prixmax,$prixmin) {
			$client = $this->db->query("select * from Plat join categorie on plat.idcategorie=categorie.idcategorie where plat.nom like '%$nomplat%' and categorie.nomcategorie like '%$categorie%' and plat.prix<=$prixmax and plat.prix>=$prixmin");
			return $client;
		}
		
		public function getPlatRestaurant($critere) {
			$client = $this->db->query("select * from Plat where idrestaurant='".$critere."'");
			return $client;
		}
		
		public function getColonnes() {
			$colonne = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name = 'plat' AND table_schema='esakafo'");
			return $colonne;
		}
		
		public function insererplat($idrestaurant, $nom, $description, $prix, $image, $tp) {
			$this->db->set('IDRESTAURANT',   $idrestaurant);
			$this->db->set('NOM', $nom);
			$this->db->set('DESCRIPTION', $description);
			$this->db->set('PRIX', $prix);
			$this->db->set('IMAGE', $image);
			$this->db->set('TEMPSPREPARATION', $tp);
			return $this->db->insert($this->table);
		}
		
		public function update($idrestaurant,$nom, $descritpion, $prix, $image, $tp) {
			$data = array(
				'NOM' => $nom,
				'DESCRIPTION' => $descritpion,
				'PRIX' => $prix,
				'IMAGE' => $image,
				'TEMPSPREPARATION' => $tp
			);
			$this->db->where('IDPLAT', $idrestaurant);
			$this->db->update($this->table, $data);
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, "IDPLAT = '".$id."'");
		}
		
		public function getPrix($idplat) {
			$client = $this->db->query("select prix from plat where idplat ='".$idplat."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getNomPlat($idplat) {
			$client = $this->db->query("select nom from plat where idplat ='".$idplat."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getPremierRestaurant($idplat) {
			$client = $this->db->query("select idrestaurant from plat where idplat ='".$idplat."'")->row_array();
			foreach($client as $c)
			return $c;
		}
	}
;?>
