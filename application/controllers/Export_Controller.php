<?php 
	class Export_Controller extends CI_Controller {
		
		public function toCsv() {
			$this->load->model('Export');
			$nomtable=$this->input->post('nomtable');
			$this->Export->toCsv($nomtable);
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
		
		public function toPdf() {
			$this->load->library('fpdf');
			$this->load->model('Export');
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$this->fpdf->Open();
	
			$data = $this->Export->lectureData(base_url().'Chiffreaffaire.csv');
			$header = $this->Export->getColonne('Chiffreaffaire');
			$this->fpdf->SetFont('Arial', '', 14);
			$this->fpdf->AddPage();
			$this->fpdf->Ln();
					// Police Arial gras 15
			$this->fpdf->SetFont('Arial','B',15);
			// Décalage à droite
			$this->fpdf->Cell(60);
			// Titre
			$this->fpdf->Cell(70,10,'Chiffre d affaire',1,0,'C');
			// Saut de ligne
			$this->fpdf->Ln(20);
			$this->fpdf->Cell(15);
			foreach($header as $col)
				$this->fpdf->Cell(40,7,$col,1);
			$this->fpdf->Ln();
			foreach($data as $d) {
			$this->fpdf->Cell(15);
				foreach($d as $col)
					$this->fpdf->Cell(40, 6, $col, 1); 
				$this->fpdf->Ln();
			}
			
			$this->fpdf->Output();
		}
	}
;?>