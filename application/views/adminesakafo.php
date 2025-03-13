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
								<h2>Liste des restaurants en partenariat</h2>
								<form action="<?php echo base_url('plat_controller/insertionplat') ;?>" method="post">
								<?php
									$a=0;
									foreach($colonne_data->result_array() as $col) {?>
									<input style="width: 17%; color: black; border-radius:5px; opacity: 0.7; padding-left:5px;" name="<?php echo 'a'.$a;?>" placeholder="<?php echo $col['column_name'] ;?>"/>
								<?php $a++;};?>
									<input style="width: 13%;" type="submit" value="Inserer"/>
								</form>
								<div class="table-wrapper">
										<table>
											<thead>
												<tr>
														<th>Nom</th>
														<th>Mdp</th>
														<th>Image</th>
														<th>-</th>
														<th>-</th>
												</tr>
											</thead>
											<tbody>
												<?php for($i=0; $i<count($admin_data); $i++) { ?>
													<tr>
													<form action="<?php echo base_url('plat_controller/update') ;?>" method="post">
														<?php for($a=1; $a<count($admin_data[$i]); $a++) { ?>
																<input name="idplat" value="<?php echo $admin_data[$i][0] ;?>" hidden/>
															<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $admin_data[$i][$a] ;?>"/></td>
														<?php };?>
															<td><input type="submit" value="Modifier" class="button alt"/></td>
													</form>	
													<form action="<?php echo base_url('plat_controller/supprimer/'.$admin_data[$i][0].'') ;?>" method="GET">
														<td><input type="submit" value="Supprimer" class="button alt"/></td>
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