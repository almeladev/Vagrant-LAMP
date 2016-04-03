<?php

class Privado extends Controller
{
    public function __construct(View $view)
    {
        parent::__construct($view);
        Auth::checkAutentication();
    }

    public function index()
    {
        echo $this->view->render("privado/index");
    }
}