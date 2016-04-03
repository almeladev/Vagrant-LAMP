<?php
class Preguntas extends Controller
{
    public function todas()
    {
        $preguntas = PreguntasModel::getAll();
        echo $this->view->render('preguntas/todas',
            array('preguntas' => $preguntas));
    }

    public function crear()
    {
        if (!$_POST){
            echo $this->view->render('preguntas/formularioPregunta');
        } else {
            if (!isset($_POST["asunto"]))
                $_POST["asunto"] = "";
            if (!isset($_POST["cuerpo"]))
                $_POST["cuerpo"] = "";
            $datos = array(
                'asunto' => $_POST["asunto"],
                'cuerpo' => $_POST["cuerpo"]
            );
            if (PreguntasModel::insert($datos)){
                echo $this->view->render('preguntas/preguntaInsertada');
            } else {
                echo $this->view->render('preguntas/formularioPregunta',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }

    public function editar($id = 0)
    {
        if (!$_POST){
            $pregunta = PreguntasModel::getId($id);
            if ($pregunta){
                echo $this->view->render('preguntas/formularioPregunta', array(
                        'datos' => get_object_vars($pregunta),
                        'accion' => 'editar',
                 ));
            } else {
                header("location: /Preguntas/todas");
            }
        } else {
            $datos = array(
                'asunto' => (isset($_POST["asunto"])) ? $_POST["asunto"] : "",
                'cuerpo' => (isset($_POST["cuerpo"])) ? $_POST["cuerpo"] : "",
                'id_pregunta' => (isset($_POST["id_pregunta"])) ? $_POST["id_pregunta"] : ""
            );
            if (PreguntasModel::edit($datos)){
                header('location: /Preguntas/todas');
            } else {
                echo $this->view->render('preguntas/formularioPregunta', array(
                    'errores' => array('Error al editar'),
                    'datos'   => $_POST,
                    'accion'  => 'editar'
                ));
            }
        }
    }

}