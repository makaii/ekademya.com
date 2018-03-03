// function hide_Buttons(){
// 	document.getElementById('ADDlecture').style.display = 'none';
// 	document.getElementById('ADDsection').style.display = 'none';
// 	document.getElementById('ADDquiz').style.display = 'none';
// 	document.getElementById('ADDassignment').style.display = 'none';
// }
// function show_Buttons(){
// 	document.getElementById('ADDlecture').style.display = 'block';
// 	document.getElementById('ADDsection').style.display = 'block';
// 	document.getElementById('ADDquiz').style.display = 'block';
// 	document.getElementById('ADDassignment').style.display = 'block';
// }
function add_Section(){
	// hide_Buttons();
	document.getElementById('ADDsection').style.display = 'none';
	document.getElementById('FORMsection').style.display = 'block';
}
// // function add_Lecture(){
// // 	hide_Buttons();
// // 	document.getElementById('FORMlecture').style.display = 'block';
// // }
// // function add_Quiz(){
// // 	hide_Buttons();
// // 	document.getElementById('FORMquiz').style.display = 'block';
// // }
// // function add_Assignment(){
// // 	hide_Buttons();
// // 	document.getElementById('FORMassignment').style.display = 'block';
// // }
function cancel_Add_Section()
{
	// show_Buttons();
	document.getElementById('ADDsection').style.display = 'block';
	document.getElementById('FORMsection').style.display = 'none';
}
// function cancel_Add_Lecture()
// {
// 	show_Buttons();
// 	document.getElementById('FORMlecture').style.display = 'none';
// }
// function cancel_Add_Quiz()
// {
// 	show_Buttons();
// 	document.getElementById('FORMquiz').style.display = 'none';
// }
// function cancel_Add_Assignment()
// {
// 	show_Buttons();
// 	document.getElementById('FORMassignment').style.display = 'none';
// }