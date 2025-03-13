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
										<table>
											<thead>
												<tr>
														<th>Statut</th>
														<th>Restaurant</th>
														<th>Nom Plat</th>
														<th>Montant total</th>
														<th>Quantite</th>
														<th>Livreur</th>
														<th>--</th>
												</tr>
											</thead>
											<tbody>
												<?php for($i=0; $i<count($commande_data); $i++) { ?>
													<tr>
														<form action="<?php echo base_url('commande_controller/updatecommandelivrer') ;?>" method="post">
															<?php for($a=3; $a<count($commande_data[$i]); $a++) { ?>
																<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $commande_data[$i][$a] ;?>"/></td>
															<?php };?>
															<input name="idcommande" value="<?php echo $commande_data[$i][0] ;?>" hidden/>
															<input name="idclient" value="<?php echo $_SESSION['idclient'] ;?>" hidden/>
																<td><input type="submit" value="LIVRER" class="button alt"/></td>
														</form>	
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