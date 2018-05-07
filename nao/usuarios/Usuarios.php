<?php
/**
 * Representa el la estructura de las Productoss
 * almacenadas en la base de datos
 */
require '../Database.php';
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
        $consulta = "SELECT * FROM productos INNER JOIN categorias ON productos.idCat=categorias.idCategoria";
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
    public static function getById($idProducto)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM productos
                    WHERE idProducto = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idProducto));
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
    public static function update(
        $idProducto,
        $nombre
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE productos" .
            " SET nombre=?" .
            "WHERE idProducto=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($idProducto, $nombre));
        return $cmd;
    }
    /**
     * Insertar un nuevo Producto
     *
     * @param $nombre      nombre del nuevo registro
     * @param $direccion dirección del nuevo registro
     * @return PDOStatement
     */
    public static function insert(
        $nombre
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO productos (nomProducto)" .
            " VALUES(?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $nombre
            )
        );
    }
    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idProducto identificador de la tabla Productos
     * @return bool Respuesta de la eliminación
     */
    public static function delete($idProducto)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM Productos WHERE idProduto=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idProducto));
    }
}
?>
