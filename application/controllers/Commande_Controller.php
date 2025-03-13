<?php 
session_start();
	class Commande_Controller extends CI_Controller {
		
		public function admin() {
			$this->load->model('ReservationCircuit');
			$res = array();
			$res_tmp = $this->ReservationCircuit->getResCircuit();
			$tmp = array();
			$i = 0;
			foreach($res_tmp->result_array() as $c) {
				$tmp2 = array();
				$tmp2[0] = $c['id'];
				$tmp2[1] = $c['idclient'];
				$tmp2[2] = $c['idcircuit'];
				$tmp2[3] = $c['nbpersonne'];
				$tmp2[4] = $c['datedepart'];
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$res['table'] = 'Reservation';
			$res['controlle'] = 'reservation';
			$res['admin_data'] = $tmp;
			$res['colonne_data'] = $this->ReservationCircuit->getColonnes();
			$this->load->view('inc/header');
			$this->load->view('admin', $res);
			$this->load->view('inc/footer');
		}
		
		public function listeClient() {
			$idclient=$this->input->get('idclient');
			$idrestaurant=$this->input->get('idrestaurant');
			$data=$this->listecommande($idclient,$idrestaurant);
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function listeEsakafo() {
			$data=$this->listecommandeesakafo();
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function listeRestaurant() {
			$idrestaurant=$this->input->get('idrestaurant');
			$data=$this->listecommanderestaurant($idrestaurant);
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function listeReserver() {
			$data=$this->listecommandereserver();
			$this->load->view('inc/header');
			$this->load->view('listecommandereserver',$data);
			$this->load->view('inc/footer');
		}
		public function listeLivraison() {
			$data=$this->listecommandelivraison();
			$this->load->view('inc/header');
			$this->load->view('listelivraison',$data);
			$this->load->view('inc/footer');
		}
		
		public function listePret() {
			$data=$this->listecommandepret();
			$this->load->view('inc/header');
			$this->load->view('listecommandepret',$data);
			$this->load->view('inc/footer');
		}
		
		public function updatestatutpret() {
			$this->load->model('Commande');
			$idrestaurant=$this->input->get('idrestaurant');
			$idcommande = $this->input->post('idcommande');
			$statut=2;
			$this->Commande->update($idcommande,$statut);
			$this->Commande->updatedetail($idcommande,'HPRET');
			$data=$this->listecommanderestaurant($idrestaurant);
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function updatecommandereserver() {
			$this->load->model('Commande');
			$idcommande = $this->input->post('idcommande');
			$idlivreur = $this->input->post('idlivreur');
			$nombremax= $this->Commande->getNbrCommandeLivreur($idlivreur)->row_array();
			foreach($nombremax as $nb)
			$nbr=$nb;
			if($nbr>=2){
						$data=$this->listecommandepret();
						$data['error']='Vous avez atteint la limite de nbr de commande reserver';
						$this->load->view('inc/header');
						$this->load->view('listecommandepret',$data);
						$this->load->view('inc/footer');
			}else{
			$this->Commande->inserercommandelivreur($idcommande,$idlivreur);
			$statut=3;
			$this->Commande->update($idcommande,$statut);
			$data=$this->listecommandereserver();
			$this->load->view('inc/header');
			$this->load->view('listecommandereserver',$data);
			$this->load->view('inc/footer');
			}
		}
		
		public function updatecommanderecuperer() {
			$this->load->model('Commande');
			$idcommande = $this->input->post('idcommande');
			$statut=4;
			$this->Commande->update($idcommande,$statut);
			$this->Commande->updatedetail($idcommande,'HRECUPERER');
			$data=$this->listecommandereserver();
			$this->load->view('inc/header');
			$this->load->view('listecommandereserver',$data);
			$this->load->view('inc/footer');
		}
		
		public function updatecommandelivrer() {
			$this->load->model('Commande');
			$idcommande = $this->input->post('idcommande');
			$statut=5;
			$this->Commande->update($idcommande,$statut);
			$this->Commande->updatedetail($idcommande,'HLIVRER');
			$data['detail']= $this->Commande->getDetailCommande($idcommande);
			$this->load->view('inc/header');
			$this->load->view('detailcommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function acceuil() {
			$this->load->model('Categorie');
			$data['categorie'] = $this->Categorie->getCategories();
			$this->load->view('inc/header', $data);
			$this->load->view('acceuil', $data);
			$this->load->view('inc/footer');
		}
		
		public function insertioncommande()	{
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$login=$this->input->post('login');
			$mdp=$this->input->post('mdp');
			$idpanier=$this->input->post('idpanier');
			$idclient=$this->Client->getIdClient($login, $mdp);
			$idplat = $this->input->post('idplat');
			$quantite = $this->input->post('quantite');
			$statut=0;
			$montant=$this->Plat->getPrix($idplat);
			$idrestaurant=$this->Plat->getPremierRestaurant($idplat);
			if(isset($_SESSION['voloany'])){
				$montantfinal=$montant*$quantite;
				$this->Commande->inserercommande($idpanier, $idplat, $statut, $montantfinal, $quantite);
				$data=$this->listecommande($idpanier,$idrestaurant);
				$this->load->view('inc/header');
				$this->load->view('listecommande',$data);
				$this->load->view('inc/footer');
			}else{
				$_SESSION['voloany'] = $idrestaurant;
				$montantfinal=$montant*$quantite;
				$this->Commande->inserercommande($idpanier, $idplat, $statut, $montantfinal, $quantite);
				$data=$this->listecommande($idpanier,$idrestaurant);
				$this->load->view('inc/header');
				$this->load->view('listecommande',$data);
				$this->load->view('inc/footer');
			}
		}
		
		public function insertion_admin()	{
			$this->load->model('ReservationCircuit');
			$idCli = $this->input->post('a1');
			$idCirc = $this->input->post('a2');
			$nbP = $this->input->post('a3');
			$dateDepart = $this->input->post('a4');
			$this->ReservationCircuit->inserer($idCli, $idCirc, $nbP, $dateDepart);
			$this->admin();
		}
		
		public function update() {
			$this->load->model('Commande');
			$idcommande = $this->input->post('idcommande');
			$idpanier = $this->input->post('idpanier');
			$idrestaurant = $_SESSION['voloany'];
			$statut=1;
			$this->Commande->update($idcommande,$statut);
			$this->Commande->insererdetail($idcommande);
			$data=$this->listecommande($idpanier,$idrestaurant);
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function supprimer() {
			$this->load->model('Commande');
			$id = $this->input->get('idcommande');
			$idclient=$this->input->get('idclient');
			$idrestaurant=$_SESSION['voloany'];
			$id = $this->input->get('idcommande');
			$this->Commande->supprimer($id);
			$data=$this->listecommande($idclient,$idrestaurant);
			$this->load->view('inc/header');
			$this->load->view('listecommande',$data);
			$this->load->view('inc/footer');
		}
		
		public function listecommande($idpanier,$idrestaurant) {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			// $cli_tmp= $this->Commande->getCommande($idpanier,$idrestaurant);
			$cli_tmp= $this->Commande->getCommandePanierRestaurant($idpanier,$idrestaurant);
			$nom_client= $this->Client->getNomClientPanier($idpanier);
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
			$cli['nom_client'] = $nom_client;
			return $cli;
		}
		
		public function listecommandeesakafo() {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$cli_tmp= $this->Commande->getToutCommande();
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
				$tmp2[7] = $this->Commande->getTemps($c['IDCOMMANDE']);
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Commande';
			$cli['commande_data'] = $tmp;
			return $cli;
		}
		
		public function listecommanderestaurant($idrestaurant) {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$cli_tmp= $this->Commande->getCommandeRestaurant($idrestaurant);
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
		
		public function listecommandereserver() {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$cli_tmp= $this->Commande->getCommandeReserver();
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
		
		
		public function listecommandelivraison() {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$cli_tmp= $this->Commande->getCommandeLivrer();
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
				$tmp2[7] = $this->Commande->getNomLivreur($this->Commande->getIdLivreur($c['IDCOMMANDE']));
				$tmp[$i] = $tmp2;
				$i+=1;
			}
			$cli['table'] = 'Commande';
			$cli['commande_data'] = $tmp;
			return $cli;
		}
		
		public function detailliste($idcommande) {
			$this->load->model('Commande');
			$this->load->model('Client');
			$this->load->model('Plat');
			$this->load->model('Restaurant');
			$data['detail']= $this->Commande->getDetailCommande($idcommande);
			return $cli;
		}
	}
;?>