<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// All Custom Router
$route['dashboard'] = 'app/index';
$route['login'] = 'app/signin';
$route['booking/exportpdf'] = 'transaksi/booking/exportpdf';
$route['booking/print/$1'] = 'transaksi/booking/print/$1';

// Route for Static Pages
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['services'] = 'home/services';

// Route for Services
$route['service/generate_dummy_data'] = 'home/generate_dummy_data';