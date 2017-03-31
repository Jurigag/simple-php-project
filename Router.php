<?php

namespace Simpleproject;

class Router
{
    protected $routes = [];
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function addRoute($pattern, $handler)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = $handler;
    }

    public function handle($uriSource)
    {
        foreach ($routes as $pattern => $value) {
            if (preg_match($pattern, $uriSource, $params)) {
                $handler = new $value[0]($this->view);
                echo call_user_func_array([$handler, $value[1]], $params);
            }
        }
    }
}