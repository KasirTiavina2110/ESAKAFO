<?php
session_start();
	class R_Controller extends CI_Controller {
		
		public function page_login() {
			$this->load->view('login');
		}
		
		public function page_inscription() {
			$this->load->view('inscription');
		}
		
		public function page_recherche() {
			$this->load->model('Plat');
			$nomplat=$this->input->post('nomplat');
			$categorie=$this->input->post('categorie');
			$prixmax=$this->input->post('prixmax');
			$prixmin=$this->input->post('prixmin');
			if(isset($nomplat)){
				$recherche['recherche']= $this->Plat->recherchemulti($nomplat,$categorie,$prixmax,$prixmin);
				echo '>>>'.$nomplat;
				$this->load->view('inc/header');
				$this->load->view('recherche',$recherche);
				$this->load->view('inc/footer');
			}else if(isset($categorie)){
				$recherche['recherche']= $this->Plat->recherchemulti($nomplat,$categorie,$prixmax,$prixmin);
				echo '>>>'.$categorie;
				$this->load->view('inc/header');
				$this->load->view('recherche',$recherche);
				$this->load->view('inc/footer');
			}else if(isset($prixmax)){
				$recherche['recherche']= $this->Plat->recherchemulti($nomplat,$categorie,$prixmax,$prixmin);
				echo '>>>'.$prixmax;
				$this->load->view('inc/header');
				$this->load->view('recherche',$recherche);
				$this->load->view('inc/footer');
			}else if(isset($prixmin)){
				$recherche['recherche']= $this->Plat->recherchemulti($nomplat,$categorie,$prixmax,$prixmin);
				echo '>>>'.$prixmin;
				$this->load->view('inc/header');
				$this->load->view('recherche',$recherche);
				$this->load->view('inc/footer');
			}else{
				$this->load->view('inc/header');
				$this->load->view('recherche');
				$this->load->view('inc/footer');
			}
		}
		
		
	}
;?>