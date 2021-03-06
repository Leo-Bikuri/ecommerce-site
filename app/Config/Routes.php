<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$route['profiler'] = "Profiler_controller"; 
$route['profiler/disable'] = "Profiler_controller/disable";


// custom routes

$routes->get('/', 'Registration::index');
$routes->get('/Registration', 'Registration::index');
$routes->get('/Login', 'Login::index');
$routes->get('thanks', 'Client::thanks');

//Admin routes
$routes->get('/administrators', 'Admin::administrators');
$routes->get('/administrators/delete/(:num)', 'Admin::delete/$1');
$routes->get('/administrator/(:num)', 'Admin::getAdministrator/$1');
$routes->post('/administrator/update/(:num)', 'Admin::update/$1');

//Client routes
$routes->get('home', 'Client::index');
$routes->get('/shop/(:num)', 'Client::shop/$1');
$routes->get('/shop/(:num)/(:num)', 'Client::shop/$1/$2');
$routes->get('/shop/(:num)/(:alphanum)', 'Client::shop/$1/$2');
$routes->get('/shop/(:num)/(:num)/(:alphanum)', 'Client::shop/$1/$2/$3');
$routes->get('/cart', 'Client::cart');
$routes->get('/checkout', 'Client::checkout');
$routes->get('/product/(:num)', 'Client::sproduct/$1');
// $routes->get('/shop-subcategory/(:alphanum)', 'Client::shop_subcategories/$1');
// $routes->get('/shop-subcategory/(:alphanum)/(:alphanum)', 'Client::shop_subcategories/$1/$2');
$routes->post('/basket', 'Client::add_to_cart');
$routes->get('/cart_delete/(:alphanum)', 'Client::cart_delete/$1');
$routes->post('/update_cart/(:alphanum)', 'Client::update_cart/$1');

//Payment routes
$routes->get('/stripe', 'StripeController::index');
$routes->post('/payment', 'StripeController::payment');


//API routes
$routes->group('api', ["namespace"=>"App\Controllers\API"], function($routes){
	$routes->post("register", "Auth::register");
	$routes->post("login", "Auth::login");
	$routes->get("profile", "Auth::details");
});

$routes->group('api',  ["namespace"=>"App\Controllers\API"], function($routes){
	$routes->resource('user', ['only' => ['index', 'create', 'show']]);
});
$routes->get('receipt', 'PdfController::htmlToPDF');



// $routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
