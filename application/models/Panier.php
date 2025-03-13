<?php
	class Panier extends CI_Model {
		
		protected $table = "Panier";
		
		public function getIdPanier($idclient) {
			$panier = $this->db->query("select idpanier  from Panier where IDCLIENT='".$idclient."'")->row_array();
			foreach($panier as $c)
			return $c;
		}
	}
;?>