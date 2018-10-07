<div class="container">
	<div class="row mt-5">
		<div class="col-md-7">
			<h3><?php echo $course['course_title']; ?></h3>
			<a target="_blank" href="<?php echo base_url("course/edit/preview/$course_id"); ?>">course preview</a>
			<br>
			<a class="text-secondary" href="<?php echo base_url("course/edit/outline/$course_id"); ?>">go back to outline</a>
		</div>
		<div class="col-md-5">
			<?php if(!empty($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12">
			
		</div>
	</div>
</div>
<div class="container">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url("course/edit/outline/$course_id/quiz"); ?>">
				<div class="form-group">
					<label>Title</label>
					<input class="form-control" type="text" name="title" value="<?php if(!empty($quiz['quiz_title'])){echo set_value('title',null);}else echo set_value('title',$q['quiz_title']); ?>">
					<?php echo form_error('title') ?>
				</div>
				<div class="form-group">
					<label>Instructions</label>
					<textarea class="form-control" type="text" name="instruction"><?php if(!empty($quiz['quiz_instruction'])){echo set_value('instruction',null);}else echo set_value('instruction',$q['quiz_instruction']); ?></textarea>
					<?php echo form_error('instruction') ?>
				</div>
				<div id="answers">
					<?php if(!empty($c['quiz_questions'])): ?>
						<div class="card mb-3" id="<?php  ?>">
							<div class="card-body">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Question <?php  ?></span>
									</div>
									<input type="text" class="form-control">
								</div>
								<div class="form-row mb-3">
									<div class="input-group input-group-sm col">
										<div class="input-group-prepend">
											<span class="input-group-text">Answer 1</span>
										</div>
										<input type="text" class="form-control">
									</div>
									<div class="input-group input-group-sm col">
										<div class="input-group-prepend">
											<span class="input-group-text">Answer 2</span>
										</div>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="input-group input-group-sm col">
										<div class="input-group-prepend">
											<span class="input-group-text">Answer 3</span>
										</div>
										<input type="text" class="form-control">
									</div>
									<div class="input-group input-group-sm col">
										<div class="input-group-prepend">
											<span class="input-group-text">Answer 4</span>
										</div>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-block btn-dark" type="button" id="addNewItem">add new item</button>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">add quiz</button>
					<button class="btn btn-info" type="button">save</button>
					<button class="btn btn-secondary" type="reset">clear</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var itemCount = <?php echo 1; ?>;
	$(document).ready(function(){
	    $("#addNewItem").click(function(){
	        $("#answers").append('\
	        	<div class="card mb-3" id="q'+itemCount+'">\
	        		<div class="card-body">\
	        			<div class="input-group mb-3">\
	        				<div class="input-group-prepend">\
	        					<span class="input-group-text">Question '+itemCount+'</span>\
	        				</div>\
	        				<input type="text" class="form-control">\
	        			</div>\
	        			<div class="form-row mb-3">\
	        				<div class="input-group input-group-sm col">\
	        					<div class="input-group-prepend">\
	        						<span class="input-group-text">Answer 1</span>\
	        					</div>\
	        					<input type="text" class="form-control is-valid">\
	        				</div>\
	        				<div class="input-group input-group-sm col">\
	        					<div class="input-group-prepend">\
	        						<span class="input-group-text">Answer 2</span>\
	        					</div>\
	        					<input type="text" class="form-control">\
	        				</div>\
	        			</div>\
	        			<div class="form-row">\
	        				<div class="input-group input-group-sm col">\
	        					<div class="input-group-prepend">\
	        						<span class="input-group-text">Answer 3</span>\
	        					</div>\
	        					<input type="text" class="form-control">\
	        				</div>\
	        				<div class="input-group input-group-sm col">\
	        					<div class="input-group-prepend">\
	        						<span class="input-group-text">Answer 4</span>\
	        					</div>\
	        					<input type="text" class="form-control">\
	        				</div>\
	        			</div>\
	        		</div>\
	        	</div>\
	        	');
	    });
	});


	// function newItem()
	// {
	// 	// card
	// 	var newQuestionDiv = document.createElement("div");
	// 		newQuestionDiv.setAttribute("class", "card mb-3");
	// 		newQuestionDiv.setAttribute("id", "new id");

	// 	// card body
	// 	var newQuestionBody = document.createElement("div");
	// 		newQuestionBody.setAttribute("class", "card-body");

	// 	// form row
	// 	var newquestionRow = document.createElement("div");
	// 		newquestionRow.setAttribute("form-row mb-3");

	// 	newQuestionBody.appendChild(newquestionRow);
	// 	newQuestionDiv.appendChild(newQuestionBody);
	// 	document.getElementById("answers").appendChild(newQuestionDiv);
	// }
</script>