<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

$route['admin'] = "auth/admin/AdminHome";

$route['Products'] = "main/Products";
$route['Products/details/(:any)'] = "main/Products/details/$1";
$route['Login'] = "main/Login";
$route['Register'] = "main/Register";
$route['Register/submitReg'] = "main/Register/submitReg";
$route['Login/ProcessLogin'] = "main/Login/ProcessLogin";
$route['Login/ProcessLogin_forBuy'] = "main/Login/ProcessLogin_forBuy";
$route['Products/buynow/(:any)'] = "main/Products/buynow/$1";
$route['Logout'] = "main/Logout";

$route['paypal/success'] = "main/Paypal/success";
$route['paypal/cancel'] = "main/Paypal/cancel";
$route['paypal/ipn'] = "main/Paypal/ipn";

$route['my-account'] = "my-account/Home";
$route['my-account/my-courses'] = "my-account/My_courses";
$route['my-account/course/details/(:any)'] = "my-account/Course/details/$1";
$route['my-account/seminars/(:any)'] = "my-account/Seminars/index/$1";
$route['my-account/ebooks/(:any)'] = "my-account/Ebooks/index/$1";
$route['my-account/ebooks/download/(:any)'] = "my-account/Ebooks/download/$1";
$route['my-account/community/(:any)'] = "my-account/Community/index/$1";
$route['my-account/my-subscription'] = "my-account/My_subscription";
$route['my-account/Community/save_discord'] = "my-account/Community/save_discord";
$route['my-account/course-videos/(:any)'] = "my-account/Course_videos/index/$1";
$route['my-account/course-videos/play/(:any)'] = "my-account/Course_videos/play/$1";
$route['my-account/premium-videos'] = "my-account/Premium_videos/index";
$route['my-account/premium-videos/play/(:any)'] = "my-account/Premium_videos/play/$1";


$route['membership-plans'] = "main/Membership_plans/index";
$route['membership-plans/subscribe/(:any)'] = "main/Membership_plans/subscribe/$1";
$route['Membership_plans/payment_success/(:any)'] = "main/Membership_plans/payment_success/$1";
$route['Membership_plans/payment_ipn'] = "main/Membership_plans/payment_ipn";
$route['Membership_plans/payment_cancel'] = "main/Membership_plans/payment_cancel";

$route['transactions'] = "Transactions/index";




