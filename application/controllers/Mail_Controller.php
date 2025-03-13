<?php
	class Mail_Controller extends CI_Controller {
		
		function send() {			
			$this->load->model('Mail');
			$this->Mail->send();
			// return redirect()->to('index_controller');
		}
	}
;?>