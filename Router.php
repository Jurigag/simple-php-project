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
        $pattern = '/^'.str_replace('/', '\/', $pattern).'$/';
        $this->routes[$pattern] = $handler;
    }

    public function handle($url, $baseUri = "")
    {
        if ($baseUri) {
            $url = str_replace($baseUri, "", $url);
        }
        /**
         * EN: Direct match
         * PL: Bezpośrednie powiązanie
         */
        if (isset($this->routes[$url])) {
            $route = $this->routes[$url];
            $handler = new $route[0]($this->view);

            return call_user_func_array([$handler, $route[1]], $params);
        }
        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $url, $params)) {
                $handler = new $route[0]($this->view);

                return call_user_func_array([$handler, $route[1]], $params);
            }
        }
    }
}