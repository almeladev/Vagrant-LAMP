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


    public static function cuantasRespuestas($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT count(*) as num from respuesta where id_pregunta = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $respuestas = $query->fetch();
        return $respuestas->num;
    }


    public static function insertarRespuesta($id, $respuesta) {
        $conn = Database::getInstance()->getDatabase();
        $datos_preg = self::getId($id);

        if(!$datos_preg){return false;}

            if(empty($respuesta["respuesta"])){
                Session::add('feedback_negative', "No he recibido la respuesta");
                return false;
            }

        if(strlen($respuesta["respuesta"]) < 10){
            Session::add('feedback_negative', "La respuesta es muy corta");
            Session::add('feedback_negative', "Válidas a partir de 10 carac.");
            return false; 
        }

        $ssql = "insert into respuesta (respuesta, id_pregunta, id_usuario) values (:res, :idpreg, :usuario)";
        $query = $conn->prepare($ssql);
        $parameters = array(':res' => $respuesta["respuesta"], ':idpreg' => $datos_preg->id_pregunta, ':usuario' => Session::get("user_id"));
        $query->execute($parameters);
        $count = $query->rowCount();

        if ($count == 1) {return $conn->lastInsertId(); echo "hola";}

        return false;
    }


    public static function mostrarRespuestas($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT * from respuesta where id_pregunta = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }



}