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
					<span class=""><?php echo $v['video_title']; ?></span>
				</h4>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-6 offset-md-1">
		<h5><?php echo ucwords($v['video_title']); ?></h5>
		<small class="text-muted">
			<?php echo nl2br($v['video_description']); ?>
		</small>
		<br>
		<video height="405" width="720" controls="" autobuffer="">
			<?php $ext=pathinfo($v['video_url'],PATHINFO_EXTENSION); ?>
			<?php if($ext=='mp4'): ?>
				<source src="<?php echo base_url("z/course/".$v['video_url']); ?>" type="video/mp4">
			<?php elseif($ext=='webm'): ?>
				<source src="<?php echo base_url("z/course/".$v['video_url']); ?>" type="video/webm">
			<?php endif; ?>
		</video>
	</div>
</div>