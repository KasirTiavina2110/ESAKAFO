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
														<th>Restaurant</th>
														<th>MontantTotal</th>
												</tr>
											</thead>
											<tbody>
											<?php for($i=0; $i<count($restaurant); $i++) { ?>
													<tr>
														<form action="<?php echo base_url('export_controller/toPdf') ;?>" method="post">
															<?php for($a=0; $a<count($restaurant[$i]); $a++) { ?>
																			<td><input name="<?php echo 'a'.$a;?>" type="text" value="<?php echo $restaurant[$i][$a] ;?>"/></td>
															<?php };?>
													</tr>
											<?php };?>
															<td><input type="submit" value="EXPORT PDF" class="button alt"/></td>
														</form>
															<form action="<?php echo base_url('export_controller/toCsv') ;?>" method="post">
																<input name="nomtable" value="Chiffreaffaire" hidden/>
																<td><input type="submit" value="EXPORT CSV" class="button alt"/></td>
															</form>
													
											</tbody>
										</table>
									</div>
							</section>
					</div>
			</div>
		</div>
	</section>

</div>