<?php
/**
 * Representa el la estructura de las Productoss
 * almacenadas en la base de datos
 */
require '../Database.php';
class Productos
{
    function __construct()
    {
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
    /*obtener produco por referencia*/
     public static function getProByRef($ref)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM productos
                    WHERE ref = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($ref));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    
    /*Obtiene los campos de un Producto con un identificador*/
    public static function getCat($nombreCat,$idArea)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM categorias
                    WHERE nombreCat = ? AND idArea=?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($nombreCat,$idArea));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /*obtener areas*/
    public static function getAreas($idArea)
    {
        // Consulta de la tabla Producto
        $consulta = "SELECT *
                    FROM areas
                    WHERE idArea = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idArea));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /*Insertar un nueva categoria*/
    public static function insertCat($idArea, $nombreCat){
        // Sentencia INSERT
        $comando = "INSERT INTO categorias (idArea, nombreCat)" .
            " VALUES(?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idArea, $nombreCat));
    }
    /*Actualiza un registro de la bases de datos basado*/
    public static function update($idProducto, $idCat, $nombrePro, $ref, $unidad, $descrip, $imagen, $valor, $iva, $vneto){
        // Creando consulta UPDATE
        $consulta = "UPDATE productos" .
            " SET idCat=?, nomProducto=?, ref=?, unidMedida=?, descrip=?, imagen=?, valor=?, iva=?, vneto=?" .
            "WHERE idProducto=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($idCat, $nombrePro, $ref, $unidad, $descrip, $imagen, $valor, $iva, $vneto, $idProducto));
        return $cmd;
    }
    /*Insertar un nuevo Producto*/
    public static function insert($idCat, $nombrePro, $ref, $unidad, $descrip, $imagen, $valor, $iva, $vneto)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO productos (idCat, nomProducto, ref, unidMedida, descrip, imagen, valor, iva, vneto)" .
            " VALUES(?,?,?,?,?,?,?,?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idCat, $nombrePro, $ref, $unidad, $descrip, $imagen, $valor, $iva, $vneto));
    }
    /*borrar todos los productos*/
    public static function deleteAll(){
        // Sentencia DELETE
        $comando = "DELETE FROM Productos ";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute();
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
