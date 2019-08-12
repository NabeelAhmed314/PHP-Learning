<?php
namespace App\core;

    class Router {
        protected $routes = [
            'GET' => [],
            'POST' => []
        ];

        public function get($uri,$controller)
        {
            $this->routes['GET'][$uri]= $controller;
        }

        public function post($uri,$controller)
        {
            $this->routes['POST'][$uri]= $controller;
        }

        public static function load($file){
            $router = new static;
            require $file;
            return $router;
        }

        public function direct($uri,$requestType){
            
            if(array_key_exists($uri,$this->routes[$requestType])){
                return $this->callAction(...explode('@',$this->routes[$requestType][$uri]));
            }
            throw new Exception("No Routes Defined for this url");
        }

        protected function callAction($controller, $action){
            $controller = "App\\controllers\\{$controller}";
            
            $controller = new $controller;
            if(!method_exists($controller,$action)){
                throw new Exception("No Action", 1);                
            }
            return $controller->$action();
        }
    }