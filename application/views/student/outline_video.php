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
							<?php echo ucwords($c['course_title']); ?>
						</a>
					</span>
					<span> / </span>
					<span class=""><?php echo ucwords($v['video_title']); ?></span>
				</h4>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-10 offset-md-1">
		<h5><?php echo ucwords($v['video_title']); ?></h5>
		<div class="embed-responsive embed-responsive-16by9">
			<video class="embed-responsive-item" height="405" width="720" controls="" controlsList="nodownload" autobuffer="" id="video_<?php echo $v['video_id']; ?>">
				<?php $ext=pathinfo($v['video_url'],PATHINFO_EXTENSION); ?>
				<?php if($ext=='mp4'): ?>
					<source src="<?php echo base_url('z/course/'.$v['video_url']); ?>" type="video/mp4">
				<?php elseif($ext=='webm'): ?>
					<source src="<?php echo base_url('z/course/'.$v['video_url']); ?>" type="video/webm">
				<?php endif; ?>
			</video>
		</div>
		<br>
		<small class="text-muted">
			<?php echo nl2br($v['video_description']); ?>
		</small>
		
		<a href="<?php echo base_url("mycourse/$course_id/$type/$next_outline_id"); ?>" class="btn btn-block btn-primary float-right c2 font-weight-bold mt-2" style="display: none; border: none;" id="nextLesson" role="button">Next</a>
	</div>
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	// 	$("#video_<?php echo $v['video_id']; ?>").bind("ended", function() {
	// 		$("#video_<?php echo $v['video_id']; ?>").append('<button class="float-right btn">Next</button>');
	// 		// console.log("hello");
	// 	});
	// });

	// prevent right click save
	$(document).ready(function(){
	   $("#video_<?php echo $v['video_id']; ?>").bind('contextmenu',function() { return false; });
	});

	// show next button after video plays
	document.getElementById("video_<?php echo $v['video_id']; ?>").addEventListener('ended',myHandler,false);
	    function myHandler(e) {
	        if(!e) { e = window.event; }
	        document.getElementById("nextLesson").style.display = "block";
	    }
</script>