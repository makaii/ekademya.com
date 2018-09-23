<div class="container mt-5" style="margin-bottom: 8rem;">
	<div class="row">
		<div class="col"></div>
		<div class="col-4">
			<div class="card">
				<?php echo form_open(base_url('signin')); ?>
					<div class="card-header bg-secondary text-white text-center">
						Sign in to your Ekademya Account!
					</div>
					<div class="card-body bg-light">
						<div class="form-group">
							<label>Email</label>
							<input class="form-control form-control-sm" type="email" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>" autofocus></input>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control form-control-sm" type="password" name="password" value="<?php echo set_value('password'); ?>"></input>
							<?php echo form_error('password'); ?>
							<small class="text-danger">
			                	<?php echo $this->session->flashdata('error'); ?>
			                </small>
						</div>
						<button class="btn btn-outline-primary btn-block" type="submit">Signin</button>
					</div>
					<div class="card-footer text-center">
						<small>Need an account? <strong><a href="<?php echo base_url('signup'); ?>">Create one here</a></strong></small>
						<br>
						<a href="<?php echo base_url(); ?>"><small class="font-weight-light">forgot password?</small></a>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>