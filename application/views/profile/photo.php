<div class="container">
	<div class="row mt-5">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<img src="<?php echo base_url('z/user/').$profile_photo; ?>" alt="<?php echo $profile_photo; ?>" class="img-fluid mx-auto d-block img-round-thumb">
					<h6 class="text-center"><?php echo ucwords($profile_name); ?></h6>
					<div class="list-group">
						<a href="<?php echo base_url('profile/preview') ?>" target="_blank" class="list-group-item list-group-item-action">View Public Profile</a>
						<a href="<?php echo base_url('profile/account/edit'); ?>" class="list-group-item list-group-item-action">Account</a>
						<a href="<?php echo base_url('profile'); ?>" class="list-group-item list-group-item-action">Profile</a>
						<a href="<?php echo base_url('profile/photo'); ?>" class="list-group-item list-group-item-action active">Photo</a>
						<a href="<?php echo base_url('profile/delete'); ?>" class="list-group-item list-group-item-action">Danger Zone</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title text-center">Photo</h2>
					<p class="card-subtitle text-center text-muted">Add a nice photo of yourself for your profile.</p>
					<?php if(!empty($photo_updated)){echo $update_alert;} ?>
					<hr>
					<?php echo form_open_multipart(base_url('profile/photo/upload'));?>
						<div class="form-group">
							<img src="<?php echo base_url('z/user/').$profile_photo; ?>" class="img-fluid mx-auto d-block img-round" alt="<?php echo $profile_photo; ?>" style="height: 250px; width: 250px;">
							<br>
							<br>
							<?php if(!empty($error)): ?>
								<?php echo '<small class="text-danger">'.$error."</small>";?>
							<?php endif; ?>
							<input type="file" name="photo">
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