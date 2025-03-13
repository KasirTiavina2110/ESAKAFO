<?php
session_start();
	class Index_Controller extends CI_Controller {
		public function index(){
			$this->load->view('inc/header');
			$this->load->view('acceuil');
			$this->load->view('inc/footer');
		}
	}
;?>