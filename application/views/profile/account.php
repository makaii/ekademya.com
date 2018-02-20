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
					<hr>
					<form>
						<legend>Account</legend>
						<div class="form-group">
							<label>Email Address</label>
							<input readonly class="text-primary form-control-plaintext" maxlength="25" value="<?php echo $profile_email; ?>"></input>
						</div>
						<div class="form-group">
							<label>Current Password</label>
							<input type="password" class="form-control" maxlength="25" value="<?php ?>"></input>
						</div>
						<div class="form-group">
							<label>New Password</label>
							<input type="password" class="form-control" maxlength="25" value="<?php ?>"></input>
						</div>
						<div class="form-group">
							<label>Current Password</label>
							<input type="password" class="form-control" maxlength="25" value="<?php ?>"></input>
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