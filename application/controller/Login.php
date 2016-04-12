<?php

/**
 * El controlador Login.
 *
 * PHP versión 7
 *
 * @category  Login
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Login extends Controller
{

    /**
     * Página principal.
     * Se encarga de mostrar la información asociada a la dirección ://tuproyecto/Login
     *
     * @return void
     */
    public function index()
    {
        echo $this->view->render('login/index');
    }

    /**
     * Comprueba si el usuario está o no logueado y le envía a la página correspondiente.
     *
     * @return void
     */
    public function dologin()
    {

        if (LoginModel::dologin($_POST)) {
            if ($origen = Session::get('origen')) {
                Session::set('origen', null);
                header('location:' . $origen);
                exit();
            } else {
                echo $this->view->render('login/usuarioLogueado');
            }
        } else {
            echo $this->view->render('login/index');
            exit(); // Recomendable.
        }

    }

    /**
     * Cierra la sesión abierta del usuario.
     *
     * @return void
     */
    public function salir()
    {
        Session::destroy();
        header('location: /');
        exit();
    }
} // Fin Login.
