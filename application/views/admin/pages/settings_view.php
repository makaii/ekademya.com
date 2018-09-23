<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card p-3">
					<div class="card p-3">
						<?php echo form_open(base_url('admin/settings')); ?>
							<div class="form-group">
								<div>
									<legend class="col-form-label">Enable Userdata</legend>
									<div class="form-check">
										<input class="form-input-check" type="radio" id="enableUserdata" name="userdata" value="1" <?php if($this->Admin_model->display_userdata()){echo "checked";} ?>></input>
										<label class="form-check-label" for="enableUserdata">Enable</label>
									</div>
									<div class="form-check">
										<input class="form-input-check" type="radio" id="disableUserdata" name="userdata" value="0" <?php if(!$this->Admin_model->display_userdata()){echo "checked";} ?>></input>
										<label class="form-check-label" for="disableUserdata">Disabled</label>
									</div>
								</div>
								<div>
									<div class="form-group">
										<legend class="col-form-label">Enable Feedback</legend>
										<div class="form-check">
											<input class="form-input-check" type="radio" id="enableFeedback" name="feedback" value="1" <?php if($this->Admin_model->display_feedback()){echo "checked";} ?>></input>
											<label class="form-check-label" for="enableFeedback">Enable</label>
										</div>
										<div class="form-check">
											<input class="form-input-check" type="radio" id="disableFeedback" name="feedback" value="0" <?php if(!$this->Admin_model->display_feedback()){echo "checked";} ?>></input>
											<label class="form-check-label" for="disableFeedback">Disabled</label>
										</div>
									</div>
								</div>
								<div>
									<div class="form-group">
										<button class="btn btn-primary" type="submimt">save</button>
									</div>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>