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

// search routes
$route['u/(:num)'] = 'lookup/user_profile/$1';
$route['instructor/(:num)'] = 'lookup/instructor_profile/$1';
$route['search'] = 'lookup/search_course';
// $route['course/(:any)'] = 'courses/$1';

// intructor routes
// $route['instructor/profile'] = 'profile/edit';
// $route['instructor/profile/photo'] = 'profile/photo';
// $route['instructor/profile/preview'] = 'profile/preview';
// $route['instructor/profile/delete'] = 'profile/delete';

$route['course/create'] = 'instructor/create_course';
$route['course/delete'] = 'instructor/delete_course';
$route['course/manage/goals/(:num)'] = 'instructor/manage_goals/$1';
$route['course/manage/landing_page/(:num)'] = 'instructor/manage_landing_page/$1';
$route['course/manage/outline/(:num)'] = 'instructor/manage_outline/$1';

// user routes
// $route['student/profile'] = 'profile/edit';
// $route['student/profile/photo'] = 'profile/photo';
// $route['student/profile/preview'] = 'profile/preview';
// $route['student/profile/delete'] = 'profile/delete';

// profile routes
$route['profile'] = 'profile/edit';
$route['profile/photo'] = 'profile/photo';
$route['profile/delete'] = 'profile/delete';
$route['profile/preview'] = 'profile/preview';
$route['profile/account/edit'] = 'profile/account';