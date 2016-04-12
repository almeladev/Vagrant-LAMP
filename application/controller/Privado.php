<?php

/**
 * El controlador Privado.
 *
 * PHP versión 7
 *
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Privado extends Controller
{

    /**
     * Constructor de Privado.
     *
     * @param View $view [Variable de tipo Vista]
     */
    public function __construct(View $view)
    {
        parent::__construct($view);
        Auth::checkAutentication(); // Requiere autenticación.
    }

    /**
     * Página principal.
     * Se encarga de mostrar la información asociada a la dirección ://tuproyecto/Privado
     *
     * @return void
     */
    public function index()
    {
        echo $this->view->render("privado/index");
    }
} // Fin Privado.
