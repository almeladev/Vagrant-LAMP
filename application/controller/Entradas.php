<?php

/**
 * El controlador Entradas.
 *
 * PHP versión 7
 *
 * @category  Entradas
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Entradas extends Controller
{

    /**
     * Envía a la vista todas las entradas que existan.
     *
     * @return void
     */
    public function index()
    {
        $entradas = EntradasModel::todas();
        echo $this->view->render('entradas/index', array('entradas' => $entradas));
    }

    /**
     * Muestra al modelo los datos de la nueva entrada y comprueba su insercción.
     *
     * @return void
     */
    public function crear()
    {

        Auth::checkAutentication(); // Comprobar autenticación.

        if (!$_POST) {
            echo $this->view->render('entradas/formularioEntrada');
        } else {
            if (!isset($_POST["titulo"])) {
                $_POST["asunto"] = "";
            }
            if (!isset($_POST["cuerpo"])) {
                $_POST["cuerpo"] = "";
            }

            $datos = array(
                'titulo' => $_POST["titulo"],
                'cuerpo' => $_POST["cuerpo"]
            );

            if (EntradasModel::insertarEntrada($datos)) {
                echo $this->view->render('entradas/entradaInsertada');
            } else {
                echo $this->view->render('entradas/formularioEntrada', array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }

    /**
     * Indica al modelo los datos de la entrada que se va a eliminar.
     *
     * @param  integer $id [id de la entrada]
     * @return void
     */
    public function borrar($id = 0)
    {
        /**
         * borrar también los comentarios asociados a las entradas ;) -PENDIENTE
         */
        Auth::checkAutentication(); // Comprobar autenticación.

        $entrada = EntradasModel::getId($id);
        if (isset($entrada)) {
            EntradasModel::borrarEntrada($entrada->id_entrada);
        } else {
            echo "No se puede borrar la entrada, porque no existe.";
        }

    }

    /**
     * Indica al modelo los datos de la entrada que se va a editar. También
     * comprueba si ha habido éxito.
     *
     * @param  integer $id [id de la entrada]
     * @return void
     */
    public function editar($id = 0)
    {

        Auth::checkAutentication(); // Comprobar autenticación.

        if (!$_POST) {
            $entrada = EntradasModel::getId($id);
            if ($entrada) {
                echo $this->view->render('entradas/formularioEntrada', array(
                        'datos' => get_object_vars($entrada),
                        'accion' => 'editar',
                 ));
            } else {
                header("location: /entradas");
            }
        } else {
            $datos = array(
                'titulo' => (isset($_POST["titulo"])) ? $_POST["titulo"] : "",
                'cuerpo' => (isset($_POST["cuerpo"])) ? $_POST["cuerpo"] : "",
                'id_entrada' => (isset($_POST["id_entrada"])) ? $_POST["id_entrada"] : ""
            );
            if (entradasModel::editarEntrada($datos)) {
                header('location: /entradas');
            } else {
                echo $this->view->render('entradas/formularioentrada', array(
                    'errores' => array('Error al editar'),
                    'datos'   => $_POST,
                    'accion'  => 'editar'
                ));
            }
        }
    }
} // Fin Entradas.
