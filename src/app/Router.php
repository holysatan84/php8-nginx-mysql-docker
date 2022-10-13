<?php

namespace App;

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $requestType, string $route, callable|array $action): self
    {
        $this->routes[$requestType][$route] = $action;

        return  $this;
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function resolve(string $stringUrl, string $requestType = null)
    {
//        echo $requestType; die;
        $route = explode("?",$stringUrl)[0];
        $action = $this->routes[$requestType][$route] ?? null;

        if(! $action) {
            throw new RouteNotFoundException();
        }
        if(is_callable($action)) {
            return call_user_func($action);
        }

        if(is_array($action)){
            [$class, $method] = $action;

            if(class_exists($class)) {
                $classObj = new $class();
                if(method_exists($classObj, $method)) {
                    return call_user_func_array([$classObj, $method], []);
                }
            }
        }
         throw new RouteNotFoundException();
        }
}