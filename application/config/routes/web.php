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
//--------------- home   ---------------------------
$route['ar'] = 'Web';
$route['en'] = 'Web';
$route['es'] = 'Web';
$route['home'] = 'Web';
$route['(ar|en|es)/home'] = 'Web';
//--------------- about   ---------------------------
$route['about'] = 'Web/about';
$route['(ar|en|es)/about'] = 'Web/about';
//--------------- parteners   ---------------------------
$route['parteners'] = 'Web/parteners';
$route['(ar|en|es)/parteners'] = 'Web/parteners';
//--------------- suppliers   ---------------------------
$route['suppliers'] = 'Web/suppliers';
$route['(ar|en|es)/suppliers'] = 'Web/suppliers';
//--------------- home-care   ---------------------------
$route['home-care'] = 'Web/homeCare';
$route['(ar|en|es)/home-care'] = 'Web/homeCare';
//--------------- home-care   ---------------------------
$route['medical-tourism'] = 'Web/medicalTourism';
$route['(ar|en|es)/medical-tourism'] = 'Web/medicalTourism';
//--------------- home-care   ---------------------------
$route['contact-us'] = 'Web/contactUs';
$route['(ar|en|es)/contact-us'] = 'Web/contactUs';
//--------------- home-care   ---------------------------
$route['sub-service/(:any)'] = 'Web/getSubService/$1';
$route['ar/sub-service/(:any)'] = 'Web/getSubService/$1';
$route['en/sub-service/(:any)'] = 'Web/getSubService/$1';
$route['es/sub-service/(:any)'] = 'Web/getSubService/$1';
//--------------- make-order   ---------------------------
$route['make-order/(:any)'] = 'Web/makeOrder/$1';
$route['ar/make-order/(:any)'] = 'Web/makeOrder/$1';
$route['en/make-order/(:any)'] = 'Web/makeOrder/$1';
$route['es/make-order/(:any)'] = 'Web/makeOrder/$1';
//--------------- create-order   ---------------------------
$route['create-order'] = 'Web/createOrder';
$route['(ar|en|es)/create-order'] = 'Web/createOrder';
//--------------- register   ---------------------------
$route['register'] = 'Web/register';
$route['(ar|en|es)/register'] = 'Web/register';
//--------------- register   ---------------------------
$route['user-register']["POST"] = 'Web/userRegister';
$route['(ar|en|es)/user-register']["POST"] = 'Web/userRegister';

$route['specialization/(:any)']["GET"] = 'Web/specialization/$1';
$route['(ar|en|es)/specialization/(:any)']["GET"] = 'Web/specialization/$1';
//--------------- register   ---------------------------
$route['provider-register']["POST"] = 'Web/providerRegister';
$route['(ar|en|es)/provider-register']["POST"] = 'Web/providerRegister';
//--------------- register   ---------------------------
$route['profile/(:any)'] = 'Web/profile/$1';
$route['en/profile/(:any)'] = 'Web/profile/$1';
$route['ar/profile/(:any)'] = 'Web/profile/$1';
$route['es/profile/(:any)'] = 'Web/profile/$1';
//--------------- register   ---------------------------
$route['web-login'] = 'Web/login';
$route['(ar|en|es)/web-login'] = 'Web/login';
$route['web-logout'] = 'Web/logout';
$route['(ar|en|es)/web-logout'] = 'Web/logout';
//--------------- register   ---------------------------
$route['web-auth'] = 'Web/authLogin';
$route['(ar|en|es)/web-auth'] = 'Web/authLogin';
//--------------- register   ---------------------------
$route['accept-order'] = 'Web/acceptOrder';
$route['ar/accept-order'] = 'Web/acceptOrder';
$route['en/accept-order'] = 'Web/acceptOrder';
$route['es/accept-order'] = 'Web/acceptOrder';
//--------------- register   ---------------------------
$route['refuse-order'] = 'Web/refuseOrder';
$route['ar/refuse-order'] = 'Web/refuseOrder';
$route['en/refuse-order'] = 'Web/refuseOrder';
$route['es/refuse-order'] = 'Web/refuseOrder';
//--------------- register   ---------------------------
$route['client-end-order'] = 'Web/clientEndOrder';
$route['ar/client-end-order'] = 'Web/clientEndOrder';
$route['en/client-end-order'] = 'Web/clientEndOrder';
$route['es/client-end-order'] = 'Web/clientEndOrder';
//--------------- register   ---------------------------
$route['update-profile/(:any)'] = 'Web/updateProfile/$1';
$route['ar/update-profile/(:any)'] = 'Web/updateProfile/$1';
$route['en/update-profile/(:any)'] = 'Web/updateProfile/$1';
$route['es/update-profile/(:any)'] = 'Web/updateProfile/$1';
//--------------- order-details   ---------------------------
$route['order-details/(:any)'] = 'Web/orderDetails/$1';
$route['ar/order-details/(:any)'] = 'Web/orderDetails/$1';
$route['en/order-details/(:any)'] = 'Web/orderDetails/$1';
$route['es/order-details/(:any)'] = 'Web/orderDetails/$1';

//--------------- order-details   ---------------------------
$route['buy/(:any)'] = 'Web/buy/$1';
$route['ar/buy/(:any)'] = 'Web/buy/$1';
$route['en/buy/(:any)'] = 'Web/buy/$1';
$route['es/buy/(:any)'] = 'Web/buy/$1';


//================================================================
$route['register-agent'] = 'Login/registerAgent';
$route['create-register-agent'] = 'Login/createRegisterAgent';




