<?php

/**
 * El controlador Errores.
 *
 * PHP versión 7
 *
 * @category  Errores
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Errores extends Controller
{
    /**
     * Mensaje de error.
     * @var [String]
     */
    private $msg;

    /**
     * Constructor de Errores.
     *
     * @param View   $view [Variable de tipo Vista]
     * @param string $msg  [Mensaje del error]
     * @return void
     */
    public function __construct(View $view, $msg = "")
    {
        parent::__construct($view);
        $this->msg = $msg;
    }

    /**
     * Muestra el mensaje de error el la página de errores.
     *
     * @param View   $view [Variable de tipo Vista]
     * @param string $msg  [Mensaje del error]
     * @return void
     */
    public function index()
    {
        echo $this->view->render('error/index', array(
            'msg' => $this->msg
        ));
    }
} // Fin Errores.
