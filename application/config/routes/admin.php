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

//--------------- Login   ---------------------------
$route['(ar|en)/auth'] = 'Login/checkLogin';
$route['auth']         = 'Login/checkLogin';
$route['(ar|en)/logout'] = 'Login/logout';
$route['logout']         = 'Login/logout';


//--------------- Dashboard   ----------------------
$route['(ar|en)/Dashboard'] = 'Dashboard';
$route['Dashboard'] = 'Dashboard';
$route['(ar|en)/main-setting'] = 'Dashboard/mainData';
$route['main-setting'] = 'Dashboard/mainData';

//--------------- main-setting   ----------------------
$route['(ar|en)/main-setting'] = 'MainData/add';
$route['main-setting'] = 'MainData/add';
$route['(ar|en)/main-setting/(:any)'] = 'MainData/$1';
$route['main-setting/(:any)'] = 'MainData/$1';
$route['(ar|en)/main-setting/(:any)/(:any)']= 'MainData/$1/$2';
$route['main-setting/(:any)/(:any)']= 'MainData/$1/$2';

//--------------- admin-users   ----------------------
$route['(ar|en)/admin-users'] = 'Admin';
$route['admin-users'] = 'Admin';
$route['(ar|en)/admin-users/(:any)'] = 'Admin/$1';
$route['admin-users/(:any)'] = 'Admin/$1';
$route['(ar|en)/admin-users/(:any)/(:any)']= 'Admin/$1/$2';
$route['admin-users/(:any)/(:any)']= 'Admin/$1/$2';
$route['(ar|en)/admin-users/(:any)/(:any)/(:any)']= 'Admin/$1/$2/$3';
$route['admin-users/(:any)/(:any)/(:any)']= 'Admin/$1/$2/$3';


/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */

//---------------  Country    ----------------------
$route['(ar|en)/admin-country'] = 'Country';
$route['admin-country'] = 'Country';
$route['(ar|en)/admin-country/(:any)'] = 'Country/$1';
$route['admin-country/(:any)'] = 'Country/$1';
$route['(ar|en)/admin-country/(:any)/(:any)']= 'Country/$1/$2';
$route['admin-country/(:any)/(:any)']= 'Country/$1/$2';

//---------------  City    ----------------------
$route['(ar|en)/admin-city'] = 'City';
$route['admin-city'] = 'City';
$route['(ar|en)/admin-city/(:any)'] = 'City/$1';
$route['admin-city/(:any)'] = 'City/$1';
$route['(ar|en)/admin-city/(:any)/(:any)']= 'City/$1/$2';
$route['admin-city/(:any)/(:any)']= 'City/$1/$2';

//---------------  Contact    ----------------------
$route['(ar|en)/admin-contact'] = 'Contact';
$route['admin-contact'] = 'Contact';
$route['(ar|en)/admin-contact/(:any)'] = 'Contact/$1';
$route['admin-contact/(:any)'] = 'Contact/$1';
$route['(ar|en)/admin-contact/(:any)/(:any)']= 'Contact/$1/$2';
$route['admin-contact/(:any)/(:any)']= 'Contact/$1/$2';


//---------------  main-service    ----------------------
$route['(ar|en)/admin-main-service'] = 'MainService';
$route['admin-main-service'] = 'MainService';
$route['(ar|en)/admin-main-service/(:any)'] = 'MainService/$1';
$route['admin-main-service/(:any)'] = 'MainService/$1';
$route['(ar|en)/admin-main-service/(:any)/(:any)']= 'MainService/$1/$2';
$route['admin-main-service/(:any)/(:any)']= 'MainService/$1/$2';


//---------------  sub-service    ----------------------
$route['(ar|en)/admin-sub-service'] = 'SubService';
$route['admin-sub-service'] = 'SubService';
$route['(ar|en)/admin-sub-service/(:any)'] = 'SubService/$1';
$route['admin-sub-service/(:any)'] = 'SubService/$1';
$route['(ar|en)/admin-sub-service/(:any)/(:any)']= 'SubService/$1/$2';
$route['admin-sub-service/(:any)/(:any)']= 'SubService/$1/$2';
$route['(ar|en)/admin-sub-service/(:any)/(:any)/(:any)']= 'SubService/$1/$2/$3';
$route['admin-sub-service/(:any)/(:any)/(:any)']= 'SubService/$1/$2/$3';

//---------------  slider    ----------------------
$route['(ar|en)/admin-slider'] = 'Slider';
$route['admin-slider'] = 'Slider';
$route['(ar|en)/admin-slider/(:any)'] = 'Slider/$1';
$route['admin-slider/(:any)'] = 'Slider/$1';
$route['(ar|en)/admin-slider/(:any)/(:any)']= 'Slider/$1/$2';
$route['admin-slider/(:any)/(:any)']= 'Slider/$1/$2';
//---------------  partners    ----------------------
$route['(ar|en)/admin-partners'] = 'Partner';
$route['admin-partners'] = 'Partner';
$route['(ar|en)/admin-partners/(:any)'] = 'Partner/$1';
$route['admin-partners/(:any)'] = 'Partner/$1';
$route['(ar|en)/admin-partners/(:any)/(:any)']= 'Partner/$1/$2';
$route['admin-partners/(:any)/(:any)']= 'Partner/$1/$2';
//---------------  Suppliers    ----------------------
$route['(ar|en)/admin-supplier'] = 'Supplier';
$route['admin-supplier'] = 'Supplier';
$route['(ar|en)/admin-supplier/(:any)'] = 'Supplier/$1';
$route['admin-supplier/(:any)'] = 'Supplier/$1';
$route['(ar|en)/admin-supplier/(:any)/(:any)']= 'Supplier/$1/$2';
$route['admin-supplier/(:any)/(:any)']= 'Supplier/$1/$2';
//---------------  medical-torism    ----------------------
$route['(ar|en)/admin-medical-tourism'] = 'MedicalTorism';
$route['admin-medical-tourism'] = 'MedicalTorism';
$route['(ar|en)/admin-medical-tourism/(:any)'] = 'MedicalTorism/$1';
$route['admin-medical-tourism/(:any)'] = 'MedicalTorism/$1';
$route['(ar|en)/admin-medical-tourism/(:any)/(:any)']= 'MedicalTorism/$1/$2';
$route['admin-medical-tourism/(:any)/(:any)']= 'MedicalTorism/$1/$2';
//---------------  medical-torism    ----------------------
$route['(ar|en)/admin-place'] = 'Place';
$route['admin-place'] = 'Place';
$route['(ar|en)/admin-place/(:any)'] = 'Place/$1';
$route['admin-place/(:any)'] = 'Place/$1';
$route['(ar|en)/admin-place/(:any)/(:any)']= 'Place/$1/$2';
$route['admin-place/(:any)/(:any)']= 'Place/$1/$2';
//---------------  Area    ----------------------
$route['(ar|en)/admin-area'] = 'Area';
$route['admin-area'] = 'Area';
$route['(ar|en)/admin-area/(:any)'] = 'Area/$1';
$route['admin-area/(:any)'] = 'Area/$1';
$route['(ar|en)/admin-area/(:any)/(:any)']= 'Area/$1/$2';
$route['admin-area/(:any)/(:any)']= 'Area/$1/$2';
//---------------  person    ----------------------
$route['(ar|en)/admin-person'] = 'Person';
$route['admin-person'] = 'Person';
$route['(ar|en)/admin-person/(:any)'] = 'Person/$1';
$route['admin-person/(:any)'] = 'Person/$1';
$route['(ar|en)/admin-person/(:any)/(:any)']= 'Person/$1/$2';
$route['admin-person/(:any)/(:any)']= 'Person/$1/$2';
//---------------  specialties    ----------------------
$route['(ar|en)/admin-specialties'] = 'Specialties';
$route['admin-specialties'] = 'Specialties';
$route['(ar|en)/admin-specialties/(:any)'] = 'Specialties/$1';
$route['admin-specialties/(:any)'] = 'Specialties/$1';
$route['(ar|en)/specialties-person/(:any)/(:any)']= 'Specialties/$1/$2';
$route['admin-specialties/(:any)/(:any)']= 'Specialties/$1/$2';
//---------------  person    ----------------------
$route['(ar|en)/admin-provider'] = 'Provider';
$route['admin-provider'] = 'Provider';
$route['(ar|en)/admin-provider/(:any)'] = 'Provider/$1';
$route['admin-provider/(:any)'] = 'Provider/$1';
$route['(ar|en)/admin-provider/(:any)/(:any)']= 'Provider/$1/$2';
$route['admin-provider/(:any)/(:any)']= 'Provider/$1/$2';
$route['(ar|en)/admin-provider/(:any)/(:any)/(:any)']= 'Provider/$1/$2/$3';
$route['admin-provider/(:any)/(:any)/(:any)']= 'Provider/$1/$2/$3';
//---------------  order    ----------------------
$route['(ar|en)/admin-orders'] = 'Order';
$route['admin-orders'] = 'Order';

$route['(ar|en)/admin-orders/new'] = 'Order/ordersNew';
$route['admin-orders/new'] = 'Order/ordersNew';

$route['(ar|en)/admin-orders/current'] = 'Order/ordersCurrent';
$route['admin-orders/current'] = 'Order/ordersCurrent';

$route['(ar|en)/admin-orders/old'] = 'Order/ordersOld';
$route['admin-orders/old'] = 'Order/ordersOld';

$route['(ar|en)/admin-orders/one/(:num)'] = 'Order/order/$1';
$route['admin-orders/one/(:num)'] = 'Order/order/$1';

$route['(ar|en)/admin-orders/delete/(:any)'] = 'Order/delete/$1';
$route['admin-orders/delete/(:any)'] = 'Order/delete/$1';

$route['(ar|en)/admin-orders/client'] = 'Order/clientOrders';
$route['admin-orders/client'] = 'Order/clientOrders';

$route['(ar|en)/admin-orders/client-ordrs/(:any)'] = 'Order/getClientOrders/$1';
$route['admin-orders/client-ordrs/(:any)'] = 'Order/getClientOrders/$1';

$route['(ar|en)/admin-orders/provider'] = 'Order/providerOrders';
$route['admin-orders/provider'] = 'Order/providerOrders';

$route['(ar|en)/admin-orders/provider-ordrs/(:any)'] = 'Order/getProviderOrders/$1';
$route['admin-orders/provider-ordrs/(:any)'] = 'Order/getProviderOrders/$1';

$route['(ar|en)/admin-orders/reply/(:num)'] = 'Order/reply/$1';
$route['admin-orders/reply/(:num)'] = 'Order/reply/$1';

$route['(ar|en)/admin-orders/doReply'] = 'Order/doReply';
$route['admin-orders/doReply'] = 'Order/doReply';


//---------------  accounts    ----------------------
$route['(ar|en)/admin-accounts'] = 'Accounts';
$route['admin-accounts'] = 'Accounts';
$route['(ar|en)/admin-accounts/(:any)'] = 'Accounts/$1';
$route['admin-accounts/(:any)'] = 'Accounts/$1';
$route['(ar|en)/admin-accounts/(:any)/(:any)']= 'Accounts/$1/$2';
$route['admin-accounts/(:any)/(:any)']= 'Accounts/$1/$2';

//---------------  slider    ----------------------
$route['(ar|en)/admin-coupons'] = 'Coupons';
$route['admin-coupons'] = 'Coupons';
$route['(ar|en)/admin-coupons/(:any)'] = 'Coupons/$1';
$route['admin-coupons/(:any)'] = 'Coupons/$1';
$route['(ar|en)/admin-coupons/(:any)/(:any)']= 'Coupons/$1/$2';
$route['admin-coupons/(:any)/(:any)']= 'Coupons/$1/$2';
//---------------  slider    ----------------------
$route['(ar|en)/admin-announcer'] = 'Announcer';
$route['admin-announcer'] = 'Announcer';
$route['(ar|en)/admin-announcer/(:any)'] = 'Announcer/$1';
$route['admin-announcer/(:any)'] = 'Announcer/$1';
$route['(ar|en)/admin-announcer/(:any)/(:any)']= 'Announcer/$1/$2';
$route['admin-announcer/(:any)/(:any)']= 'Announcer/$1/$2';


/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */

$route['(ar|en)/pp-products'] = 'market/AppSlider';
$route['app-slider'] = 'market/AppSlider';
$route['(ar|en)/app-slider/(:any)'] = 'market/AppSlider/$1';
$route['app-slider/(:any)'] = 'market/AppSlider/$1';
$route['(ar|en)/app-slider/(:any)/(:any)']= 'market/AppSlider/$1/$2';
$route['app-slider/(:any)/(:any)']= 'market/AppSlider/$1/$2';
//==============================================================
$route['(ar|en)/app-main-dep'] = 'market/MainDep';
$route['app-main-dep'] = 'market/MainDep';
$route['(ar|en)/app-main-dep/(:any)'] = 'market/MainDep/$1';
$route['app-main-dep/(:any)'] = 'market/MainDep/$1';
$route['(ar|en)/app-main-dep/(:any)/(:any)']= 'market/MainDep/$1/$2';
$route['app-main-dep/(:any)/(:any)']= 'market/MainDep/$1/$2';
//==============================================================
$route['(ar|en)/app-sub-dep'] = 'market/SubDep';
$route['app-sub-dep'] = 'market/SubDep';
$route['(ar|en)/app-sub-dep/(:any)'] = 'market/SubDep/$1';
$route['app-sub-dep/(:any)'] = 'market/SubDep/$1';
$route['(ar|en)/app-sub-dep/(:any)/(:any)']= 'market/SubDep/$1/$2';
$route['app-sub-dep/(:any)/(:any)']= 'market/SubDep/$1/$2';
//==============================================================
$route['(ar|en)/app-product-campanies'] = 'market/ProductsCampanies';
$route['app-product-campanies'] = 'market/ProductsCampanies';
$route['(ar|en)/app-product-campanies/(:any)'] = 'market/ProductsCampanies/$1';
$route['app-product-campanies/(:any)'] = 'market/ProductsCampanies/$1';
$route['(ar|en)/app-product-campanies/(:any)/(:any)']= 'market/ProductsCampanies/$1/$2';
$route['app-product-campanies/(:any)/(:any)']= 'market/ProductsCampanies/$1/$2';
//==============================================================
$route['(ar|en)/app-products-partners'] = 'market/ProductsPartners';
$route['app-products-partners'] = 'market/ProductsPartners';
$route['(ar|en)/app-products-partners/(:any)'] = 'market/ProductsPartners/$1';
$route['app-products-partners/(:any)'] = 'market/ProductsPartners/$1';
$route['(ar|en)/app-products-partners/(:any)/(:any)']= 'market/ProductsPartners/$1/$2';
$route['app-products-partners/(:any)/(:any)']= 'market/ProductsPartners/$1/$2';
//==============================================================
$route['(ar|en)/app-prices-countries'] = 'market/PricesCountries';
$route['app-prices-countries'] = 'market/PricesCountries';
$route['(ar|en)/app-prices-countries/(:any)'] = 'market/PricesCountries/$1';
$route['app-prices-countries/(:any)'] = 'market/PricesCountries/$1';
$route['(ar|en)/app-prices-countries/(:any)/(:any)']= 'market/PricesCountries/$1/$2';
$route['app-prices-countries/(:any)/(:any)']= 'market/PricesCountries/$1/$2';
//==============================================================
$route['(ar|en)/app-products'] = 'market/Product';
$route['app-products'] = 'market/Product';
$route['(ar|en)/app-products/(:any)'] = 'market/Product/$1';
$route['app-products/(:any)'] = 'market/Product/$1';
$route['(ar|en)/app-products/(:any)/(:any)']= 'market/Product/$1/$2';
$route['app-products/(:any)/(:any)']= 'market/Product/$1/$2';
$route['(ar|en)/app-products/(:any)/(:any)/(:any)']= 'market/Product/$1/$2/$3';
$route['app-products/(:any)/(:any)/(:any)']= 'market/Product/$1/$2/$3';
//==============================================================
$route['(ar|en)/app-news'] = 'market/News';
$route['app-news'] = 'market/News';
$route['(ar|en)/app-news/(:any)'] = 'market/News/$1';
$route['app-news/(:any)'] = 'market/News/$1';
$route['(ar|en)/app-news/(:any)/(:any)']= 'market/News/$1/$2';
$route['app-news/(:any)/(:any)']= 'market/News/$1/$2';
$route['(ar|en)/app-news/(:any)/(:any)/(:any)']= 'market/News/$1/$2/$3';
$route['app-news/(:any)/(:any)/(:any)']= 'market/News/$1/$2/$3';
//==============================================================
$route['(ar|en)/app-orders'] = 'market/Order';
$route['app-orders'] = 'market/Order';
$route['(ar|en)/app-orders/(:any)'] = 'market/Order/$1';
$route['app-orders/(:any)'] = 'market/Order/$1';
$route['(ar|en)/app-orders/(:any)/(:any)']= 'market/Order/$1/$2';
$route['app-orders/(:any)/(:any)']= 'market/Order/$1/$2';
$route['(ar|en)/app-orders/(:any)/(:any)/(:any)']= 'market/Order/$1/$2/$3';
$route['app-orders/(:any)/(:any)/(:any)']= 'market/Order/$1/$2/$3';
