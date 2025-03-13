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
							
								<div class="table-wrapper">
								<?php if(isset($error)) {?>
											<h2><?php  echo $error ;?></h2>
								<?php } ;?>
								<h1>Liste des commandes pret:</h1>
								<a href="<?php echo base_url('liste-commande-reserver');?>" class="link"><h1>Liste des commandes reserver:</h1></a>
										<table>
											<thead>
												<tr>
														<th>Statut</th>
														<th>Restaurant</th>
														<th>Nom Plat</th>
														<th>Montant total</th>
														<th>Quantite</th>
														<th>--</th>
												</tr>
											</thead>
											<tbody>
												<?php for($i=0; $i<count($commande_data); $i++) { ?>
													<tr>
															<?php if($commande_data[$i][2]=='2'){;?>
																<form action="<?php echo base_url('commande_controller/updatecommandereserver') ;?>" method="post">
																	<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																		<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																	<?php };?>
																	<input name="idcommande" value="<?php echo $commande_data[$i][0] ;?>" hidden/>
																	<input name="idlivreur" value="<?php echo $_SESSION['idlivreur'] ;?>" hidden/>
																		<td><input type="submit" value="RESERVER" class="button alt"/></td>
																</form>	
															<?php }else{;?>
																	<?php for($a=2; $a<count($commande_data[$i]); $a++) { ?>
																		<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
																	<?php };?>
																		<td><input type="submit" value="Valider" class="button alt"/></td>													
															<?php };?>
														</tr>
													
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