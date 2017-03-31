<?php

namespace Simpleproject;

class View
{
    protected $viewDir = "views";

    public function render($name, array $viewParams = [])
    {
        if  (!empty($viewParams)) {
            foreach($viewParams as $key => $value) {
                $this->{$key} = $value;
            }
        }
        ob_start();
        require $this->viewDir.DIRECTORY_SEPARATOR.$name.".phtml";
        return ob_get_clean();
    }
}