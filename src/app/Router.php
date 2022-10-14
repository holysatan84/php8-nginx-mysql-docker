<?php

  namespace App;

  use App\Exception\Container\ContainerException;
  use App\Exception\RouteNotFoundException;

  class Router
  {
    private array $routes = [];


    public function __construct(private Container $container)
    {
    }

    public function register(string $requestType, string $route, callable|array $action): self
    {
      $this->routes[$requestType][$route] = $action;

      return $this;
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

    public function resolve(string $requestUri, string $requestMethod)
    {
      $route = explode('?', $requestUri)[0];
      $action = $this->routes[$requestMethod][$route] ?? null;

      if (! $action) {
        throw new RouteNotFoundException();
      }

      if (is_callable($action)) {
        return call_user_func($action);
      }

      [$class, $method] = $action;

      if (class_exists($class)) {
        $class = $this->container->get($class);

        if (method_exists($class, $method)) {
          return call_user_func_array([$class, $method], []);
        }
      }

      throw new RouteNotFoundException();
    }
  }
