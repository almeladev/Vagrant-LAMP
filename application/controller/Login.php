<?php

class Login extends Controller{

    public function index()
    {

        echo $this->view->render('login/index');

    }

    public function dologin()
    {

        if(LoginModel::dologin($_POST)){

            if($origen = Session::get('origen')){ 
                Session::set('origen', null); 
                header ('location:' . $origen); 
                exit(); 
            }else{
                echo $this->view->render('login/usuarioLogueado');
            }

        } else {

            echo $this->view->render('login/index');

        }

    }

    public function salir()
    {

        Session::destroy();
        header('location: /');
        exit();

    }


}
