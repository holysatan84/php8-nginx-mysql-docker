<?php

namespace App;

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;

        return  $this;
    }

    public function resolve(string $stringUrl)
    {
        $route = explode("?",$stringUrl)[0];
        $action = $this->routes[$route] ?? null;

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