<?php
session_start();
	class Restaurant_Controller extends CI_Controller {
		public function index() {
			$this->load->model('Restaurant');
			$data['restaurant'] = $this->Restaurant->getRestaurant();
			$this->load->view('inc/header');
			$this->load->view('restaurant', $data);
			$this->load->view('inc/footer');
		}
		
		public function chiffreaffaire() {
			$this->load->model('Restaurant');
			$cli_tmp= $this->Restaurant->getChiffreAffaire();
			$cli = array();
			$tmp = array();
			$i = 0;
			foreach($cli_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['NOM'];
				$tmp2[1] = $c['MONTANT'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['restaurant'] = $tmp;
			$this->load->view('inc/header');
			$this->load->view('chiffreaffaire', $cli);
			$this->load->view('inc/footer');
		}
		
		
		
		
	}
;?>