<?php
namespace App;
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
 
class Router
{
	
	private $params;
		
	private $controller;
	
	private $action;
	
	public static $separator = '/';
	
	public static $url = '_url';
	
	public static $GET = false;
	
	public static $SECURE_GET = true;
	
	public static $VALIDATE_CLASS = false;

	public function __construct() {
		
		if(false === Router::$GET) {
			Router::$GET = $_GET;
			if(true === Router::$SECURE_GET) {
				$_GET = array();
			}
		}
		$path = isset(Router::$GET[Router::$url]) ? trim(Router::$GET[Router::$url]) : 'index/index';
		
		$exploded = explode(Router::$separator, $path);
		
		$params = array();
		
		foreach($exploded as $v) {
			
			if(trim($v)) {
				
				$params[] = $v;
				
			}
			
		}

		if(!isset($params[0])) {
			
			$params[0] = 'index';
			
		}
		
		if(!isset($params[1])) {
			
			$params[1] = 'index';
			
		}
		
		foreach(Router::$GET as $k => $v) {
			$params[$k] = $v;
		}
		
		if(isset($params[Router::$url])) {
			unset($params[Router::$url]);
		}
		
		$this->controller = array_shift($params);
		
		$this->action = array_shift($params);
		
		$this->params = $params;
				
	}

	public function getControllerName() : string {
		return (string) $this->controller;
	}
	public function setControllerName(string $controller) : string {
		 $this->controller = $controller;
		 return (string) $this->controller;
	}
	public function getActionName() : string {
		return (string) $this->action;
	}
	public function setActionName(string $action) : string {
		$this->action = $action;
		return $this->action;
	}
	public function getParams() : array {
		return (array) $this->params;
	}
	public function getParam($num = null, $validate = null) {
		$result = false;
		if(null === $num) {
			$result = isset($this->params[0]) ? array_shift($this->params) : false;
		}
		if(is_numeric($num)) {
			$result = isset($this->params[$num]) ? (string) $this->params[$num] : false;
		} else {
			$result = isset($this->params[$num]) ? $this->params[$num] : false;
		}
		
		if(null !== $validate && false !== Router::$VALIDATE_CLASS) {
			if(method_exists(Router::$VALIDATE_CLASS, $validate)) {
				return true == Router::$VALIDATE_CLASS->$validate($result) ? $result : false;
			}
		}
		return $result;
	}
	public static function getRequestArray() {
		if(false === Router::$GET) {
			Router::$GET = $_GET;
		}
		return Router::$GET;
	}
	public function refresh() {
		return $this->__construct();
	}
	public static function setRoutingVariable(string $variable) {
		Router::$url = $variable;
	}
	public static function setSeparator(string $separator) {
		Router::$separator = $separator;
	}
	public static function setSecure(int $type = 1) {
		if(0 === $type) {
			if(false !== Router::$GET) {
				$_GET = Router::$GET;
			}
		} elseif(1 === $type) {
			if(false === Router::$GET) {
				Router::$GET = $_GET;
			}
			$_GET = array();
		}
		Router::$SECURE_GET = $type === 0 ? false : true;
	}
	/**
	 * @param string $class name of class that will be used as validator for params
	 * @return void
	 * */
	public static function setValidator(string $class) {
		if(class_exists($class)) {
			Router::$VALIDATE_CLASS = new $class;
		}
	}
}
