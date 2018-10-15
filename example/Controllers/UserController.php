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
define("BREAK_LINE", '<br /> <br />');

class UserController extends App\Controller {
	
	public function editAction() {
		/*
		 * $_GET = array(
		 * 'route' => '/user/edit/45/SzpaaQ',
		 * 	'other_param' => 'this is some other param'
		 * );
		 * 
		 * our url is http://localhost/index.php?route=/user/edit/45/SzpaaQ?other_param=this%20is%20other%20param
		 * 
		 * or if we set Rewrite rule in htaccess:
		 * RewriteRule ^(.*)$ index.php?route=/$1 [QSA,L]
		 * http://localhost/user/edit/45/SzpaaQ?other_param=this%20is%20other%20param
		 * */

		// get First param
		var_dump($this->router->getParam(0)); // this is user_id (45)
		
		echo BREAK_LINE;
		
		var_dump($this->router->getParam(1)); // this is username (SzpaaQ)
		echo BREAK_LINE;

		var_dump($this->router->getParam('other_param')); // this is other param (this is some other param)
		echo BREAK_LINE;

		while($param = $this->router->getParam()) {
			// print all unnamed parameters (45, SzpaaQ)
			echo $param.PHP_EOL;
			echo BREAK_LINE;

		}
		
		// refresh params
		$this->router->refresh();
		
		var_dump($this->router->getParams());// get all parameters array(0=>45, 1=>'SzpaaQ', 'other_param' => 'this is some other param');
		echo BREAK_LINE;

		// since $_GET secure is on it will return empty array
		var_dump($_GET); 
		echo BREAK_LINE;

		// restore access to $_GET variable
		App\Router::setSecure(0); 
		
		// array before hiding it
		// array('route' => "/user/edit/45/SzpaaQ", "other_param" => "this is some other param");
		var_dump($_GET); 
		echo BREAK_LINE;

		// enable secure $_GET again 
		App\Router::setSecure(0); 
		
		// $_GET content
		// array('route' => "/user/edit/45/SzpaaQ", "other_param" => "this is some other param");
		var_dump(App\Router::getRequestArray());
		echo BREAK_LINE;



	}
	public function indexAction() {
		
	}
}
