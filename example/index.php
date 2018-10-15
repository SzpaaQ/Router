<?php

/**
 * 
 * LICENCE
 * ALL RIGHTS RESERVED.
 * YOU ARE NOT ALLOWED TO COPY/EDIT/SHARE/WHATEVER.
 * IN CASE OF ANY PROBLEM CONTACT AUTHOR.
 * @author    Łukasz Szpak (szpaaaaq@gmail.com)
 * @Copyright 2018 SzpaQ
 * @license   ALL RIGHTS RESERVED
 *
 * * */

include 'loader.php';
// These two was created for the testing purpose of App\Router class (same as UserController and autoloader)
require 'classes/Validate.php';
require 'classes/Controller.php';

// OPTIONAL set route string
// default value is _url
App\Router::setRoutingVariable('route');


// OPTIONAL set Validate class
App\Router::setValidator('Validate');

$_GET = array(
	'route' => 'user/edit/45/SzpaaQ'
);

// create Router object
$router = new App\Router;
// let's get controller name
$controller = ucfirst($router->getControllerName()).'Controller';
// and action name
$action = $router->getActionName() .'Action';

// check if controller and action exists and call it in case of its true
if(class_exists($controller)) {
	// We have created controller class for the testing purpose it will create router object or get it from array given in contructor
	$controller = new $controller(array('router' => $router));
	if(method_exists($controller, $action)) {
		$controller->$action(); // check Controllers/UserController.php
	}
	// in case of there was not found such method you can redirect it for example to error page
	
}


