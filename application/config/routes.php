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
//$route['update_tutor_profile']='welcome/update_tutor_profile'
$route['tutor_registration'] = 'welcome/tutor_registration';
$route['tutor_registration/register'] = 'welcome/valid_tutor';
$route['student_registration/register'] = 'welcome/valid_student';
$route['about'] = 'welcome/about';
$route['tutor/tutor_info'] = 'welcome/is_tutor_login';
$route['tutor/update_tutor_profile']='welcome/update_tutor_profile_info';
$route['welcome/tutor_add_course']='welcome/tutor_add_course';
$route['tutor/addedcourse']='welcome/courseadd';
$route['tutor/allcourse']='welcome/tutor_show_course';
$route['welcome']='welcome/logout';
$route['update/tutor_course/(:num)']='welcome/update_tutor_course/$1';
$route['delete/tutor_course/(:num)']='welcome/delete_tutor_course/$1';
$route['tutor_add_notice']='notice/tutor_add_notice';
$route['noticeadd']='notice/noticeadd';
$route['tutor_show_notice']='notice/tutor_show_notice';
$route['update/tutor_notice/(:num)']='notice/update_tutor_notice/$1';
$route['delete/tutor_notice/(:num)']='notice/delete_tutor_notice/$1';
$route['tutor_add_lecture']='Lectureupload/tutor_add_lecture';
$route['tutor_show_lecture']='Lectureupload/tutor_show_lecture';
$route['delete/tutor_lecture/(:num)']='Lectureupload/delete_tutor_lecture/$1';
//for student
$route['student/student_info'] = 'student/is_student_login';
$route['student/home_after_login']='student/home_after_login_student';
$route['student/update_student_profile']='student/update_student_profile';
$route['update_student_profile']='student/update_student_profile_info';
$route['welcome']='student/logout';
$route['student_show_lecture']='student/student_show_lecture';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
