<div class="container mt-5" style="margin-bottom: 8rem;">
	<div class="row">
		<div class="col"></div>
		<div class="col-5">
			<div class="card">
				<?php echo form_open(base_url('signup')); ?>
					<div class="card-header bg-secondary text-white text-center">
						<h4 class="font-weight-light">Student Form</h4>
					</div>
					<div class="card-body bg-light">
						<div class="form-group">
							<label class="text-info"><span class="text-warning">*</span> fields are required</label>
						</div>
						<div class="form-group">
							<label>Email <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="email" maxlength="50" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>"></input>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<label>Password <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="password" maxlength="60" minlength="8" placeholder="password" name="password" value="<?php echo set_value('password'); ?>"></input>
							<?php echo form_error('password'); ?>
						</div>
						<div class="form-group">
							<label>Confirm Password <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="password" maxlength="60" minlength="8" placeholder="confirm password" name="repassword" value="<?php echo set_value('repassword'); ?>"></input>
							<?php echo form_error('repassword'); ?>
						</div>
						<div class="form-group">
							<label>First Name <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="text" maxlength="30" name="fname" value="<?php echo set_value('fname'); ?>"></input>
							<?php echo form_error('fname'); ?>
						</div>
						<div class="form-group">
							<label>Last Name <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="text" maxlength="30" name="lname" value="<?php echo set_value('lname'); ?>"></input>
							<?php echo form_error('lname'); ?>
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