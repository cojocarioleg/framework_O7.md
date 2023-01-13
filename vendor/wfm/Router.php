<?php

namespace wfm;

use Exception;

class Router
{
	protected static array $routes=[];
	protected static array $route=[];

	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route;
	}

	public static function getRoutes(): array
	{
		return self::$routes;
	}

	public static function getRoute(): array
	{
		return self::$route;
	}	

	public static function removeQueryString($url)
	{
		if ($url) {
			$params = explode('&', $url, 2);
			if(false === str_contains($params[0], '=')){
				return rtrim($params[0], '/');
			}
		} 
		
	}

	public static function dispatch($url)
	{
		$url = self::removeQueryString($url);

		if(self::matchRoute($url)){			
			$controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
			if(class_exists($controller)){
				/**@var Controller $controllerObject */
				$controllerObject = new $controller(self::$route);	
					
				$controllerObject->getModel();
				
				$action = self::loverCamelCase(self::$route['action'] . 'Action');
								
				if (method_exists($controllerObject, $action)) {
					$controllerObject->$action();
					$controllerObject->getView();
					
				} else {
					throw new Exception("action {$controller}::{$action} is not found" , 404);
				}				
				
			}else{
				throw new Exception("controller {$controller} is not found" , 404);
			}


		} else{
			throw new Exception('page is not found' , 404);
		}
	}

	public static function matchRoute($url): bool
	{
		foreach(self::$routes as $pattern => $route){
			if(preg_match("#{$pattern}#", $url, $matches)){
				foreach ($matches as $k => $v){
					if(is_string($k)){
						$route[$k] = $v;
					}
				}
				if(empty($route['action'])){
					$route['action'] = 'index';
				}
				if(!isset($route['admin_prefix'])){
					$route['admin_prefix'] = '';
				} else{
					$route['admin_prefix'] .= '\\';
				}
				
				$route['controller'] = self::upperCamelCase($route['controller']) ;
				self::$route = $route;
				return true;

			}
		}
		return false;
	}

	//Camel Case 
	protected static function upperCamelCase($name): string 
	{
		/*
		//'camel-case' => 'camel case'
		$name = str_replace('-', ' ', $name);
		//'camel case' => 'Camel Case'
		$name = ucwords($name);		
		//'Camel Case' => 'CamelCase'
		$name = str_replace(' ', '', $name);
		return $name;
		*/

		return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));		
	} 

	//camel Case 
	protected static function loverCamelCase($name): string 
	{		
		return lcfirst(self::upperCamelCase($name));		
	} 
}