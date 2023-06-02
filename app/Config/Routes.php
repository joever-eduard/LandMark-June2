<?php

namespace Config;

use App\Controllers\PagesController;
use App\Controllers\Users;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PagesController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'PagesController::index');
$routes->get('about', 'PagesController::about');
$routes->get('search', 'PagesController::search');
$routes->match(['get', 'post'], 'login', 'Users::login');
$routes->match(['get','post'],'register', 'Users::register');
$routes->match(['get','post'],'profile', 'Users::profile');
$routes->get('/adminhome', 'PagesController::adminHome');
$routes->get('adminabout', 'PagesController::adminAbout');
$routes->get('adminsearch', 'PagesController::adminSearch');
$routes->get('searchinfo', 'PagesController::searchinfo');
$routes->get('usersearch', 'PagesController::usersearch');
$routes->get('documents', 'PagesController::documents');
$routes->get('documents/view/(:num)', 'PagesController::viewlot/$1');
$routes->get('documents/delete/(:num)', 'PagesController::deleteDocument/$1'); // Add this route
$routes->get('documents/download/(:num)', 'PagesController::downloadDocument/$1'); // Add this route
$routes->get('reports', 'PagesController::reports');
$routes->match(['get', 'post'], 'land/add', 'PagesController::add');
$routes->match(['get', 'post'], 'land/update/(:num)', 'PagesController::update/$1');
$routes->get('land/delete/(:num)', 'PagesController::delete/$1');
$routes->get('map', 'PagesController::map');
$routes->get('adminmap', 'PagesController::adminmap');
$routes->post('upload', 'PagesController::upload');





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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
