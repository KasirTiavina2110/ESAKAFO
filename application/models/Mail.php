<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Mail extends CI_model {
		
		public function send($mailclient) {
			date_default_timezone_set('GMT');
			$this->load->config('email');
		   $this->load->library('email');
		   
		   $from = "HeggyLoyens@gmail.com";
		   // $to = "hajatianarabekoto@gmail.com";
		   $subject = "essai";
		   $message = "salut";

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