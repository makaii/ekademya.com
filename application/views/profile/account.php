<div class="container">
	<div class="row mt-5">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<img src="<?php echo base_url('z/user/').$profile_photo; ?>" alt="<?php echo $profile_photo; ?>" class="img-fluid mx-auto d-block" style="max-height: 150px;">
					<h6 class="text-center"><?php echo ucwords($profile_name); ?></h6>
					<div class="list-group">
						<a href="<?php echo base_url('profile/preview') ?>" target="_blank" class="list-group-item list-group-item-action">View Public Profile</a>
						<a href="<?php echo base_url('profile/account/edit'); ?>" class="list-group-item list-group-item-action active">Account</a>
						<a href="<?php echo base_url('profile'); ?>" class="list-group-item list-group-item-action">Profile</a>
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
					<?php if(!empty($password_updated)){echo $update_alert;} ?>
					<hr>
					<form action="<?php echo base_url('profile/account/edit'); ?>" method="POST">
						<legend>Account</legend>
						<div class="form-group">
							<label>Email Address</label>
							<input readonly class="text-primary form-control-plaintext" value="<?php echo $profile_email; ?>"></input>
						</div>
						<div class="form-group">
							<label>Current Password</label>
							<input type="password" name="currentpassword" class="form-control" maxlength="60" value="<?php echo set_value('currentpassword'); ?>"></input>
							<?php echo form_error('currentpassword'); ?>
						</div>
						<div class="form-group">
							<label>New Password</label>
							<input type="password" name="newpassword" class="form-control" maxlength="60" value="<?php echo set_value('newpassword'); ?>"></input>
							<?php echo form_error('newpassword'); ?>
						</div>
						<div class="form-group">
							<label>Confirm New Password</label>
							<input type="password" name="renewpassword" class="form-control" maxlength="60" value="<?php echo set_value('renewpassword'); ?>"></input>
							<?php echo form_error('renewpassword'); ?>
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