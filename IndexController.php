<?php

namespace Simpleproject;

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
            'auth' => $_SESSION['auth'] ?? false,
            'isAdmin' => isset($_SESSION['user']) ? $_SESSION['user'] == 'admin' : false,
            'isModerator' => isset($_SESSION['user']) ? $_SESSION['user'] == 'moderator' : false
        ];

        return $this->view->render('home', $viewParams);
    }
}
