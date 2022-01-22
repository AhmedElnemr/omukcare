<?php
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
|	http://codeigniter.com/user_guide/general/routing.html
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
 //device-lang
$route['api/setting']["GET"] = 'web_service/App/setting';
$route['api/update-firebase-token']["POST"] = 'web_service/App/updateToken';
$route['api/update-location']["POST"] = 'web_service/App/updateLocation';
$route['api/visit-app']["POST"] = 'web_service/App/visit';
//--------------------------------------------
$route['api/services']["GET"] = 'web_service/App/services';
$route['api/main-services']["GET"] = 'web_service/App/mainServices/1';
$route['api/sub-services']["GET"] = 'web_service/App/mainServices/2';
$route['api/get-sub-services']["GET"] = 'web_service/App/mainServices/3';
$route['api/contact-us']["POST"] = 'web_service/App/contact';
$route['api/note']["POST"] = 'web_service/App/testNote';
$route['api/areas']["GET"] = 'web_service/App/areas';
$route['api/service-price']["POST"] = 'web_service/App/getPrice';
//--------------------------------------------
$route['api/login']["POST"] = 'web_service/Registration/login';
$route['api/logout']["GET"] = 'web_service/Registration/logout';
$route['api/user-register']["POST"] = 'web_service/Registration/userRegister';
$route['api/update-user-profile']["POST"] = 'web_service/Registration/profileUser';
$route['api/provider-register']["POST"] = 'web_service/Registration/providerRegister';
$route['api/update-provider-profile']["POST"] = 'web_service/Registration/profileProvider';
$route['api/my-profile']["GET"] = 'web_service/Registration/profile';
$route['api/user-profile']["GET"] = 'web_service/Registration/userProfile';
$route['api/active-control']["POST"] = 'web_service/Registration/beActive';
$route['api/my-rating']["GET"] = 'web_service/Registration/myRating';
//--------------------------------------------
$route['api/create-order']["POST"] = 'web_service/Order/create';
$route['api/my-notifications']["GET"] = 'web_service/Order/notifications';
$route['api/unread-notifications']["GET"] = 'web_service/Order/countNotifications';
$route['api/accept-order']["POST"] = 'web_service/Order/acceptOrder';
$route['api/refuse-order']["POST"] = 'web_service/Order/refuseOrder';
$route['api/client-orders']["GET"] = 'web_service/Order/clintOrders';
$route['api/provider-orders']["GET"] = 'web_service/Order/providerOrders';
$route['api/cancel-order']["POST"] = 'web_service/Order/cancelOrder';
$route['api/one-order']["GET"] = 'web_service/Order/getOrder';
$route['api/provider-end-order']["POST"] = 'web_service/Order/providerEndOrder';
$route['api/client-end-order']["POST"] = 'web_service/Order/clientEndOrder';
/**
 *  ============================================================
 *
 *  --------------------------- RestPass  ------------------------
 *
 *  ============================================================
 */
$route['api/send-rest-code']["POST"] = 'web_service/RestPass/sendRestCode';
$route['api/confirm-code']["POST"] = 'web_service/RestPass/confirmCode';
$route['api/rest-password']["POST"] = 'web_service/RestPass/restPassword';


$route['api/coupon']["POST"] = 'web_service/Order/coupon';




/**
 *  ============================================================
 *
 *  --------------------------- Market  ------------------------
 *
 *  ============================================================
 */
 // device-lang
$route['app/slider']["GET"] = 'api_market/Setting/slider';
$route['app/visit-app']["POST"] = 'web_service/App/visit';
$route['app/contact-us']["POST"] = 'web_service/App/contact';
$route['app/setting']["GET"] = 'api_market/Setting/show';
//--------------------------------------------------------
$route['app/login']["POST"] = 'api_market/User/login';
$route['app/logout']["POST"] = 'api_market/User/logout';
$route['app/delete-user']["POST"] = 'api_market/User/delete';
$route['app/my-profile']["GET"] = 'web_service/Registration/profile';
$route['app/user-profile']["GET"] = 'web_service/Registration/userProfile';
$route['app/user-register']["POST"] = 'api_market/User/userRegister';
$route['app/update-user-profile']["POST"] = 'api_market/User/profileUser';
$route['app/update-firebase-token']["POST"] = 'web_service/App/updateToken';
//--------------------------------------------------------
$route['app/main-category']["GET"] = 'api_market/Department/main';
$route['app/sub-category']["GET"] = 'api_market/Department/sub';
$route['app/get-sub-category-by-main']["GET"] = 'api_market/Department/getSubByMain';
//--------------------------------------------------------
$route['app/shop-country']["GET"] = 'api_market/Setting/prices_countries';
$route['app/all-products']["GET"] = 'api_market/Product/all';
$route['app/products-by-sub-category']["GET"] = 'api_market/Product/productsBySubDep';
$route['app/offers']["GET"] = 'api_market/Product/offers';
$route['app/most-sell']["GET"] = 'api_market/Product/mostSell';
$route['app/one-product']["GET"] = 'api_market/Product/one';
$route['app/search-name']["GET"] = 'api_market/Product/searchName';
//--------------------------------------------------------
$route['app/action-favourite']["POST"] = 'api_market/Favourite/action';
$route['app/my-favourites']["GET"] = 'api_market/Favourite/my';
//--------------------------------------------------------
$route['app/create-order']["POST"] = 'api_market/Order/create';
$route['app/my-orders']["GET"] = 'api_market/Order/my';
$route['app/my-one-order']["GET"] = 'api_market/Order/one';
//--------------------------------------------------------
$route['app/my-notifications']["GET"] = 'api_market/Notification/my';
$route['app/delete-notification']["POST"] = 'api_market/Notification/delete';
$route['app/unread-notifications']["GET"] = 'api_market/Notification/unreadNote';
$route['app/read-notifications']["GET"] = 'api_market/Notification/readNote';
//--------------------------------------------------------
$route['app/news']["GET"] = 'api_market/News/all';
$route['app/one-news']["GET"] = 'api_market/News/one';
//--------------------------------------------------------
$route['market-buy/(:any)'] = 'api_market/PayPalMarket/buy/$1';
$route['market-paypal/success'] = 'api_market/PayPalMarket/success';
$route['market-paypal/cancel'] = 'api_market/PayPalMarket/cancel';

