<?php

/**
 * El controlador Home.
 *
 * PHP versión 7
 *
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Home extends Controller
{

    /**
     * Página principal.
     * Se encarga de mostrar la información asociada a la dirección ://tuproyecto/Home (por defecto).
     *
     * @return void
     */
    public function index()
    {

        echo $this->view->render("home/index", [
            'titulo' => 'Estás en el HOME.',
            'descripcion' => 'Y esta es una descripción.'
        ]);

    }
} // Fin Home.
