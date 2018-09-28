<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login routes
$route['signup'] = 'login/signup_user';
$route['signup/instructor'] = 'login/signup_instructor';
$route['signin'] = 'login/signin';
$route['signup/success'] = 'login/signup_success';

// user link
$route['u/(:num)'] = 'lookup/user_profile/$1';
// search link
$route['search'] = 'lookup/search_course';
// course link
$route['course/(:num)'] = 'lookup/courses/$1';
// course category link
$route['course/(:any)'] = 'lookup/course_cat/$1';
// enroll course
$route['course/enroll/(:num)'] = 'courses/course_enroll/$1';

$route['course/create'] = 'instructor/create_course';
$route['course/delete/(:num)'] = 'instructor/delete_course/$1';
$route['course/edit/outline/(:num)'] = 'instructor/edit_outline/$1';
	// $route['course/edit/outline/(:num)/lecture_check'] = 'instructor/add_outline_course_lecture/$1';
	// $route['course/edit/outline/(:num)/video_check'] = 'instructor/add_outline_course_video/$1';
	// $route['course/edit/outline/(:num)/lecture_edit/(:num)'] = 'instructor/edit_outline_course_lecture/$1/$2';
	// $route['course/edit/outline/(:num)/video_edit/(:num)'] = 'instructor/edit_outline_course_video/$1/$2';
$route['course/review/(:num)'] = 'instructor/send_course_review/$1';
// new
$route['course/edit/info/(:num)'] = 'instructor/course_info/$1';
$route['course/edit/outline/(:num)'] = 'instructor/course_outline/$1';
$route['course/edit/media/(:num)'] = 'instructor/course_promo_media/$1';
$route['course/edit/preview/(:num)'] = 'instructor/course_preview/$1';
$route['course/edit/outline/(:num)/video'] = 'instructor/course_outline_add_video/$1';
$route['course/edit/outline/(:num)/lecture'] = 'instructor/course_outline_add_lecture/$1';
$route['course/edit/outline/(:num)/video/(:num)'] = 'instructor/course_outline_add_video_edit/$1/$2';
$route['course/edit/outline/(:num)/lecture/(:num)'] = 'instructor/course_outline_add_lecture_edit/$1/$2';
$route['course/edit/review/(:num)'] = 'instructor/course_review/$1';

	
// profile routes
$route['profile'] = 'profile/edit';
$route['profile/photo'] = 'profile/photo';
$route['profile/photo/upload'] = 'profile/photo_upload';
$route['profile/delete'] = 'profile/delete';
$route['profile/preview'] = 'profile/preview';
$route['profile/account/edit'] = 'profile/account';

// admin
$route['admin/review/(:num)'] = 'admin/review_course/$1';
$route['admin/review/(:num)/approve'] = 'admin/course_review_approve/$1';