<style type="text/css">
	
	.menu_admin {
		margin-left: 30%;
		// margin-right: 30%;
	}
	
	.menu_admin ul {
		display: inline;
		color:red;
		list-style-type:none;
		// margin-left: 30%;
	}
	
	.menu_admin ul li {
		margin-left:2px;
		float:left;
	}

	.menu_admin ul li a {
		display:block;
		float:left;   
		width:100px;
		background-color: rgb(104, 102, 76);
		color:black;
		text-decoration:none;
		text-align:center;
		padding:5px;
		border:2px solid;
		border-color:rgb(89, 78, 60);
    }
	
	
</style>
<div id="main">

<!-- One -->
	<section class="wrapper style1">
		<div class="inner">
			<div class="container">
					<div class="row">
							<section class="12u 12u$">
							<?php if(isset($_SESSION['nomrestaurant'] )) { ?>
									<h2>Liste commande du restaurant: <?php echo $_SESSION['nomrestaurant'] ;?></h2>
							<?php }else{ ;?>
								<?php if(isset($_SESSION['loginesakafo'] )) { ?>
									<h2>Liste commande en cours</h2>
								<?php }else{ ;?>
									<h2>Liste commande du client:<?php echo $nom_client ;?></h2>
								<?php } ;?>
							<?php } ;?>
							
								<div class="table-wrapper">
										<table>
											<thead>
												<tr>
														<th>Statut</th>
														<th>Restaurant</th>
														<th>Nom Plat</th>
														<th>Montant total</th>
														<th>Quantite</th>
														<th>Temps</th>
												</tr>
											</thead>
											<tbody>
											
												<?php for($i=0; $i<count($commande_data); $i++) { ?>
													<tr>
													<?php if( isset($_SESSION['login'])){;?>
															<?php if($commande_data[$i][2]=='0'){;?>
																<form action="<?php echo base_url('commande_controller/update') ;?>" method="post">
																	<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																		<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																	<?php };?>
																	<input name="idcommande" value="<?php echo $commande_data[$i][0] ;?>" hidden/>
																	<input name="idpanier" value="<?php echo $commande_data[$i][1] ;?>" hidden/>
																		<td><input type="submit" value="Valider" class="button alt"/></td>
																</form>	
															<?php }else{;?>
																	<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																		<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																	<?php };?>
																		<td><input type="submit" value="Valider" class="button alt"/></td>													
															<?php };?>
														<form action="<?php echo base_url('commande_controller/suppression-de-donnee-'.$commande_data[$i][0].'/'.$commande_data[$i][1].'') ;?>" method="GET">
															<td><input type="submit" value="Supprimer" class="button alt"/></td>
														</form>
														</tr>
													<?php } else{ ;?>
															<?php if( isset($_SESSION['idrestaurant'])){;?>
																	<?php if($commande_data[$i][2]=='1'){;?>
																		<form action="<?php echo base_url('commande_controller/updatestatutpret/'.$_SESSION['idrestaurant']) ;?>" method="post">
																			<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																				<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																			<?php };?>
																			<input name="idcommande" value="<?php echo $commande_data[$i][0] ;?>" hidden/>
																			<input name="idclient" value="<?php echo $commande_data[$i][1] ;?>" hidden/>
																				<td><input type="submit" value="PRET" class="button alt"/></td>
																		</form>	
																	<?php }else{;?>
																			<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																				<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																			<?php };?>
																				<td><input type="submit" value="PRET" class="button alt"/></td>													
																	<?php };?>
																</tr>
															<?php } else{ ;?>
																	<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																		<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																	<?php };?>
															<?php };?>
												<?php };?>
												<?php };?>
											</tbody>
										</table>
									</div>
							</section>
					</div>
			</div>
		</div>
	</section>

</div>