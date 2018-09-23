<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if(!empty($page_title)){echo $page_title;} ?></title>
	<link rel="icon" type="image/ico" href="<?php echo base_url('assets/admin/img/favicon/favicon.ico'); ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">

	<div class="container">
		<div class="row" style="margin-top: 7.5rem;">
			<div class="col-md-4 offset-md-4">
				<h4 class="text-center">Ekademya Admin</h4>
				<div class="card p-3">
					<div class="card-body">
						<?php echo form_open(base_url('admin/signin')); ?>
							<div class="form-group">
								<label>Email :</label>
								<input type="text" class="form-control" name="adminEmail" value="<?php echo set_value('adminEmail',null); ?>"></input>
								<?php echo form_error('adminEmail'); ?>
							</div>
							<div class="form-group">
								<label>Password :</label>
								<input type="password" class="form-control" name="adminPassword" maxlength="60" value="<?php echo set_value('adminPassword',null); ?>"></input>
								<?php echo form_error('adminPassword'); ?>
								<small class="text-danger"><?php echo $this->session->flashdata('error'); ?></small>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-success">Sigin</button>
							</div>
						<?php echo form_close(); ?>
					</div>
					<div class="card-footer pb-0 text-center">
						<p>Return to <a target="_blank" href="<?php echo base_url(); ?>">Ekademya</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>