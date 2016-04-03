<?php
class PreguntasModel
{
    //Recibimos todas las preguntas
    public static function getAll(){
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM pregunta";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function insert($datos){
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['asunto'])){
            Session::add('feedback_negative', "No he recibido el asunto de la pregunta");
            $errores_validacion = true;
        }
        if(empty($datos['cuerpo'])){
            Session::add('feedback_negative', "No he recibido el cuerpo de la pregunta");
            $errores_validacion = true;
        }
        if($errores_validacion){
            return false;
        } else {
            $params = array(
                ':asunto' => $datos['asunto'],
                ':cuerpo' => $datos['cuerpo']
            );
            $ssql = "INSERT INTO pregunta (asunto,cuerpo) VALUES (:asunto,:cuerpo)";
            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();
            if($cuenta == 1){
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    public static function getId($id){
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM pregunta WHERE id_pregunta = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    public static function edit($datos){

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['id_pregunta'])){
            Session::add('feedback_negative', 'No he recibido la pregunta');
            $errores_validacion = true;
        }

        if(empty($datos['asunto'])){
            Session::add('feedback_negative', "No he recibido el asunto de la pregunta");
            $errores_validacion = true;
        }

        if(empty($datos['cuerpo'])){
            Session::add('feedback_negative', "No he recibido el cuerpo de la pregunta");
            $errores_validacion = true;
        }

        if($errores_validacion){
            return false;
        } else {
            $ssql = "UPDATE pregunta SET asunto=:asunto, cuerpo=:cuerpo WHERE id_pregunta=:id";
            $query = $conn->prepare($ssql);
            $parameters = array(
                ':asunto' => $datos["asunto"],
                ':cuerpo' => $datos["cuerpo"],
                ':id'     => $datos["id_pregunta"]
            );
            $query->execute($parameters);
            $count = $query->rowCount();
            if($count == 1){
                Session::add('feedback_positive', 'Editado con éxito, gracias!!!');
                return true;
            }
            Session::add('feedback_positive', 'Actualizadas 0 casillas');
            return false;
        }
    }
}