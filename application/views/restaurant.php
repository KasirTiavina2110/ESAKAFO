<style type="text/css">
	
	.pagination {
		margin: 0 auto;
		width: 40%;
		// margin-left: 30%;
		// margin-right: 30%;
	}
	
	.pagination ul {
		display: inline-block;
		list-style-type:none;
		color:  rgb(2, 11, 19);
		// margin-left: 30%;
	}
	
	.pagination ul li {
		display: inline;
		margin-left:2px;
		float:left;
	}

	.pagination ul li a {
		color: black;
		float: left;
		padding: 8px 16px;
		border-radius: 5px;
		// border: 2px solid rgb(20, 34, 19);
		border: 1px solid #999; /* Gray */
		text-decoration: none;
    }
	
	.pagination ul li a.active {
		background-color: rgb(2, 11, 19);
		// color: white;
	}

	.pagination ul li a:hover:not(.active) {background-color: #999;}
	
	img {
		float: left;
		margin-top: 30px;
		margin-left: 20px;
		margin-right: 20px;
		// margin-bottom: 20px;
	}
	
	circ:hover {
		background-color: white;
	}
	
	p {
		padding: 20px;
		color: white;
		text-align: justify;
		font-size: 18px;
	}
	
</style>
<div id="main">
		<!-- Two -->
	<section class="wrapper style1">
		<div class="inner" style="min-height: 500px;">
			<!-- Tabbed Video Section -->
				<div class="flex flex-tabs">
					<h2>Liste des restaurants</h2>
					<div class="tabs">
						<div class="tabs tab-1 flex flex-2" style="padding: 30px;">
							<?php foreach($restaurant->result_array() as $circ) { ;?>
								<div class="video col circ">
									<div>
										<img width="275" height="175" src="<?php echo img_url($circ['IMAGE'].'.jpg');?>" alt="" />
							
									</div>
									<p class="">
										<b><?php echo $circ['NOM'];?></b>
									</p>
									<a href="<?php echo base_url('plat_controller/restaurant-'.$circ['NOM'].'-'.$circ['IDRESTAURANT']);?>" class="link"><span>Voir</span></a>
								</div>
							<?php };?>
						</div>
					</div>
				</div>
		</div>
	</section>

</div>