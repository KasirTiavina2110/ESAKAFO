<?php
session_start();
	class Inscription_Controller extends CI_Controller {
		
		public function index() {
			$this->load->model('Mail');
			$nom = $this->input->post('nom');
			$mail = $this->input->post('mail');
			$mdp = $this->input->post('mdp');
			$mdpfin= password_hash($mdp, PASSWORD_DEFAULT);
			$this->load->model('Client');
			// $this->send($mail);
			$this->Client->insererclient($nom, $mdpfin, $mail);
			$this->load->view('inc/header');
			$this->load->view('acceuil');
			$this->load->view('inc/footer');
		}
		
		public function send($mailclient) {
			date_default_timezone_set('GMT');
			$this->load->config('email');
		   $this->load->library('email');
		   
		   $from = "HeggyLoyens@gmail.com";
		   // $to = "hajatianarabekoto@gmail.com";
		   $subject = "Inscription a E-Sakafo";
		   $message = "Votre inscription au site est un succes. Bienvenue.";

		   $this->email->set_newline("\r\n");
		   $this->email->from($from);
		   $this->email->to($mailclient);
		   $this->email->subject($subject);
		   $this->email->message($message);

		   if ($this->email->send()) {
			   echo 'Your Email has successfully been sent.';
		   } else {
			   show_error($this->email->print_debugger());
		   }
			
		}
	}
;?>