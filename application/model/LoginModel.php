<?php

class LoginModel
{

    public static function dologin($datos)
    {
        if(!$datos){

            Session::add('feedback_negative', 'No tengo los datos de Login');
            return false;
        }
        if(empty($datos['clave'])){

            Session::add('feedback_negative', 'No se ha indicado la clave');

        }

        if(empty($datos['email'])){

            Session::add('feedback_negative', 'No se ha indicado el email');

        }

        if(Session::get('feedback_negative')){

            return false;

        }

        $datos['email'] = trim($datos['email']);
        if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)){
            Session::add('feedback_negative', 'El Email no es válido');
        }
        if(strlen($datos['clave']) < 4){
            Session::add('feedback_negative', 'La clave debe tener 4 o más caracteres');
        }
        if(Session::get('feedback_negative')){

            return false;

        }

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT nombre, id_usuario, id_perfil, pass FROM usuario WHERE login=:email";
        $query = $conn->prepare($ssql);
        $query->bindValue(':email', $datos['email'], PDO::PARAM_STR);
        $query->execute();

        $cuantos = $query->rowCount();
        if($cuantos != 1){
            Session::add('feedback_negative', 'No estás registrado');
            return false;
        }

        $usuario = $query->fetch();
        if($usuario->pass != md5($datos['clave'])){
            Session::add('feedback_negative', 'La clave no coincide');
            return false;
        }

        Session::set('user_id', $usuario->id_usuario);
        Session::set('user_name', $usuario->nombre);
        Session::set('user_email', $datos['email']);
        Session::set('user_logged_in', true);
        
        return true;

    }

}