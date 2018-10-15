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


class Controller {
	
	// This class has been created for testing purpose of Router Class
	protected $router;
		
	public function __construct( array $params = array() ) {
		$this->router = isset($params['router']) ? $params['router'] : new Router;
	}
	
}
