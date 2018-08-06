<div class="container">
	<div class="row" style="margin-top: 7.5rem;">
		<div class="col-md-4 offset-md-4">
			<h4 class="text-center">Ekademya Admin</h4>
			<div class="card p-3">
				<div class="card-body">
					<?php echo form_open(base_url('admin/signin')); ?>
						<div class="form-group">
							<label>Email :</label>
							<input type="text" class="form-control" name="adminEmail" value="<?php echo set_value('adminEmail'); ?>"></input>
							<?php echo form_error('adminEmail'); ?>
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input type="password" class="form-control" name="adminPassword" maxlength="60" value="<?php echo set_value('adminPassword'); ?>"></input>
							<?php echo form_error('adminPassword'); ?>
							<small class="text-danger"><?php echo $this->session->flashdata('error'); ?></small>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-success">Sigin</button>
						</div>
					<?php echo form_close(); ?>
				</div>
				<div class="card-footer pb-0 text-center">
					<p>Return to <a target="_blank" href="<?php echo base_url(); ?>">Ekademya</a></p>
				</div>
			</div>
		</div>
	</div>
</div>