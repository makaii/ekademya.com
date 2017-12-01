<div class="container">
	<div class="row">
		<div class="col"></div>
		<div class="col-4">
			<div class="card">
				<?php echo form_open(base_url('signup')); ?>
					<div class="card-header bg-secondary text-white text-center">
						Sign up for free and start learning!
					</div>
					<div class="card-body bg-light">
						<div class="form-group">
							<label>Email</label>
							<input class="form-control form-control-sm" type="email" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>"></input>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control form-control-sm" type="password" placeholder="password" name="password" value="<?php echo set_value('password'); ?>"></input>
							<?php echo form_error('password'); ?>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control form-control-sm" type="password" placeholder="confirm password" name="repassword" value="<?php echo set_value('repassword'); ?>"></input>
							<?php echo form_error('repassword'); ?>
						</div>
						<button class="btn btn-primary btn-block btn-sm" type="submit">Signup</button>
						<small class="text-muted" style="font-size: .675rem;">By signing up, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a>.</small>
					</div>
					<div class="card-footer text-center">
						<small>Already have an Acoount? <strong><a href="<?php echo base_url('signin'); ?>">Signin</a></strong></small>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>