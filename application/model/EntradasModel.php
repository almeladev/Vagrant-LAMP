<?php
class EntradasModel
{
    //Recibimos todas las preguntas
    public static function getAll(){
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM entrada";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function insert($datos){
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['titulo'])){
            Session::add('feedback_negative', "No se ha introducido el título de la entrada");
            $errores_validacion = true;
        }
        if(empty($datos['cuerpo'])){
            Session::add('feedback_negative', "No se ha introducido el cuerpo de la entrada");
            $errores_validacion = true;
        }
        if($errores_validacion){
            return false;
        } else {
            $params = array(
                ':titulo' => $datos['titulo'],
                ':cuerpo' => $datos['cuerpo']
            );
            $ssql = "INSERT INTO entrada (titulo, cuerpo) VALUES (:titulo, :cuerpo)";
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
        $ssql = "SELECT * FROM entrada WHERE id_entrada = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    public static function edit($datos){

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['id_entrada'])){
            Session::add('feedback_negative', 'La entrada no ha podido publicarse');
            $errores_validacion = true;
        }

        if(empty($datos['titulo'])){
            Session::add('feedback_negative', "No has indicado el título de la entrada");
            $errores_validacion = true;
        }

        if(empty($datos['cuerpo'])){
            Session::add('feedback_negative', "No has indicado el cuerpo de la entrada");
            $errores_validacion = true;
        }

        if($errores_validacion){
            return false;
        } else {
            $ssql = "UPDATE entrada SET titulo=:titulo, cuerpo=:cuerpo WHERE id_entrada=:id";
            $query = $conn->prepare($ssql);
            $parameters = array(
                ':titulo' => $datos["titulo"],
                ':cuerpo' => $datos["cuerpo"],
                ':id'     => $datos["id_entrada"]
            );
            $query->execute($parameters);
            $count = $query->rowCount();
            if($count == 1){
                Session::add('feedback_positive', '¡La entrada ha sido editada con éxito!');
                return true;
            }
            Session::add('feedback_positive', 'En verdad, no se ha actualizado nada');
            return false;
        }
    }


    public static function numComentarios($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT count(*) as num from comentario where id_entrada = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $comentarios = $query->fetch();
        return $comentarios->num;
    }


    public static function insertarComentario($id, $comentario) {
        $conn = Database::getInstance()->getDatabase();
        $datos_entr = self::getId($id);

        if(!$datos_entr){return false;}

            if(empty($comentario["comentario"])){
                Session::add('feedback_negative', "No se ha publicado el comentario");
                return false;
            }

        if(strlen($comentario["comentario"]) < 10){
            Session::add('feedback_negative', "El comentario es demasiado corto");
            Session::add('feedback_negative', "Debe ser de 10 caracteres o más");
            return false; 
        }

        $ssql = "insert into comentario (cuerpo, id_entrada, id_usuario) values (:cuerpo, :identr, :usu)";
        $query = $conn->prepare($ssql);
        $parameters = array(':cuerpo' => $comentario["comentario"], ':identr' => $datos_entr->id_entrada, ':usu' => Session::get("user_id"));
        $query->execute($parameters);
        $count = $query->rowCount();

        if ($count == 1) {return $conn->lastInsertId();} 

        return false;
    }


    public static function mostrarComentarios($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT * from comentario where id_entrada = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }



}