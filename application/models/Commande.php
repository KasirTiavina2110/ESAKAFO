<?php
	class Commande extends CI_Model {
		
		protected $table = "Commande";
		protected $table2 = "Commandelivreur";
		protected $table3 = "Detailcommande";
		
		public function inserercommande($idpanier, $idplat, $statut, $montant, $quantite) {
			$this->db->set('IDPANIER',   $idpanier);
			$this->db->set('IDPLAT', $idplat);
			$this->db->set('STATUT', $statut);
			$this->db->set('MONTANT', $montant);
			$this->db->set('QUANTITE', $quantite);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table);
		}
		
		public function insererdetail($idcommande)
		{
			$this->db->set('IDCOMMANDE',   $idcommande);
			
			$this->db->set('HVALIDER', 'NOW()', false);
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table3);
		}
		
		public function updatedetail($idcommande,$nomcolonne) {
			$this->db->query("UPDATE Detailcommande SET 
			".$nomcolonne."= 
			NOW() where IDCOMMANDE='".$idcommande."'");
		}
		
		public function inserercommandelivreur($idcommande, $idlivreur) {
			//	Ces données seront automatiquement échappées
			// $this->db->set('Id',  $this->getNextSeq());
			$this->db->set('IDCOMMANDE', $idcommande);
			$this->db->set('IDLIVREUR', $idlivreur);
			
			//	Une fois que tous les champs ont bien été définis, on "insert" le tout
			return $this->db->insert($this->table2);
		}
		
		public function getNbrCommandeLivreur($idlivreur) {
			$restaurant = $this->db->query("select count(*) as isa from Commandelivreur where IDLIVREUR='".$idlivreur."'");
			return $restaurant;
		}
		
		public function getIdClient($nom,$mdp) {
			$client = $this->db->query("select idclient from Commande where nom ='".$nom."' and mdp='".$mdp."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getHVALIDER($idcommande) {
			$client = $this->db->query("select HVALIDER from detailcommande where idcommande=$idcommande")->row_array();
			foreach($client as $c)
			return $c;
		}
		public function getHLIVRER($idcommande) {
			$client = $this->db->query("select HLIVRER from detailcommande where idcommande=$idcommande")->row_array();
			foreach($client as $c)
			return $c;
		}
		public function getTemps($idcommande){
			$hv=date_create($this->getHVALIDER($idcommande));
			$hl=date_create($this->getHLIVRER($idcommande));
			$c=date_diff($hl,$hv)->format('%h h %i min %s s');
			return $c;
		}
		
		public function getCommande($idpanier) {
			$restaurant = $this->db->query("select * from Commande where idpanier='".$idpanier."'");
			return $restaurant;
		}
		public function getCommandePanierRestaurant($idpanier,$idrestaurant) {
			$restaurant = $this->db->query("select * from Commande join plat on commande.idplat=plat.idplat where commande.idpanier='".$idpanier."' and plat.idrestaurant='".$idrestaurant."'");
			return $restaurant;
		}
		
		public function getCommandeEncours() {
			$restaurant = $this->db->query("select * from Commande where statut=1");
			return $restaurant;
		}
		
		public function getToutCommande() {
			$restaurant = $this->db->query("select * from Commande");
			return $restaurant;
		}
		
		public function getCommandePret() {
			$restaurant = $this->db->query("select * from Commande where statut=2");
			return $restaurant;
		}
		public function getCommandeLivrer() {
			$restaurant = $this->db->query("select * from Commande where statut=4");
			return $restaurant;
		}
		
		
		public function getIdLivreur($idcommande) {
			$client = $this->db->query("select idlivreur from Commandelivreur where idcommande ='".$idcommande."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getDetailCommande($idcommande) {
			$client = $this->db->query("select*from DetailCommande where idcommande ='".$idcommande."'");
			// foreach($client as $c)
			return $client;
		}
		
		public function getNomLivreur($idlivreur) {
			$client = $this->db->query("select nom from Livreur where idlivreur ='".$idlivreur."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
		public function getCommandeReserver() {
			$restaurant = $this->db->query("select * from Commandelivreur join commande on commandelivreur.idcommande=commande.idcommande where commande.statut=3");
			return $restaurant;
		}
		
		public function getCommandeRestaurant($idrestaurant) {
			$restaurant = $this->db->query("select commande.idcommande as IDCOMMANDE,commande.idpanier as IDPANIER,commande.statut as STATUT,commande.idplat as IDPLAT,commande.montant as MONTANT,commande.quantite as QUANTITE from Commande join plat on commande.idplat=plat.idplat where plat.idrestaurant='".$idrestaurant."' and commande.statut=1");
			return $restaurant;
		}
		
		public function supprimer($id) {
			$this->db->delete($this->table, "IDCOMMANDE = '".$id."'");
		}
		
		public function update($idcommande,$statut) {
			$data = array(
				'STATUT' => $statut
			);
			$this->db->where('IDCOMMANDE', $idcommande);
			$this->db->update($this->table, $data);
		}
	}
;?>
