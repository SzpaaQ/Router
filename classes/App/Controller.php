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

namespace App;

class Controller {
	
	protected $router;
	
	protected $request;
	
	public function __construct( array $params = array() ) {
		$this->router = isset($params['router']) ? $params['router'] : new Router;
	}
	
}
