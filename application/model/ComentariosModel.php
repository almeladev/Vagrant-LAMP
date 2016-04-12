<?php

/**
 * El modelo ComentariosModel.
 *
 * PHP versión 7
 *
 * @category  Comentarios
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class ComentariosModel
{

    /**
     * Cuenta el número de registros de comentarios en la base de datos.
     *
     * @param  [int] $id [id de la entrada]
     * @return Nº comentarios
     */
    public static function numComentarios($id)
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT count(*) as num from comentario where id_entrada = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $comentarios = $query->fetch();
        return $comentarios->num;
    }

    /**
     * Inserta el comentario añadido a la base de datos.
     *
     * @param  [int]  $id          [id de la entrada]
     * @param  [text] $comentario  [datos del comentario]
     * @return [booleano]          [false o true]
     */
    public static function insertarComentario($id, $comentario)
    {
        $conn = Database::getInstance()->getDatabase();
        $datos_entr = EntradasModel::getId($id);

        if (!$datos_entr) {
            return false;
        }

        if (empty($comentario["comentario"])) {
            Session::add('feedback_negative', "No se ha publicado el comentario");
            return false;
        }

        if (strlen($comentario["comentario"]) < 10) {
            Session::add('feedback_negative', "El comentario es demasiado corto");
            Session::add('feedback_negative', "Debe ser de 10 caracteres o más");
            return false;
        }

        $ssql = "insert into comentario (cuerpo, id_entrada, id_usuario) values (:cuerpo, :identr, :usu)";
        $query = $conn->prepare($ssql);
        $parameters = array(
            ':cuerpo' => $comentario["comentario"],
            ':identr' => $datos_entr->id_entrada,
            ':usu' => Session::get("user_id")
        );
        $query->execute($parameters);
        $count = $query->rowCount();

        if ($count == 1) {
            return $conn->lastInsertId();
        }

        return false;
    }

    /**
     * Obtiene todos los comentarios de la base de datos para la entrada.
     *
     * @param  [type] $id  [id de la entrada]
     * @return [array]     [los comentarios]
     */
    public static function mostrarComentarios($id)
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        $sql = "SELECT * from comentario where id_entrada = :id";
        $query = $conn->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
} // Fin ComentariosModel.
