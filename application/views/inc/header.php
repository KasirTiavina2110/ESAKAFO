<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="keywords" content="voyages, madagascar, paysage, hotel, restaurant" />
	<head>
		<title>E-Sakafo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo css_url('main');?>" />
		<link rel="stylesheet" href="<?php echo css_url('style');?>" />
		<link rel="stylesheet" href="<?php //echo css_url('bootstrap');?>" />
	</head>
	<body>
		<header id="header">
			<h1><a href="#">E-Sakafo</a></h1>
			
			<a href="<?php echo base_url('');?>" class="menu button alt">Acceuil</a>
			<a href="<?php echo base_url('r_controller/page_recherche');?>" class="menu button alt">Recherche</a>
			<a href="<?php echo base_url('liste-restaurant');?>" class="menu button alt">Restaurant</a>
			<?php if(isset($_SESSION['nomrestaurant'] )) { ?>
					<a href="<?php echo base_url('liste-commande-restaurant/'.$_SESSION['idrestaurant']);?>" class="menu button alt">ListeCommande</a>
					<a href="<?php echo base_url('restaurant_controller/chiffreaffaire');?>" class="menu button alt">ChiffreAffaire</a>
			<?php }else{ ;?>
				<?php if(isset($_SESSION['login'] )) { ?>
						<?php if(isset($_SESSION['voloany'] )) { ?>
						<a href="<?php echo base_url('liste-commande-client/'.$_SESSION['idclient'].'/'.$_SESSION['voloany']);?>" class="menu button alt">ListeCommande</a>						
						<?php } ;?>
					<a href="<?php echo base_url('commande_controller/listeLivraison');?>" class="menu button alt">ListeLivraison</a>
				<?php }if(isset($_SESSION['loginesakafo'] )){ ;?>
					<a href="<?php echo base_url('liste-commande/');?>" class="menu button alt">ListeCommande</a>
					<a href="<?php echo base_url('restaurant_controller/chiffreaffaire');?>" class="menu button alt">ChiffreAffaire</a>
				<?php } ;?>
			<?php } ;?>
			<?php if(isset($_SESSION['login'])) { ?>
					<a href="<?php echo base_url('login_controller/logout')?>">Log out</a></li>
			<?php }else if(isset($_SESSION['nomrestaurant'])) { ?>
					<a href="<?php echo base_url('login_controller/logout')?>">Log out</a></li>
			<?php }else if(isset($_SESSION['loginesakafo'])) { ?>
					<a href="<?php echo base_url('login_controller/logout')?>">Log out</a></li>
			<?php }else if(isset($_SESSION['loginlivreur'])) { ?>
					<a href="<?php echo base_url('login_controller/logout')?>">Log out</a></li>
			<?php }else{ ;?>
					<a href="#menu">Login</a></li>
				<?php };?>	
		</header>
		<nav id="menu">
			<ul class="links">
				<li><a href="<?php echo base_url('r_controller/page_login');?>">Connexion</a></li>
				<li><a href="<?php echo base_url('r_controller/page_inscription');?>">Inscritpion</a></li>
				<li><a href="<?php echo base_url('index_controller');?>">Acceuil</a></li>
			</ul>
		</nav>