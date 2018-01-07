<div class="jumbotron pb-5" style="background-color: #2574A9!important; border-radius: 0px;">
	<div class="container text-white">
		<h3><?php echo $name; ?></h3>
		<h4><?php echo $headline; ?></h4>
	</div>
</div>
<div class="container mb-5 pb-5">
	<div class="row">
		<div class="col text-center">
			<img class="img-fluid" src="<?php echo base_url('z/instructor/').$instructor_img_url; ?>" style="border-radius: 100px; max-height: 170px; min-height: 170px; max-width: 170px; min-width: 170px"></img>
		</div>
		<div class="col-9">
			<?php echo $bio; ?>
		</div>		
	</div>
</div>