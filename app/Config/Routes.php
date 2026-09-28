<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Root Route (Redirects to TFA4 Login)
$routes->get('/', static function () {
    return redirect()->to(base_url('TFA4/login'));
});

// Alternatively, if you want it to go directly to TFA4 Customers (which will trigger the AuthFilter if logged out):
// $routes->get('/', static function () {
//     return redirect()->to(base_url('TFA4/customers'));
// });

// ==========================================
// TFA3 ROUTES (Public / No Authentication)
// ==========================================
$registerTfa3Routes = function ($routes) {
    $routes->get('customers', 'CustomerController::index');
    $routes->get('customers/new', 'CustomerController::create');
    $routes->post('customers/create', 'CustomerController::store');
    $routes->get('customers/edit/(:num)', 'CustomerController::edit/$1');
    $routes->post('customers/update/(:num)', 'CustomerController::update/$1');

    $routes->get('users', 'UserController::index');
    $routes->get('users/new', 'UserController::create');
    $routes->post('users/create', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
};

$routes->group('TFA3', $registerTfa3Routes);
$routes->group('tfa3', $registerTfa3Routes);

// ==========================================
// TFA4 ROUTES (Protected by Auth Filter)
// ==========================================
$registerTfa4Routes = function ($routes) {
    // Public Auth Routes
    $routes->get('login', 'AuthController::login');
    $routes->post('login/auth', 'AuthController::authenticate');
    $routes->get('logout', 'AuthController::logout');

    // Protected Routes
    $routes->group('', ['filter' => 'authFilter'], function ($routes) {
        $routes->get('customers', 'Tfa4CustomerController::index');
        $routes->get('customers/new', 'Tfa4CustomerController::create');
        $routes->post('customers/create', 'Tfa4CustomerController::store');
        $routes->get('customers/edit/(:num)', 'Tfa4CustomerController::edit/$1');
        $routes->post('customers/update/(:num)', 'Tfa4CustomerController::update/$1');

        $routes->get('users', 'Tfa4UserController::index');
        $routes->get('users/new', 'Tfa4UserController::create');
        $routes->post('users/create', 'Tfa4UserController::store');
        $routes->get('users/edit/(:num)', 'Tfa4UserController::edit/$1');
        $routes->post('users/update/(:num)', 'Tfa4UserController::update/$1');
    });
};

$routes->group('TFA4', $registerTfa4Routes);
$routes->group('tfa4', $registerTfa4Routes);