<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['index'] = 'main/index';
//on index.php
$route['register'] = "main/register";
$route['login'] = "main/login";
//on login.php
$route['map'] = 'main/map';
$route['reset'] = 'main/reset';
$route['add_child'] = 'childs/add_child';
$route['select_child/(:any)'] = 'childs/select_child/$1';
//on add_child.php
$route['new_child'] = "childs/new_child";
$route['users_profiles'] = 'main/users_profiles';
//on select_child.php
$route['delete/(:any)'] = 'childs/delete/$1'; 
$route['rem_entry/(:any)'] = 'childs/rem_entry/$1'; 
//from select_child.php
$route['food_and_water/(:any)'] = 'childs/food_and_water/$1';
$route['medicine/(:any)'] = 'childs/medicine/$1';
$route['boom_boom/(:any)'] = 'childs/boom_boom/$1';

//boom_boom.php,food_and_water.php,medicine.php
$route['add_event/(:any)'] = 'childs/add_event/$1';

$route['404_override'] = '';

