<?php

require 'Database.php';
class Usuarios
{
    function __construct()
    {
    }
    /*obtener usaurio por email*/
    public static function getByEmail($email)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM usuarios
                    WHERE email = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($email));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /* Retorna lista de productos y categorias*/
    public static function getAll()
    {
        $consulta = "SELECT * FROM users";

        try {

            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * Obtiene los campos de un Producto con un identificador
     * determinado
     *
     * @param $idProducto Identificador del producto
     * @return mixed
     */
    public static function getById($id_user)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM users
                    WHERE id_user = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_user));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    
    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $idProducto      identificador
     * @param $nombre      nuevo nombre
     * @param $direccion nueva direccion
     
     */
    public static function update($id_user, $nombre,$email,$nacimiento, $celular, $taller, $residencia, $ciudad, $enteraste, $detenteraste, $puntos, $facturas)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE users" .
            " SET nombre=?, email=?, nacimiento=?, celular=?, taller=?, residencia=?, ciudad=?, enteraste=?, detenteraste=?, puntos=?, facturas=?" .
            "WHERE id_user=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id_user, $nombre,$email,$nacimiento, $celular, $taller, $residencia, $ciudad, $enteraste, $detenteraste, $puntos, $facturas));
        return $cmd;
    }
    /**
     * Insertar un nuevo Producto
     *
     * @param $nombre      nombre del nuevo registro
     * @param $direccion dirección del nuevo registro
     * @return PDOStatement
     */
    public static function insert($nombre,$email,$nacimiento, $celular, $taller, $residencia, $ciudad, $enteraste, $detenteraste, $puntos, $facturas){
        // Sentencia INSERT
        $comando = "INSERT INTO users (nombre, email, nacimiento, celular, taller, residencia, ciudad, enteraste, detenteraste, puntos, facturas)" .
            " VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array($nombre,$email,$nacimiento, $celular, $taller, $residencia, $ciudad, $enteraste, $detenteraste, $puntos, $facturas)
        );
    }
    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idProducto identificador de la tabla Productos
     * @return bool Respuesta de la eliminación
     */
    public static function delete($id)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM users WHERE id_user=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($id));
    }
}
?>
