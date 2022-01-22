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
//-----------------------------------------
$route['market'] = 'DayStarMarket';
$route['ar/market'] = 'DayStarMarket';
$route['en/market'] = 'DayStarMarket';
$route['es/market'] = 'DayStarMarket';
//-----------------------------------------
$route['products/(:num)'] = 'DayStarMarket/products/$1';
$route['ar/products/(:num)'] = 'DayStarMarket/products/$1';
$route['en/products/(:num)'] = 'DayStarMarket/products/$1';
$route['es/products/(:num)'] = 'DayStarMarket/products/$1';
//-----------------------------------------
$route['get-product-by-id/(:num)'] = 'DayStarMarket/getProductById/$1';
$route['ar/get-product-by-id/(:num)'] = 'DayStarMarket/getProductById/$1';
$route['en/get-product-by-id/(:num)'] = 'DayStarMarket/getProductById/$1';
$route['es/get-product-by-id/(:num)'] = 'DayStarMarket/getProductById/$1';
//-----------------------------------------
$route['single-product/(:num)'] = 'DayStarMarket/singleProduct/$1';
$route['ar/single-product/(:num)'] = 'DayStarMarket/singleProduct/$1';
$route['en/single-product/(:num)'] = 'DayStarMarket/singleProduct/$1';
$route['es/single-product/(:num)'] = 'DayStarMarket/singleProduct/$1';
//-----------------------------------------
$route['my-Favourite'] = 'DayStarMarket/myFavourite';
$route['ar/my-Favourite'] = 'DayStarMarket/myFavourite';
$route['en/my-Favourite'] = 'DayStarMarket/myFavourite';
$route['es/my-Favourite'] = 'DayStarMarket/myFavourite';

//-----------------------------------------
$route['remove-from-favourite/(:num)'] = 'DayStarMarket/removeFromFavourite/$1';
$route['ar/remove-from-favourite/(:num)'] = 'DayStarMarket/removeFromFavourite/$1';
$route['en/remove-from-favourite/(:num)'] = 'DayStarMarket/removeFromFavourite/$1';
$route['es/remove-from-favourite/(:num)'] = 'DayStarMarket/removeFromFavourite/$1';
//-----------------------------------------
$route['my-cart'] = 'DayStarMarket/cart';
$route['ar/my-cart'] = 'DayStarMarket/cart';
$route['en/my-cart'] = 'DayStarMarket/cart';
$route['es/my-cart'] = 'DayStarMarket/cart';
//-----------------------------------------
$route['checkout'] = 'DayStarMarket/checkout';
$route['ar/checkout'] = 'DayStarMarket/checkout';
$route['en/checkout'] = 'DayStarMarket/checkout';
$route['es/checkout'] = 'DayStarMarket/checkout';
//-----------------------------------------
$route['create-market-order'] = 'DayStarMarket/createMarketOrder';
$route['ar/create-market-order'] = 'DayStarMarket/createMarketOrder';
$route['en/create-market-order'] = 'DayStarMarket/createMarketOrder';
$route['es/create-market-order'] = 'DayStarMarket/createMarketOrder';

$route['actionToFavourite/(:num)'] = 'DayStarMarket/actionToFavourite/$1';
