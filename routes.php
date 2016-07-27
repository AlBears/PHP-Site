<?php

//register routes
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET','/verify-account', 'Acme\Controllers\RegisterController@getVerifyAccount', 'verify_account');

//testimonial routes
$router->map('GET','/testimonials', 'Acme\Controllers\TestimonialController@getShowTestimonials', 'testimonials');

//testimonial logged in users routes
if(Acme\Auth\LoggedIn::user()){ 
$router->map('GET','/add-testimonial', 'Acme\Controllers\TestimonialController@getShowAdd', 'add_testimonial');
$router->map('POST','/add-testimonial', 'Acme\Controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
}

//login logout routes
$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogout', 'logout');

//admin routes
if((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2)){ 
	$router->map('POST', '/admin/page/edit', 'Acme\controllers\AdminController@postSavePage', 'save_page');
    $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
}

//page routes
$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page');


