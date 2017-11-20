<?php
class Router {
    private $controller;
	public function __construct($controller){
        $this->controller = $controller;        
	}
}