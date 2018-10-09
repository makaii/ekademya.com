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
			<div class="card">
				<div class="card-body">
					<div class="card-title"><?php echo nl2br($c['course_project']); ?></div>
					<form>
						<div class="form-group">
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile04">
									<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
								</div>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">Button</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>