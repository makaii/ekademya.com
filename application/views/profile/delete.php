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
						<a href="<?php echo base_url('profile'); ?>" class="list-group-item list-group-item-action">Profile</a>
						<a href="<?php echo base_url('profile/photo'); ?>" class="list-group-item list-group-item-action">Photo</a>
						<a href="<?php echo base_url('profile/delete'); ?>" class="list-group-item list-group-item-action list-group-item-danger">Danger Zone</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card border-danger ">
				<div class="card-body">
					<h2 class="card-title text-center text-danger">Danger Zone</h2>
					<p class="card-subtitle text-center text-danger text-muted">Warning: If you delete your account, you will be unsubcribed to all of your courses and will lose access.</p>
					<hr>
					<form>
						<div class="form-group text-center">
							<button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#DELETEaccount">Delete my Account</button>
						</div>
						<div class="modal fade" id="DELETEaccount" tabindex="-1" role="dialog" aria-labelledby="DeleteAccountModelLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title text-danger" id="DeleteAccountModelLabel">Delete Account</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">Are you sure you want to delete your account?</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete my account</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>