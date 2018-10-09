<style>
	a{
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div style="background-color: #E4F1FE;" class="pb-3 pt-3 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>
					<span class="text-info">
						<a href="<?php echo base_url("mycourse/$course_id"); ?>">
							<?php echo $c['course_title']; ?>
						</a>
					</span>
					<span> / </span>
					<span class="">Final Project</span>
				</h4>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div>
				<?php if($page_alert=='post'): ?>
					<div role="alert" class="alert alert-success text-center font-weight-bold">Upload Success</div>
				<?php elseif($page_alert=='update'): ?>
					<div role="alert" class="alert alert-success text-center font-weight-bold">Update Success</div>
				<?php endif; ?>
			</div>
			<?php if(!empty($project)): ?>
				<div class="card mb-3 border-success">
					<div class="card-body text-center">
						<?php $date=date_create($project['project_date']); ?>
						<h5 class="card-text">You have Submitted on <?php echo date_format($date,"M-d-Y h:i A"); ?></h5>
					</div>
				</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-body">
					<div class="card-title"><?php echo nl2br($c['course_project']); ?></div>
					<form action="<?php echo base_url("mycourse/$course_id/project/validate"); ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="form-group">
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile04" name="project_file">
									<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
								</div>
								<div class="input-group-append">
									<button class="btn btn-outline-info" type="submit">Upload</button>
								</div>
							</div>
						</div>
						<div class="form-group">
							<small class="form-text text-danger">
								<?php if(!empty($upload_error)){echo $upload_error;} ?>
							</small>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// sticky video file
	$('.custom-file-input').on('change', function() { 
	   let fileName = $(this).val().split('\\').pop(); 
	   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>