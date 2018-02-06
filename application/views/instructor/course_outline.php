<style type="text/css">
	.list-group-item.active{
		background-color: #36D7B7 !important;
		border-color: transparent !important;
		color: white !important;
	}
</style>
<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-md-2">
			<img class="rounded img-thumbnail" src="https://www.udemy.com/staticx/udemy/images/course/200_H/placeholder.png">
		</div>
		<div class="col-md-8">
			<h3 class="font-weight-light"><?php echo $course_title; ?></h3>
			<p class="font-weight-light"><?php echo $course_author; ?></p>
			<?php if (isset($page_alert)){echo $page_alert;} ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row mt-4 mb-4">
		<div class="col-md-2">
			<div class="list-group">
				<a href="<?php echo base_url('course/manage/goals/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">1</span> Goals</a>
				<a href="<?php echo base_url('course/manage/landing_page/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action"><span class="badge badge-dark">2</span> Landing Page</a>
				<a href="<?php echo base_url('course/manage/outline/'.$_SESSION['course_id']); ?>" class="list-group-item list-group-item-action active"><span class="badge badge-dark">3</span> Outline</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>Course Outline</h3>
					<h6>Start putting together your course by creating sections, lectures and practice (quizzes and coding exercises) below.</h6>
					<form style="display: none;" id="FORMsection">
						<div class="form-group">
							<label>New Section</label>
							<input class="form-control" placeholder="Enter a Title"></input>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Add Section</button>
							<button type="reset" class="btn btn-secondary" onclick="cancel_Add_Section()">Cancel</button>
						</div>
					</form>
					<form style="display: none;" id="FORMlecture">
						<div class="form-group">
							<label>New Section</label>
							<input class="form-control" placeholder="Enter a Title"></input>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Add Lecture</button>
							<button type="reset" class="btn btn-secondary" onclick="cancel_Add_Lecture()">Cancel</button>
						</div>
					</form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-outline-primary btn-lg btn-block" onclick="add_Section()" id="ADDsection">Add Section</button>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-outline-primary btn-block" onclick="add_Lecture()" id="ADDlecture">Add Lecture</button>
						</div>
						<div class="col-md-4">
							<button class="btn btn-outline-primary btn-block" onclick="add_Quiz()" id="ADDquiz">Add Quiz</button>
						</div>
						<div class="col-md-4">
							<button class="btn btn-outline-primary btn-block" onclick="add_Assignment()" id="ADDassignment">Add Assignment</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function hide_Buttons(){
		document.getElementById('ADDlecture').style.display = 'none';
		document.getElementById('ADDsection').style.display = 'none';
		document.getElementById('ADDquiz').style.display = 'none';
		document.getElementById('ADDassignment').style.display = 'none';
	}
	function show_Buttons(){
		document.getElementById('ADDlecture').style.display = 'block';
		document.getElementById('ADDsection').style.display = 'block';
		document.getElementById('ADDquiz').style.display = 'block';
		document.getElementById('ADDassignment').style.display = 'block';
	}
	function add_Section(){
		hide_Buttons();
		document.getElementById('FORMsection').style.display = 'block';
	}
	function add_Lecture(){
		hide_Buttons();
		document.getElementById('FORMlecture').style.display = 'block';
	}
	function add_Quiz(){
		hide_Buttons();
		document.getElementById('ADDassignment').style.display = 'none';
	}
	function add_Assignment(){
		hide_Buttons();
		document.getElementById('ADDassignment').style.display = 'none';
	}
	function cancel_Add_Section()
	{
		show_Buttons();
		document.getElementById('FORMsection').style.display = 'none';
	}
	function cancel_Add_Lecture()
	{
		show_Buttons();
		document.getElementById('FORMlecture').style.display = 'none';
	}
</script>