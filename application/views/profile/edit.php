<div class="container">
	<div class="row mt-5">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<img src="<?php echo base_url('z/user/').$profile_photo; ?>" alt="<?php echo $profile_photo; ?>" class="img-fluid mx-auto d-block img-round-thumb" style="max-height: 150px;">
					<h6 class="text-center"><?php echo ucwords($profile_name); ?></h6>
					<div class="list-group">
						<a href="<?php echo base_url('profile/preview') ?>" target="_blank" class="list-group-item list-group-item-action">View Public Profile</a>
						<a href="<?php echo base_url('profile/account/edit'); ?>" class="list-group-item list-group-item-action">Account</a>
						<a href="<?php echo base_url('profile'); ?>" class="list-group-item list-group-item-action active">Profile</a>
						<a href="<?php echo base_url('profile/photo'); ?>" class="list-group-item list-group-item-action">Photo</a>
						<a href="<?php echo base_url('profile/delete'); ?>" class="list-group-item list-group-item-action">Danger Zone</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title text-center">Profile</h2>
					<p class="card-subtitle text-center text-muted">Add information about yourself to share on your profile.</p>
					<?php if(!empty($profile_updated)){echo $update_alert;} ?>
					<hr>
					<form method="POST" action="<?php echo base_url('profile'); ?>">
						<legend>Basics</legend>
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" name="fname" maxlength="30" value="<?php if(!empty(set_value('fname'))){echo $profile_fname;}else echo $profile_fname; ?>"></input>
							<?php echo form_error('fname'); ?>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" name="lname" maxlength="30" value="<?php echo $profile_lname; ?>"></input>
							<?php echo form_error('lname'); ?>
						</div>
						<div class="form-group">
							<label>Profile Email</label>
							<input class="form-control" name="pubemail" maxlength="30" value="<?php echo $profile_pubemail; ?>"></input>
							<?php echo form_error('pubemail'); ?>
						</div>
						<div class="form-group">
							<label>Headline</label>
							<input class="form-control" name="headline" maxlength="50" value="<?php echo $profile_headline; ?>"></input>
							<?php echo form_error('headline'); ?>
						</div>
						<div class="form-group">
							<label>Bio</label>
							<?php echo form_error('bio'); ?>
							<textarea class="form-control" name="bio" rows="7" maxlength="1000"><?php echo $profile_bio; ?></textarea>
						</div>
						<legend>Links</legend>
						<div class="form-group">
							<label>Personal Website</label>
							<input class="form-control" name="website" maxlength="50" placeholder="ex. www.yourdomain.com" value="<?php echo $profile_website;  ?>"></input>
							<?php echo form_error('website'); ?>
						</div>
						<div class="form-group">
							<label>Facebook</label>
							<input class="form-control" name="facebook" maxlength="50" placeholder="ex. www.facebook.com/yourfacebook" value="<?php echo $profile_facebook; ?>"></input>
							<?php echo form_error('facebook'); ?>
						</div>
						<div class="form-group">
							<label>Google Plus</label>
							<input class="form-control" name="googleplus" maxlength="50" placeholder="ex. www.plus.google.com/yourgplus" value="<?php echo $profile_googleplus; ?>"></input>
							<?php echo form_error('googleplus'); ?>
						</div>
						<div class="form-group">
							<label>Linkedin</label>
							<input class="form-control" name="linkedin" maxlength="50" placeholder="ex. www.linkedin.com/yourprofile" value="<?php echo $profile_linkedin; ?>"></input>
							<?php echo form_error('linkedin'); ?>
						</div>
						<div class="form-group">
							<label>Twitter</label>
							<input class="form-control" name="twitter" maxlength="50" placeholder="ex. www.twitter.com/yourtwitter" value="<?php echo $profile_twitter; ?>"></input>
							<?php echo form_error('twitter'); ?>
						</div>
						<div class="form-group">
							<label>Youtube</label>
							<input class="form-control" name="youtube" maxlength="50" placeholder="ex. www.youtube.com/yourchannel" value="<?php echo $profile_youtube; ?>"></input>
							<?php echo form_error('youtube'); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>