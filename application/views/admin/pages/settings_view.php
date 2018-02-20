<script>
	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
	};
</script>

<div class="container-fluid" id="wrapper">
	<div class="row">
		<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
			<h1 class="site-title"><a href="<?php echo base_url(); ?>" target="_blank"><em class="fa fa-leanpub"></em> ekademya</a></h1>
			
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
			
			<ul class="nav nav-pills flex-column sidebar-nav">
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin'); ?>"><em class="fa fa-dashboard"></em> Dashboard</a></li>
				<li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-calendar-o"></em> Widgets</a></li>
				<li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-bar-chart"></em> Charts</a></li>
				<li class="nav-item"><a class="nav-link" href="elements.html"><em class="fa fa-hand-o-up"></em> UI Elements</a></li>
				<li class="nav-item"><a class="nav-link" href="cards.html"><em class="fa fa-clone"></em> Cards</a></li>
				<li class="nav-item"><a class="nav-link active" href="<?php echo base_url('admin/settings'); ?>"><em class="fa fa-gear"></em> Settings <span class="sr-only">(current)</span></a></li>
			</ul>
			
			<a href="<?php echo base_url('signout'); ?>" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
		</nav>
		
		<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
			<header class="page-header row justify-center">
				<div class="col-md-6 col-lg-8" >
					<h1 class="float-left text-center text-md-left">Settings</h1>
				</div>
				
				<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="<?php echo base_url('assets/admin/img/profile-pic.jpg'); ?>" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
					
					<div class="username mt-1">
						<h6 class="mb-1"><?php echo $admin_email; ?></h6>
						
						<h6 class="text-muted"><?php echo $admin_type; ?></h6>
					</div>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
					     <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferences</a>
					     <a class="dropdown-item" href="<?php echo base_url('signout'); ?>"><em class="fa fa-power-off mr-1"></em> Signout</a></div>
				</div>
				
				<div class="clear"></div>
			</header>
			
			<section class="row">
				<div class="col-sm-12">
					<section class="row">
						<div class="col-md-12">
							<div class="card p-3">
								<div class="card p-3">
									<?php echo form_open(base_url('admin/settings')); ?>
										<div class="form-group">
											<section>
												<legend class="col-form-label">Enable Userdata</legend>
												<div class="form-check">
													<input class="form-input-check" type="radio" id="enableUserdata" name="userdata" value="1" <?php if($this->Admin_model->display_userdata()){echo "checked";} ?>></input>
													<label class="form-check-label" for="enableUserdata">Enable</label>
												</div>
												<div class="form-check">
													<input class="form-input-check" type="radio" id="disableUserdata" name="userdata" value="0" <?php if(!$this->Admin_model->display_userdata()){echo "checked";} ?>></input>
													<label class="form-check-label" for="disableUserdata">Disabled</label>
												</div>
											</section>
											<section>
												<div class="form-group">
													<legend class="col-form-label">Enable Feedback</legend>
													<div class="form-check">
														<input class="form-input-check" type="radio" id="enableFeedback" name="feedback" value="1" <?php if($this->Admin_model->display_feedback()){echo "checked";} ?>></input>
														<label class="form-check-label" for="enableFeedback">Enable</label>
													</div>
													<div class="form-check">
														<input class="form-input-check" type="radio" id="disableFeedback" name="feedback" value="0" <?php if(!$this->Admin_model->display_feedback()){echo "checked";} ?>></input>
														<label class="form-check-label" for="disableFeedback">Disabled</label>
													</div>
												</div>
											</section>
											<section>
												<div class="form-group">
													<button class="btn btn-primary" type="submimt">save</button>
												</div>
											</section>
										</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</section>
					<section class="row">
						<div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div>
					</section>
				</div>
			</section>
		</main>
	</div>
</div>