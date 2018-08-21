function show_review_buttons()
{
	document.getElementById('reviewButtons').style.display = "block";
	document.getElementById('courseOptions').style.display = "none";
}
function cancel_review()
{
	document.getElementById('reviewButtons').style.display = "none";
	document.getElementById('courseOptions').style.display = "block";
}
function add_video()
{
	document.getElementById('outlineButtons').style.display = 'none';
	document.getElementById('videoForm').style.display = 'block';
}
function cancel_add_video()
{
	document.getElementById('outlineButtons').style.display = 'block';
	document.getElementById('videoForm').style.display = 'none';
}
function display_lecture_form()
{
	document.getElementById('outlineButtons').style.display = 'none';
	document.getElementById('videoForm').style.display = 'block';
	alert("The anchor part has changed!");
}
function add_lecture()
{
	document.getElementById('outlineButtons').style.display = 'none';
	document.getElementById('lectureForm').style.display = 'block';
}
function cancel_add_lecture()
{
	document.getElementById('outlineButtons').style.display = 'block';
	document.getElementById('lectureForm').style.display = 'none';
}