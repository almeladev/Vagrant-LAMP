<?php

class Controller
{
    public $view = null;

    function __construct(View $view)
    {
        $this->view = $view;
        Session::init();
    }
}
