<?php

namespace Config;

use App\Controllers\Admin\AuthenticationController;
use App\Controllers\Admin\CustomerController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\CouponController;
use App\Controllers\Admin\OrderController;

use App\Controllers\Client\AuthenticationClientController;
use App\Controllers\Client\ProductController as Client;
use App\Controllers\Client\CartController;
use App\Controllers\Client\CheckoutController;
use App\Controllers\Client\MyAccountController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH.'Config/Routes.php')) {
    require SYSTEMPATH.'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Client\ProductController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(FALSE);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/dashboard', function () {
    return view('admin/index');
}, ['as' => 'dashboard']);

// Auth User
$routes->group('/admin', static function ($routes) {
    $routes->get('', [AuthenticationController::class, 'home']);
    $routes->get('login', [AuthenticationController::class, 'index'], ['as' => 'login']);
    $routes->post('login', [AuthenticationController::class, 'userLogin'], ['as' => 'user-login']);
    $routes->get('logout', [AuthenticationController::class, 'userLogout'], ['as' => 'user-logout']);
});

// Auth Client
$routes->get('login', [AuthenticationClientController::class, 'index'], ['as' => 'login-client']);
$routes->post('login', [AuthenticationClientController::class, 'clientLogin'], ['as' => 'signin-client']);
$routes->get('logout', [AuthenticationClientController::class, 'clientLogout'], ['as' => 'logout-client']);

// Admin Customer
$routes->group('/customer', static function ($routes) {
    $routes->get('', [CustomerController::class, 'index'], ['as' => 'index.customer']);
    $routes->get('create', [CustomerController::class, 'create'], ['as' => 'customer-create']);
    $routes->post('create-new', [CustomerController::class, 'store'], ['as' => 'customer-createNew']);
    $routes->get('update/(:num)', [CustomerController::class, 'edit'], ['as' => 'customer-edit']);
    $routes->post('update/(:num)', [CustomerController::class, 'update'], ['as' => 'customer-update']);
    $routes->get('delete/(:num)', [CustomerController::class, 'destroy'], ['as' => 'customer-delete']);

    $routes->get('customer-image/delete/(:num)', [CustomerController::class, 'destroyImage'], ['as' => 'customerImage-delete']);
});

// Admin Product
$routes->group('/product', static function ($routes) {
    $routes->get('', [ProductController::class, 'index'], ['as' => 'index.product']);
    $routes->get('create', [ProductController::class, 'create'], ['as' => 'product-create']);
    $routes->post('create-new', [ProductController::class, 'store'], ['as' => 'product-createNew']);
    $routes->get('update/(:num)', [ProductController::class, 'edit'], ['as' => 'product-edit']);
    $routes->post('update/(:num)', [ProductController::class, 'update'], ['as' => 'product-update']);
    $routes->get('delete/(:num)', [ProductController::class, 'destroy'], ['as' => 'product-delete']);
//    $routes->get('view/(:num)', [ProductController::class, 'view'], ['as' => 'product-view']);

    $routes->get('product-image/delete/(:num)', [ProductController::class, 'destroyImage'], ['as' => 'productImage-delete']);
//    $routes->get('view-ajax/(:num)', [ProductController::class, 'viewAjax'], ['as' => 'product-viewAjax']);
});

// Admin Coupon
$routes->group('/coupon', static function ($routes) {
    $routes->get('', [CouponController::class, 'index'], ['as' => 'index.coupon']);
    $routes->get('create', [CouponController::class, 'create'], ['as' => 'coupon-create']);
    $routes->post('create-new', [CouponController::class, 'store'], ['as' => 'coupon-createNew']);
    $routes->get('update/(:num)', [CouponController::class, 'edit'], ['as' => 'coupon-edit']);
    $routes->post('update/(:num)', [CouponController::class, 'update'], ['as' => 'coupon-update']);
    $routes->get('delete/(:num)', [CouponController::class, 'destroy'], ['as' => 'coupon-delete']);
});

// Admin Order
$routes->group('/order', static function ($routes) {
    $routes->get('', [OrderController::class, 'index'], ['as' => 'index.order']);
    $routes->get('create', [OrderController::class, 'create'], ['as' => 'order-create']);

    $routes->get('get-option', [OrderController::class, 'getOptionAjax'], ['as' => 'get-option']);
    $routes->get('get-priceOption', [OrderController::class, 'getPriceOptionAjax'], ['as' => 'get-priceOption']);
    $routes->post('add-item', [OrderController::class, 'addItemAjax'], ['as' => 'add-item']);
    $routes->get('remove-item', [OrderController::class, 'removeItemAjax'], ['as' => 'remove-item']);
    $routes->get('add-coupon', [OrderController::class, 'addCouponAjax'], ['as' => 'add-coupon']);
    $routes->get('add-customer', [OrderController::class, 'addCustomerAjax'], ['as' => 'add-customer']);
});

// Page Client
$routes->get('/', [Client::class, 'index'], ['as' => 'product-index']);
$routes->get('detail-product/(:num)', [Client::class, 'clientView'], ['as' => 'product-clientView']);
$routes->get('product-ajax/(:num)', [Client::class, 'viewAjax'], ['as' => 'product-clientViewAjax']);

// Client My Account
$routes->get('my-account', [MyAccountController::class, 'index'], ['as' => 'client-myAccount']);

// Client Cart
$routes->get('cart-product', [CartController::class, 'index'], ['as' => 'product-cart']);
$routes->get('cart/(:num)', [CartController::class, 'addToCart'], ['as' => 'product-addToCart']);
$routes->get('coupon-product', [CartController::class, 'addCoupon'], ['as' => 'product-addCoupon']);
$routes->get('update-quantity', [CartController::class, 'updateQuantity'], ['as' => 'product-updateQuantity']);
$routes->get('shipping-product', [CartController::class, 'addShipping'], ['as' => 'product-addShipping']);
$routes->get('update-product/(:num)', [CartController::class, 'updateCart'], ['as' => 'product-updateCart']);
$routes->get('remove-product', [CartController::class, 'removeCart'], ['as' => 'product-removeCart']);

// Client Checkout
$routes->get('checkout-product', [CheckoutController::class, 'index'], ['as' => 'product-checkout']);
$routes->post('checkout', [CheckoutController::class, 'checkout'], ['as' => 'checkout']);

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
if (is_file(APPPATH.'Config/'.ENVIRONMENT.'/Routes.php')) {
    require APPPATH.'Config/'.ENVIRONMENT.'/Routes.php';
}
