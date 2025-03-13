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
							<?php foreach($detail->result_array() as $dt) { ;?>
								<h2>Detail de la commande</h2>
								<h3>Heure Validation:<?php echo $dt['HVALIDER'];?></h3>
								<h3>Heure fin preparation:<?php echo $dt['HPRET'];?></h3>
								<h3>Heure recuperer:<?php echo $dt['HRECUPERER'];?></h3>
								<h3>Heure fin livrer:<?php echo $dt['HLIVRER'];?></h3>
								<?php $date_livrer=date_create($dt['HRECUPERER']);
									  $date_valider=date_create($dt['HVALIDER']);
									
								?>
								<h3>Durree total de livraison:<?php echo date_diff($date_livrer,$date_valider)->format('%h h %i min %s s');?></h3>
								<?php };?>
					</div>
			</div>
		</div>
	</section>

</div>