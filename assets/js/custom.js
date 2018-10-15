function show_review_buttons(course_id)
{
	document.getElementById('review'+course_id+'Buttons').style.display = "block";
	document.getElementById('course'+course_id+'Options').style.display = "none";
}
function cancel_review(course_id)
{
	document.getElementById('review'+course_id+'Buttons').style.display = "none";
	document.getElementById('course'+course_id+'Options').style.display = "block";
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








function showDelWeek(week_id) {
	document.getElementById('week-'+week_id).style.display = 'none';
	document.getElementById('opts-'+week_id).style.display = 'block';

}
function hideDelWeek(week_id) {
	document.getElementById('week-'+week_id).style.display = 'block';
	document.getElementById('opts-'+week_id).style.display = 'none';
}