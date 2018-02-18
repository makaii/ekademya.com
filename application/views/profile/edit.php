<div class="container">
	<div class="row mt-5">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<img src="<?php echo base_url('z/instructor/').$profile_photo; ?>" alt="<?php echo $profile_photo; ?>" class="img-fluid mx-auto d-block" style="max-height: 150px;">
					<h6 class="text-center"><?php echo ucwords($this->session->userdata('user_name')); ?></h6>
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
					<hr>
					<form>
						<legend>Basics</legend>
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" maxlength="25" value="<?php echo $profile_fname; ?>"></input>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" maxlength="25" value="<?php echo $profile_lname; ?>"></input>
						</div>
						<div class="form-group">
							<label>Profile Email</label>
							<input class="form-control" maxlength="30" value="<?php echo $profile_pubemail; ?>"></input>
						</div>
						<div class="form-group">
							<label>Headline</label>
							<input class="form-control" maxlength="50" value="<?php echo $profile_headline; ?>"></input>
						</div>
						<div class="form-group">
							<label>Bio</label>
							<textarea class="form-control" rows="7" maxlength="1000"><?php echo $profile_bio; ?></textarea>
						</div>
						<legend>Links</legend>
						<div class="form-group">
							<label>Personal Website</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.yourdomain.com" value="<?php echo $profile_website;  ?>"></input>
						</div>
						<div class="form-group">
							<label>Facebook</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.facebook.com/yourfacebook" value="<?php echo $profile_facebook; ?>"></input>
						</div>
						<div class="form-group">
							<label>Google Plus</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.plus.google.com/yourgplus" value="<?php echo $profile_googleplus; ?>"></input>
						</div>
						<div class="form-group">
							<label>Linkedin</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.linkedin.com/yourprofile" value="<?php echo $profile_linkedin; ?>"></input>
						</div>
						<div class="form-group">
							<label>Twitter</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.twitter.com/yourtwitter" value="<?php echo $profile_twitter; ?>"></input>
						</div>
						<div class="form-group">
							<label>Youtube</label>
							<input class="form-control" maxlength="50" placeholder="ex. https://www.youtube.com/yourchannel" value="<?php echo $profile_youtube; ?>"></input>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>