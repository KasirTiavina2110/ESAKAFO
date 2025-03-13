<?php
session_start();
	class Login_Controller extends CI_Controller {
		public function index() {
			$error = "<p>Erreur login/mot de passe</p>";
			$cat = $this->input->post('categorie');
			if($cat == 'client') {
				$this->load->model('Client');
				$log = $this->input->post('login');
				$mdp = $this->input->post('mdp');
				$hash=$this->Client->getHash($log);
				if(password_verify($mdp, $hash)){
					$this->load->model('Restaurant');
					$this->load->model('Panier');
					$data['restaurant'] = $this->Restaurant->getRestaurant();
					$idclient=$this->Client->getIdClient($log,$hash);
					$idpanier=$this->Panier->getIdPanier($idclient);
					$this->load->view('inc/header');
					$this->load->view('restaurant', $data);
					$this->load->view('inc/footer');
					$_SESSION['categorie'] = $cat;
					$_SESSION['login'] = $log;
					$_SESSION['mdp'] = $hash;
					$_SESSION['idclient'] = $idclient;
					$_SESSION['idpanier'] = $idpanier;
				}else {
					echo 'Misy diso ny mot de passse.';
					$this->load->view('login', $error);
				} 
			}else if($cat == 'restaurant') {
					$this->load->model('Restaurant');
					$log = $this->input->post('login');
					$mdp = $this->input->post('mdp');
					$hash=$this->Restaurant->getHash($log);
					if(password_verify($mdp, $hash)){
						$idrestaurant=$this->Restaurant->getIdRestaurant($log,$hash);
						$data = $this->acceuil($idrestaurant);
						$this->load->view('inc/header');
						$this->load->view('adminrestaurant', $data);
						$this->load->view('inc/footer');
						$_SESSION['nomrestaurant'] = $log;
						$_SESSION['idrestaurant'] = $idrestaurant;
						$_SESSION['mdprestaurant'] = $hash;
					}else {
						echo 'Le mot de passe est invalide.';
						$this->load->view('login', $error);
					} 
			}else if($cat == 'esakafo') {
					$this->load->model('Esakafo');
					$log = $this->input->post('login');
					$mdp = $this->input->post('mdp');
					// $hash=$mdp;
					$hash=$this->Esakafo->getHash($log);
					if(password_verify($mdp, $hash)){
						$data = $this->acceuilesakafo();
						$this->load->view('inc/header');
						$this->load->view('adminesakafo', $data);
						$this->load->view('inc/footer');
						$_SESSION['loginesakafo'] = $log;
						$_SESSION['mdpesakafo'] = $hash;
					}else {
						echo 'Le teny de passe est invalide.';
						$this->load->view('login', $error);
					} 
				}else{
					$this->load->model('Livreur');
					$log = $this->input->post('login');
					$mdp = $this->input->post('mdp');
					$hash=$this->Livreur->getHash($log);
					if(password_verify($mdp, $hash)){
						$data = $this->listecommandepret();
						$this->load->view('inc/header');
						$this->load->view('listecommandepret', $data);
						$this->load->view('inc/footer');
						$idlivreur=$this->Livreur->getIdLivreur($log,$hash);
						$_SESSION['loginlivreur'] = $log;
						$_SESSION['mdplivreur'] = $hash;
						$_SESSION['idlivreur'] = $idlivreur;
					}else {
						echo 'Le teny de passe est invalide.';
						$this->load->view('login', $error);
					} 
				}
			}
		
		public function acceuil($idrestaurant) {
			$cli = array();
			$this->load->model('Plat');
			$cli_tmp = $this->Plat->getPlatRestaurant($idrestaurant);
			$nomresto = $this->Restaurant->getRestaurantById($idrestaurant);
			$nomrestaurant = $this->Restaurant->getNomRestaurant($idrestaurant);
			$tmp = array();
			$i = 0;
			foreach($cli_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['IDPLAT'];
				$tmp2[1] = $c['NOM'];
				$tmp2[2] = $c['DESCRIPTION'];
				$tmp2[3] = $c['PRIX'];
				$tmp2[4] = $c['IMAGE'];
				$tmp2[5] = $c['TEMPSPREPARATION'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Plat';
			$cli['admin_data'] = $tmp;
			$cli['nom_resto'] = $nomresto;
			$cli['nom_restaurant'] = $nomrestaurant;
			$cli['colonne_data'] = $this->Plat->getColonnes();
			return $cli;
		}
		
		public function acceuilesakafo() {
			$cli = array();
			$this->load->model('Restaurant');
			$cli_tmp = $this->Restaurant->getRestaurant();
			$tmp = array();
			$i = 0;
			foreach($cli_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['IDRESTAURANT'];
				$tmp2[1] = $c['NOM'];
				$tmp2[2] = $c['MDP'];
				$tmp2[3] = $c['IMAGE'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Restaurant';
			$cli['admin_data'] = $tmp;
			$cli['colonne_data'] = $this->Restaurant->getColonnes();
			return $cli;
		}
		
		
		public function logout() {
			session_unset ();
			session_destroy ();
			
			$this->load->view('inc/header');
			$this->load->view('acceuil');
			$this->load->view('inc/footer');
		}
		
		public function listecommandepret() {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$cli_tmp= $this->Commande->getCommandePret();
			$cli = array();
			$tmp = array();
			$i = 0;
			foreach($cli_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['IDCOMMANDE'];
				$tmp2[1] = $c['IDPANIER'];
				$tmp2[2] = $c['STATUT'];
				$tmp2[3] = $this->Restaurant->getNomRestaurantPlat($c['IDPLAT']);
				$tmp2[4] = $this->Plat->getNomPlat($c['IDPLAT']);
				$tmp2[5] = $c['MONTANT'];
				$tmp2[6] = $c['QUANTITE'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Commande';
			$cli['commande_data'] = $tmp;
			return $cli;
		}
	}
;?>