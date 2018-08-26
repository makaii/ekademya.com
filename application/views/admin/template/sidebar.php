		<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
			<h1 class="site-title"><a href="<?php echo base_url(); ?>" target="_blank"><em class="fa fa-leanpub"></em> ekademya</a></h1>
			
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
			
			<ul class="nav nav-pills flex-column sidebar-nav">
				<li class="nav-item"><a class="nav-link <?php if(!empty($dashboard_active)){echo $dashboard_active;} ?>" href="<?php echo base_url('admin'); ?>"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>
				<li class="nav-item"><a class="nav-link <?php if(!empty($courses_active)){echo $courses_active;} ?>" href="<?php echo base_url("admin/courses"); ?>"><em class="fa fa-book"></em> Courses</a></li>
				<li class="nav-item"><a class="nav-link <?php if(!empty($settings_active)){echo $settings_active;} ?>" href="<?php echo base_url('admin/settings'); ?>"><em class="fa fa-gear"></em> Settings</a></li>
			</ul>
			
			<a href="<?php echo base_url('signout'); ?>" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
		</nav>