<div class="jumbotron pt-5 pb-3" style="background-color: #2574A9!important; border-radius: 0px;">
	<div class="container text-white">
		<h3><?php echo ucwords($name); ?></h3>
		<h4><?php echo $headline; ?></h4>
	</div>
</div>
<div class="container mb-5 pb-5">
	<div class="row">
		<div class="col-md-3 text-center">
			<img class="img-fluid" src="<?php echo base_url('z/user/').$photo; ?>" style="border-radius: 100px; max-height: 170px; min-height: 170px; max-width: 170px; min-width: 170px"></img>
			<hr>
			<div>
				<?php if (isset($website_link)){echo '<a href="https://'.$website_link.'" target="_blank"><span class="fa fa-2x fa-globe"></span></a>';} ?>
				<?php if (isset($facebook_link)){echo '<a href="https://'.$facebook_link.'" target="_blank"><span class="fa fa-2x fa-facebook"></span></a>';} ?>
				<?php if (isset($googleplus_link)){echo '<a href="https://'.$googleplus_link.'" target="_blank"><span class="fa fa-2x fa-googleplus"></span></a>';} ?>
				<?php if (isset($linkedin_link)){echo '<a href="https://'.$linkedin_link.'" target="_blank"><span class="fa fa-2x fa-linkedin"></span></a>';} ?>
				<?php if (!empty($twitter_link)){echo '<a href="https://'.$twitter_link.'" target="_blank"><span class="fa fa-2x fa-twitter"></span></a>';} ?>
				<?php if (isset($youtube_link)){echo '<a href="https://'.$youtube_link.'" target="_blank"><span class="fa fa-2x fa-youtube"></span></a>';} ?>
			</div>
		</div>
		<div class="col-md-9">
			<?php echo $bio; ?>
		</div>		
	</div>
</div>