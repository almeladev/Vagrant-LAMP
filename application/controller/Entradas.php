<?php
class Entradas extends Controller
{

    public function index() {
        $entradas = EntradasModel::getAll();
        echo $this->view->render('entradas/index', array('entradas' => $entradas));
    }

    public function crear() {

         Auth::checkAutentication(); // Comprobar autenticación.

        if (!$_POST){
            echo $this->view->render('entradas/formularioEntrada');
        } else {
            if (!isset($_POST["titulo"]))
                $_POST["asunto"] = "";
            if (!isset($_POST["cuerpo"]))
                $_POST["cuerpo"] = "";
            $datos = array(
                'titulo' => $_POST["titulo"],
                'cuerpo' => $_POST["cuerpo"]
            );
            if (EntradasModel::insert($datos)){
                echo $this->view->render('entradas/entradaInsertada');
            } else {
                echo $this->view->render('entradas/formularioEntrada',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }

    public function editar($id = 0)
    {

        Auth::checkAutentication(); // Comprobar autenticación.

        if (!$_POST){
            $entrada = EntradasModel::getId($id);
            if ($entrada){
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
            if (entradasModel::edit($datos)){
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


    public function numComentarios($id = 0) {
        $numComentarios = entradasModel::numComentarios($id);
        echo $this->view->render('entradas/numComentarios',
        array('numComentarios' => $numComentarios));
    }

    public function enviarComentario($id = 0){

        Auth::checkAutentication(); // Comprobar autenticación.

        if(!$_POST) {
            $entrada = entradasModel::getId($id);
            echo $this->view->render('entradas/formularioComentario', array('entrada' => $entrada));
        } else {
            $comentario = entradasModel::insertarComentario($id, $_POST);
            echo $this->view->render('entradas/comentarioInsertado', array('comentario' => $comentario));
        }
    }


    public function enviarComentarioJSON($id = 0) {

        Auth::checkAutentication();

        if(!$_POST){
            $entrada = entradasModel::getId($id);
            $numComentarios = entradasModel::numComentarios($id);
            echo $this->view->render('entradas/formularioComentarioJSON', array(
                'entrada' => $entrada,
                'numComentarios' => $numComentarios
            ));
        } else {
            $comentario = entradasModel::insertarComentario($id, $_POST);
            $numComentarios = entradasModel::numComentarios($id);
            echo $this->view->render('entradas/comentarioInsertadoJSON', array(
                'comentario' => $comentario,
                'numComentarios' => $numComentarios
            ));
        }
    }


    public function mostrarComentarios($id = 0) {
        $comentarios = entradasModel::mostrarComentarios($id);
        echo $this->view->render('entradas/mostrarComentarios', array('comentarios' => $comentarios));
    }


}