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
														<th>Nom Plat</th>
														<th>Categorie</th>
														<th>PrixMax</th>
														<th>PrixMin</th>
														<th>-----</th>
												</tr>
											</thead>
											<tbody>
														<tr>
															<form action="<?php echo base_url('r_controller/page_recherche') ;?>" method="post">
																<td><input type="text" name="nomplat" value="" placeholder="Nom-du-plat"/></td>
																<td><input type="text" name="categorie" value="" placeholder="Categorie"/></td>
																<td><input type="text" name="prixmax" value="" placeholder="PrixMax"/></td>
																<td><input type="text" name="prixmin" value="" placeholder="PrixMin"/></td>
																<td><input type="submit" value="Recherche" class="button alt"/></td>
															</form>
														</tr>
											</tbody>
										</table>
									</div>
							</section>
					</div>
			</div>
		</div>
	<?php if(isset($recherche)){ ;?>
		<div class="inner" style="min-height: 500px;">
					<div class="tabs">
						<div class="tabs tab-1 flex flex-2" style="padding: 30px;">
							<?php foreach($recherche->result_array() as $circ) { ;?>
								<div class="video col circ">
									<div>
										<img width="275" height="175" src="<?php echo img_url($circ['IMAGE'].'.jpg');?>" alt="" />
										<p> 
										<?php echo $circ['DESCRIPTION'];?>
										</p>
									</div>
									<p class="">
										<b><?php echo $circ['NOM'];?></b>
									</p>
									<a href="<?php echo base_url('single_controller/numero-plat-'.$circ['IDPLAT']);?>" class="link"><span>Voir</span></a>
								</div>
							<?php };?>
						</div>
					</div>
		</div>
	<?php } ;?>
	</section>
</div>