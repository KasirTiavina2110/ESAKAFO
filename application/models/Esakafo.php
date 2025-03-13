<?php
	class Esakafo extends CI_Model {
		
		protected $table = "Esakafo";
		
		public function getHash($login) {
			$client = $this->db->query("select mdp from esakafo where nom ='".$login."'")->row_array();
			foreach($client as $c)
			return $c;
		}
		
	}
;?>