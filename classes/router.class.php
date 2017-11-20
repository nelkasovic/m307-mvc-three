<?php

class Request {

    private $method;
    private $path;

    function __construct($method, $path) {
        $this->method = $method;
        $this->path = $path;
    }

    function getMethod() {
        return $this->method;
    }

    function getPath() {
        return $this->path;
    }

}


class Router {
    private $controller;
    private $routes = [
        'get' => [],
        'post' => [],
        'help' => [],
        'test' => []
    ];

    function __construct(Controller $controller) {
        $this->controller = $controller;
    }


    function get($pattern, callable $handler) {
        $this->routes['get'][$pattern] = $handler;
        return $this;
    }

    function post($pattern, callable $handler) {
        $this->routes['post'][$pattern] = $handler;
        return $this;
    }

    function help($pattern, callable $handler) {
        $this->routes['help'][$pattern] = $handler;
        return $this;
    }

    function test($pattern, callable $handler) {
        $this->routes['test'][$pattern] = $handler;
        return $this;
    }


    function match(Request $request) {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            return false;
        }

        $path = $request->getPath();
        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }

        return false;
    }

}

class Dispatcher {

    private $router;

    function __construct(Router $router) {
        $this->router = $router;
    }

    function handle(Request $request) {
        $handler = $this->router->match($request);
        if (!$handler) {
            echo "Could not find your resource!\n";
            return;
        }

        $handler();
    }

}

    //$router->post('bar', function() { echo "POST bar\n"; });
    //$router->get('help', $controller->getData());

    
    //$dispatcher->handle(new Request('POST', 'bar'));
    //$dispatcher->handle(new Request('GET', 'help'));
