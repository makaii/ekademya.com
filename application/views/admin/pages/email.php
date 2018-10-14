<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if($page_alert=='success'): ?>
				<div role="alert" class="alert alert-success text-center font-weight-bold">Email Success</div>
			<?php elseif($page_alert=='fail'): ?>
				<div role="alert" class="alert alert-danger text-center font-weight-bold">Email Failed</div>
			<?php endif; ?>
			<form method="POST" action="<?php echo base_url("admin/email"); ?>">
				<div class="row">
					<div class="form-group col-md-6">
						<label>Reciever</label>
						<small><?php echo form_error('reciever'); ?></small>
						<input class="form-control form-control-sm" type="email" name="reciever" value="<?php echo set_value('reciever',null); ?>"></input>
					</div>
					<div class="form-group col-md-6">
						<label>Subject</label>
						<small><?php echo form_error('subject'); ?></small>
						<input class="form-control form-control-sm" type="text" name="subject"  value="<?php echo set_value('subject',null); ?>"></input>
					</div>
				</div>
				<div class="form-group">
					<small><?php echo form_error('message'); ?></small>
					<textarea class="form-control" name="message" rows="10"><?php echo set_value('message',null) ?></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-primary" type="submit">Send</button>
					<button class="btn btn-sm btn-dark" type="reset">Clear</button>
				</div>
			</form>
		</div>
	</div>
</div>