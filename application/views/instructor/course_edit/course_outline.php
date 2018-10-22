<style>
	.week
	{
		color: inherit;
		text-decoration: none;
	}
	.week:hover
	{
		color: inherit;
		text-decoration: none;
	}
	a{
		text-decoration: none;
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
</style>
<div style="background-color: #17505D;" class="pb-3 pt-3 mb-5 mb-5">
	<div class="container text-white">
		<h4>
			<span class="text-info">
				<a href="<?php echo base_url("course/edit/outline/$course_id"); ?>"><?php echo ucwords($course['course_title']); ?></a>
			</span>
		</h4>
		<div>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item"><a href="<?php echo base_url("course/edit/info/").$course['course_id']; ?>" class="nav-link">Course Info.</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/outline/").$course['course_id']; ?>" class="nav-link active">Course Outline</a></li>
						<li class="nav-item"><a href="<?php echo base_url("course/edit/media/").$course['course_id']; ?>" class="nav-link">Promotional Media</a></li>
						<?php if($course['course_review']==1): ?>
							<li class="nav-item"><a href="<?php echo base_url("course/edit/review/").$course['course_id']; ?>" class="nav-link">Course Review</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-body ml-5 mr-5">
					<div class="row">
						<div class="col-md-10 offset-md-1">
							<div class="card">
									<?php if(!empty($weeks)): ?>
										<?php foreach($weeks as $key => $w): ?>
											<div class="card" style="margin: 7px 14px 7px 14px;">
												<a class="week" href="<?php echo base_url("course/edit/outline/$course_id/week/".$w['week_code']); ?>">
													<div class="card-header bg-info text-white">Week <?php echo $key+1; ?></div>
												</a>
												<!-- lessons -->
												<?php if(!empty($outline)): ?>
													<ul class="list-group list-group-flush">
														<?php foreach($outline[$key] as $key => $outln): ?>
															<?php if($outln['outline_type']=='video'): ?>
																<li class="list-group-item">
																	<a class="outline-list" href="<?php echo base_url().'course/edit/outline/'.$course_id.'/week/'.$outln['outline_week_id'].'/'.$outln['week_code'].'/video/'.$outln['outline_id']; ?>"><?php echo ucwords($outln['video_title']); ?>&#9;
																		<i class="fas fa-video"></i>
																	</a>
																	<a href="<?php echo base_url("instructor/del_outline/$course_id/".$outln['outline_id'].'/'.$outln['outline_week_id']); ?>" class="btn btn-dark btn-sm float-right" role="button">remove</a>
																</li>
															<?php elseif($outln['outline_type']=='lecture'): ?>
																<li class="list-group-item">
																	<a class="outline-list" href="<?php echo base_url().'course/edit/outline/'.$course_id.'/week/'.$outln['outline_week_id'].'/'.$outln['week_code'].'/lecture/'.$outln['outline_id']; ?>"><?php echo ucwords($outln['lecture_title']); ?>&#9;
																		<i class="far fa-newspaper"></i>
																	</a>
																	<a href="<?php echo base_url("instructor/del_outline/$course_id/".$outln['outline_id'].'/'.$outln['outline_week_id']); ?>" class="btn btn-dark btn-sm float-right" role="button">remove</a>
																</li>
															<?php elseif($outln['outline_type']=='quiz'): ?>
																<li class="list-group-item">
																	<a class="outline-list" href="<?php echo base_url().'course/edit/outline/'.$course_id.'/week/'.$outln['outline_week_id'].'/'.$outln['week_code'].'/quiz/'.$outln['outline_id']; ?>">Quiz&#9;
																		<i class="far fa-question-circle"></i>
																	</a>
																	<a href="<?php echo base_url("instructor/del_outline/$course_id/".$outln['outline_id'].'/'.$outln['outline_week_id']); ?>" class="btn btn-dark btn-sm float-right" role="button">remove</a>
																</li>
															<?php endif; ?>
														<?php endforeach; ?>
													</ul>
												<?php else: ?>
													<div class="card-body">
														<h5 class="text-center">This Week has no lessons yet.</h5>
													</div>
												<?php endif; ?>
												<div class="card-footer bg-dark">
													<a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/week/".$w['week_id']."/".$w['week_code']."/video"); ?>">Add Video</a>
													<a rolse="button" class="btn btn-sm btn-info" href="<?php echo base_url("course/edit/outline/$course_id/week/".$w['week_id']."/".$w['week_code']."/lecture"); ?>">Add Lecture</a>
													<button id="week-<?php echo $w['week_id']; ?>" onclick="showDelWeek(<?php echo $w['week_id']; ?>)" type="button" class="btn btn-sm btn-danger float-right">delete week</button>
													<div id="opts-<?php echo $w['week_id']; ?>" class="float-right" style="display: none;">
														<a id="yes-week-<?php echo $w['week_id']; ?>" role="button" class="btn btn-sm btn-danger" href="<?php echo base_url("instructor/del_week/$course_id/".$w['week_id']); ?>">Yes</a>
														<button id="no-week-<?php echo $w['week_id']; ?>" onclick="hideDelWeek(<?php echo $w['week_id']; ?>)" type="button" class="btn btn-sm btn-secondary">No</button>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									<?php else: ?>
										<div class="card-body">
											<h5>Oops, it looks like your course doesn't have any content at the moment, try adding weeks then upload your lessons.</h5>
										</div>
									<?php endif; ?>
								<div class="card-footer">
									<a href="<?php echo base_url("course/edit/outline/$course_id/new_week"); ?>" role="button" class="btn btn-block btn-primary">Add Week</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// del week
	// function delWeek(week_id)
	// {
	// 	$.ajax({
	// 		type: "ajax",
	// 		method: "UPDATE",
	// 		url: "<?php echo base_url('instructor/del_week/'); ?>"+week_id,
	// 		async: false,
	// 		dataType: "json",
	// 		success: function(){
	// 			showWeeks();
	// 		},
	// 		error: function(){
	// 			alert('Could not update Data in Database!');
	// 		}
	// 	});
	// }
</script>
<script>
	$(document).ready(function(){

		// showWeeks();

		// post new week
		// $("#new-week").click(function(event){
		// 	event.preventDefault();
		// 	$.ajax({
		// 		type: "ajax",
		// 		method: "POST",
		// 		url: "<?php echo base_url('instructor/add_new_week'); ?>",
		// 		data: {
		// 			week_course_id: <?php echo $course_id; ?>,
		// 		},
		// 		success: function(response){
		// 			showWeeks();
		// 		},
		// 		error: function(){
		// 			alert("Adding new week error!");
		// 		}
		// 	});
		// });

		// get weeks
		// function showWeeks(){
		// 	$.ajax({
		// 		type: "ajax",
		// 		url: "<?php echo base_url("instructor/get_weeks/$course_id"); ?>",
		// 		async: false,
		// 		dataType: "json",
		// 		success: function(data){
		// 			var html = '';
		// 			var week_num = 1;
		// 			for(i=0; i<data.length; i++){
		// 				html +='<tr>'+
		// 					'<div class="card" style="margin: 7px 14px 7px 14px;">'+
		// 						'<div class="card-header bg-info text-white">Week '+week_num+'</div>'+
		// 						'<ul class="list-group list-group-flush">'+
		// 							'<li class="list-group-item">Lecture <button class="btn btn-sm btn-dark float-right">remove</button></li>'+
		// 							'<li class="list-group-item">Video <button class="btn btn-sm btn-dark float-right">remove</button></li>'+
		// 						'</ul>'+
		// 						'<div class="card-footer bg-dark">'+
		// 							'<button class="btn btn-sm btn-info">Add Video</button>'+
		// 							'<button class="btn btn-sm btn-info">Add Lecture</button>'+
		// 							'<button onclick="delWeek('+data[i].week_id+')" class="btn btn-sm btn-danger float-right">delete</button>'+
		// 						'</div>'+
		// 					'</div>';
		// 					week_num++;
		// 			}
		// 			$("#weeks").html(html);
		// 		},
		// 		error: function(){
		// 			alert('Could not get Data from Database!');
		// 		}
		// 	});
		// }
		
	});
</script>