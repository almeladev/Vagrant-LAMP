<?php

/**
 * El modelo EntradasModel.
 *
 * PHP versión 7
 *
 * @category  Entradas
 * @author    Daniel Martínez <danmnez.me>
 * @license   https://opensource.org/licenses/MIT MIT Licence
 */

class EntradasModel
{
    /**
     * Consultamos todas las entradas en la base de datos.
     *
     * @return [array] [Las entradas]
     */
    public static function todas()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM entrada";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Obtiene el identificador de la entrada.
     *
     * @param  [int] $id  [id de la entrada]
     * @return [array]    [ids]
     */
    public static function getId($id)
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if ($id == 0) {
            return false;
        }
        $ssql = "SELECT * FROM entrada WHERE id_entrada = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    /**
     * Valida e inserta los datos de la entrada en la base de datos.
     *
     * @param  [array] $datos [Los datos de la entrada]
     * @return [booleano]     [false o true]
     */
    public static function insertarEntrada($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if (empty($datos['titulo'])) {
            Session::add('feedback_negative', "No se ha introducido el título de la entrada");
            $errores_validacion = true;
        }
        if (empty($datos['cuerpo'])) {
            Session::add('feedback_negative', "No se ha introducido el cuerpo de la entrada");
            $errores_validacion = true;
        }
        if ($errores_validacion) {
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
            if ($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    /**
     * Borra la entrada de la base de datos.
     *
     * @param  [int] $id [id de la entrada]
     * @return void
     */
    public static function borrarEntrada($id)
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if ($id == 0) {
            return false;
        }
        $ssql = "DELETE FROM entrada WHERE id_entrada = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Valida y edita la entrada de la base de datos.
     *
     * @param  [array] $datos [datos de la entrada]
     * @return [boolean]      [false o true]
     */
    public static function editarEntrada($datos)
    {

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if (empty($datos['id_entrada'])) {
            Session::add('feedback_negative', 'La entrada no ha podido publicarse');
            $errores_validacion = true;
        }

        if (empty($datos['titulo'])) {
            Session::add('feedback_negative', "No has indicado el título de la entrada");
            $errores_validacion = true;
        }

        if (empty($datos['cuerpo'])) {
            Session::add('feedback_negative', "No has indicado el cuerpo de la entrada");
            $errores_validacion = true;
        }

        if ($errores_validacion) {
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
            if ($count == 1) {
                Session::add('feedback_positive', '¡La entrada ha sido editada con éxito!');
                return true;
            }
            Session::add('feedback_positive', 'En verdad, no se ha actualizado nada');
            return false;
        }
    }
} // Fin EntradasModel.
