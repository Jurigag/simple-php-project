<?php

namespace Simpleproject\Controllers;

use Simpleproject\View;

class IndexController
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function indexAction()
    {
        $viewParams = [
            'auth' => isset($_SESSION['auth']) ? $_SESSION['auth'] : false,
            'isAdmin' => isset($_SESSION['user']) ? $_SESSION['user'] == 'admin' : false,
            'isModerator' => isset($_SESSION['user']) ? $_SESSION['user'] == 'moderator' : false
        ];

        return $this->view->render('index', $viewParams);
    }
}
