<style type="text/css">
	.text-xs
	{
		font-size: .675rem;
	}
</style>
<div class="container mt-5" style="margin-bottom: 8rem;">
	<div class="row">
		<div class="col"></div>
		<div class="col-5">
			<div class="card">
				<?php echo form_open(base_url('signup/instructor')); ?>
					<div class="card-header bg-secondary text-white text-center">
						Sign and start your teaching career at Ekademya!
					</div>
					<div class="card-body bg-light">
						<div class="form-group">
							<label class="text-info"><span class="text-warning">*</span> fields are required</label>
						</div>
						<div class="form-group">
							<label>Email <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="email" maxlength="30" placeholder="abc@domain.com" name="email" value="<?php echo set_value('email'); ?>"></input>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<label>Password <span class="text-warning">*</span></label>
							<input class="form-control form-control-sm" type="password" maxlength="60" minlength="8" placeholder="password" name="password" value="<?php echo set_value('password'); ?>"></input>
							<?php echo form_error('password'); ?>
						</div>
						<div class="form-group">
							<label>Confirm Password <span class="text-warning">*</span> </label>
							<input class="form-control form-control-sm" type="password" maxlength="60" minlength="8" placeholder="confirm password" name="repassword" value="<?php echo set_value('repassword'); ?>"></input>
							<?php echo form_error('repassword'); ?>
						</div>

						<!-- Profile  -->
						<legend class="text-center">Profile</legend>

						<!-- Basics -->
						<p class="lead">Basics  Info:</p>
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
						<div class="form-group">
							<label>Profile Email</label>
							<input class="form-control form-control-sm" type="text" maxlength="30" name="pubemail" value="<?php echo set_value('pubemail'); ?>"></input>
							<?php echo form_error('pubemail'); ?>
							<small class="text-muted text-xs">This Email will be the one shown in your profile</small>
						</div>
						<div class="form-group">
							<label>Headline</label><small class="text-muted text-xs"> max 50 chars</small>
							<input class="form-control form-control-sm" type="text" maxlength="50" name="headline" value="<?php echo set_value('headline'); ?>"></input>
							<small class="text-muted text-xs">Add a professional headline like, 'Engineer at Google' or 'Architect.'</small>
							<br>
							<?php echo form_error('headline'); ?>
						</div>
						<div class="form-group">
							<label>Bio</label><small class="text-muted text-xs"> max 1000 chars</small>
							<textarea class="form-control form-control-sm" type="text" maxlength="1000" rows="8" name="bio" value="<?php echo set_value('bio'); ?>"></textarea>
							<small class="text-muted text-xs">Links are not allowed here but are allowed in the link section below. Instructors, your biography should have at least 50 words.</small>
							<br>
							<?php echo form_error('bio'); ?>
						</div>

						<p class="lead">Social Links :</p>
						<!-- Links -->
						<div class="form-group">
							<label><span class="fa fa-link"></span> Personal Website</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="about.me/JohnyDoe" name="website" value="<?php echo set_value('website'); ?>"></input>
							<?php echo form_error('website'); ?>
						</div>
						<div class="form-group">
							<label><span class="fa fa-facebook"></span> Facebook</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="facebook.com/JohnyDoe" name="facebook" value="<?php echo set_value('facebook'); ?>"></input>
							<?php echo form_error('facebook'); ?>
						</div>
						<div class="form-group">
							<label><span class="fa fa-google-plus"></span> Google+</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="plus.google.com/JohnyDoe" name="googleplus" value="<?php echo set_value('googleplus'); ?>"></input>
							<?php echo form_error('googleplus'); ?>
						</div>
						<div class="form-group">
							<label><span class="fa fa-linkedin"></span> Linkedin</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="linkedin.com/JohnyDoe" name="linkedin" value="<?php echo set_value('linkedin'); ?>"></input>
							<?php echo form_error('linkedin'); ?>
						</div>
						<div class="form-group">
							<label><span class="fa fa-twitter"></span> Twitter</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="twitter.com/JohnyDoe" name="twitter" value="<?php echo set_value('twitter'); ?>"></input>
							<?php echo form_error('twitter'); ?>
						</div>
						<div class="form-group">
							<label><span class="fa fa-youtube-play"></span> Youtube</label>
							<input class="form-control form-control-sm" type="text" maxlength="50" placeholder="youtube.com/JohnyDoe" name="youtube" value="<?php echo set_value('youtube'); ?>"></input>
							<?php echo form_error('youtube'); ?>
						</div>
						<button class="btn btn-primary btn-block btn-sm" type="submit">Signup</button>
						<small class="text-muted text-xs">By signing up, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a>.</small>
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