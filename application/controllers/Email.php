<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    function send() {
		date_default_timezone_set('Europe/Moscow');
		$this->load->model('loginm');
		$result=$this->loginm->inscription();
		if($result==true){
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $to = $this->input->post('email');
        $subject = 'Inscription';
        $message = 'Welcome';
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
       $this->load->view('connecter');
		}
    }
}
