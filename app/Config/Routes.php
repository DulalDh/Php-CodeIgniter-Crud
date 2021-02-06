<?php namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::manage');

$routes->get('categories/create', 'CategoriesController::createUi');
$routes->post('categories/create', 'CategoriesController::create');
$routes->add('categories/manage', 'CategoriesController::list');
$routes->get('categories/update/(:segment)', 'CategoriesController::updateUi/$1');
$routes->post('categories/update/(:segment)', 'CategoriesController::update/$1');
$routes->add('categories/delete/(:segment)', 'CategoriesController::delete/$1');

$routes->get('items/create', 'ItemsController::createUi');
$routes->post('items/create', 'ItemsController::create');
$routes->add('items/manage', 'ItemsController::list');
$routes->get('items/update/(:segment)', 'ItemsController::updateUi/$1');
$routes->post('items/update/(:segment)', 'ItemsController::update/$1');
$routes->add('items/delete/(:segment)', 'ItemsController::delete/$1');



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}