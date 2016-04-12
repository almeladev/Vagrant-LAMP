<?php

/**
 * El controlador Comentarios.
 *
 * PHP versión 7
 *
 * @category  Comentarios
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class Comentarios extends Controller
{

    /**
     * Envía a la vista el número de comentarios de la entrada. [INHABILITADO]
     *
     * @param  integer $id [id de la entrada]
     * @return void
     */
    public function numComentarios($id = 0)
    {
        $numComentarios = ComentariosModel::numComentarios($id);

        echo $this->view->render(
            'comentarios/numComentarios',
            array('numComentarios' => $numComentarios)
        );

    }

    /**
     * Muestra al modelo el comentario a insertar en la BBDD y
     * el formulario de comentarios a la vista por formato JSON.
     *
     * @param  integer $id [id de la entrada]
     * @return void
     */
    public function enviarComentario($id = 0)
    {

        Auth::checkAutentication();

        if (!$_POST) {
            $entrada = EntradasModel::getId($id);
            $numComentarios = ComentariosModel::numComentarios($id);
            echo $this->view->render('comentarios/formularioComentario', array(
                'entrada' => $entrada,
                'numComentarios' => $numComentarios
            ));
        } else {
            $comentario = ComentariosModel::insertarComentario($id, $_POST);
            $numComentarios = ComentariosModel::numComentarios($id);
            echo $this->view->render('comentarios/comentarioInsertado', array(
                'comentario' => $comentario,
                'numComentarios' => $numComentarios
            ));
        }
    }

    /**
     * Muestra los comentarios de la entrada en la vista.
     *
     * @param  integer $id [id de la entrada]
     * @return void
     */
    public function mostrarComentarios($id = 0)
    {
        $comentarios = ComentariosModel::mostrarComentarios($id);
        echo $this->view->render('comentarios/mostrarComentarios', array('comentarios' => $comentarios));
    }
} // Fin Comentarios.
