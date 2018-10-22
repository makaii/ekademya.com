<style>
	a{
		text-decoration: none;
		color: inherit;
	}
	a:hover{
		text-decoration: none;
		color: inherit;
	}
	#quizForm label.error {
		width: auto;
		display: inline;
		float: none;
		color: red;
		padding-left: .5em;
		vertical-align: top;
</style>
<div style="background-color: #17505D;" class="pb-3 pt-3 mb-5 mb-5">
	<div class="container text-white">
		<h4>
			<span class="text-info">
				<a href="<?php echo base_url("course/edit/outline/$course_id"); ?>"><?php echo ucwords($course['course_title']); ?></a>
			</span>
		</h4>
		<div>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview
			</a>
		</div>
	</div>
</div>
<!-- <small><pre><?php echo print_r($quiz); ?></pre></small> -->
<div class="container">
	<div class="card mr-5 ml-5">
		<div class="card-body mr-5 ml-5">
			<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/quiz/$outline_id"); ?>" id="quizForm">
				<div class="form-group">
					<label class="font-weight-bold">Quiz Title</label>
					<input class="form-control form-control-sm" type="text" name="quiz_title" value="<?php echo set_value('quiz_title',$quiz['quiz_title']); ?>"></input>
					<?php echo form_error('quiz_title'); ?>
				</div>
				<div id="questions">
					<div class="form-group">
						<small class="text-muted">(questions are randomized)</small>
					</div>
					<?php foreach($quiz['quiz_questions'] as $key => $value): ?>
						<div class="card mb-3">
							<div class="card-body">
								<!-- question -->
								<div class="form-group">
									<label class="font-weight-bold">Question <?php echo $key+1; ?></label>
									<input type="text" name="<?php echo 'question_#'.$value['question_id']; ?>" class="form-control form-control-sm" value="<?php if(!empty($value['question_title'])){echo set_value("question_#".$value['question_id'],$value['question_title']);}else echo set_value("question_#".$value['question_id'],null); ?>"></input>
									<?php echo form_error("question_#".$value['question_id']); ?>
								</div>
								<!-- /question -->
								<label><span class="font-weight-bold">Choices</span> <span class="text-muted">(first row is reserved for the correct answer, but will always be randomized for the student)</span></label>
								<!-- choices -->
								<div class="ml-5">
									<?php echo form_error('choice_#'.$value['question_choices'][0]['choice_id']); ?>
									<input name="<?php echo 'choice_#'.$value['question_choices'][0]['choice_id']; ?>" value="<?php echo set_value('',$value['question_choices'][0]['choice_text']); ?>" type="text" class="form-group form-control form-control-sm border-primary"></input>
									<?php echo form_error('choice_#'.$value['question_choices'][1]['choice_id']); ?>
									<input name="<?php echo 'choice_#'.$value['question_choices'][1]['choice_id']; ?>" value="<?php echo set_value('',$value['question_choices'][1]['choice_text']); ?>" type="text" class="form-group form-control form-control-sm"></input>
									<?php echo form_error('choice_#'.$value['question_choices'][2]['choice_id']); ?>
									<input name="<?php echo 'choice_#'.$value['question_choices'][2]['choice_id']; ?>" value="<?php echo set_value('',$value['question_choices'][2]['choice_text']); ?>" type="text" class="form-group form-control form-control-sm"></input>
									<?php echo form_error('choice_#'.$value['question_choices'][3]['choice_id']); ?>
									<input name="<?php echo 'choice_#'.$value['question_choices'][3]['choice_id']; ?>" value="<?php echo set_value('',$value['question_choices'][3]['choice_text']); ?>" type="text" class="form-group form-control form-control-sm"></input>
								</div>
								<a href="" role="button" class="btn btn-sm btn-dark float-right">remove</a>
							</div>
						</div>
						<!-- /choices -->
					<?php endforeach; ?>
					
					
				</div>
				<div class="form-group">
					<a href="<?php echo base_url("instructor/course_outline_add_new_quiz_question/$course_id/$week_id/$week_code/".$quiz['quiz_id']); ?>" role="button" class="btn btn-sm btn-block btn-dark" id="newQuestion">Add Question</a>
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-primary" type="submit">Update Quiz</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	
	$(document).ready(function(){
		// $("#newQuestion").click(function(){
		// 	$("#questions").append('<label>some label</label><input class="form-group form-control form-control-sm" type="text" name="question" value="<?php echo set_value('title',null); ?>" id="question" required>');
		// });

		// $("#quizForm").validate({
		// 	rules: {
		// 		question: "required"
		// 	},
		// 	messages:
		// 	{
		// 		question: "this is required"
		// 	}
		// });

		// $("#addQuiz").click(function(e){
		// 	e.preventDefault();	
		// 	$.ajax({
		// 		type: "AJAX",
		// 		method: "POST",
		// 		url: "<?php echo base_url("course/edit/outline/$course_id/week/$week_id/$week_code/quiz"); ?>",
		// 		success: function(){
		// 			alert("working!");
		// 		},
		// 		error: function(){
		// 			alert("error!");
		// 		}
		// 	});
		// });
		
	});
</script>