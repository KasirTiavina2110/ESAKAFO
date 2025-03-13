<?php
session_start();
	class Single_Controller extends CI_Controller {
		public function index() {
			$this->load->model('Plat');
			$id = $this->input->get('idplat');
			$cat['plat'] = $this->Plat->getPlat($id);
			$this->load->view('inc/header');
			$this->load->view('plat',$cat);
			$this->load->view('inc/footer');
		}
		
	}
;?>