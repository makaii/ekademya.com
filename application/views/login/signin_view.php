<div class="container" style="margin-top: 5rem;margin-bottom: 8rem;">
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
							<input class="form-control form-control-sm" type="email" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>"></input>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<label>Password <a href="<?php echo base_url(); ?>"><small class="font-weight-light">(forgot password?)</small></a></label>
							<input class="form-control form-control-sm" type="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="password" value="<?php echo set_value('password'); ?>"></input>
							<?php echo form_error('password'); ?>
							<small class="text-danger">
			                	<?php echo $this->session->flashdata('error'); ?>
			                </small>
						</div>
						<!-- <div class="form-check">
							<label class="form-check-label text-muted">
							<input type="checkbox" class="form-check-input"><small>remember me</small></label>
						</div> -->
						<button class="btn btn-outline-primary btn-block" type="submit">Signin</button>
						<!-- <button class="btn btn-link btn-block" type="reset">or Forgot Password</button> -->
					</div>
					<div class="card-footer text-center">
						<small>Need an account? <strong><a href="<?php echo base_url('signup'); ?>">Create one here</a></strong></small>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>