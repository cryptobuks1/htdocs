<?php

require_once '../Database.php';
class Renglones
{
    function __construct()
    {
    }
    /*Retorna en la fila especificada de la tabla 'Renglones'     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM renglones_cotizacion";
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
    /*Obtiene los campos de un Renglon con un identificador*/
    public static function getById($idRenglon)
    {
        // Consulta de la tabla Renglon
        $consulta = "SELECT *
                    FROM renglones_cotizaciones
                    WHERE idRenglon = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idRenglon));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /* Actualiza un registro de la bases de datos basado     */
    public static function update(
        $idRenglon,
        $idCotizacion,
        $idProducto,
        $valorUnitario,
        $cantidad,
        $valorTotal    
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE renglones_cotizaciones" .
            " SET idCotizacion=?, idProducto=?, valorUnitario=?, cantidad=?, valorTotal=?" .
            "WHERE idRenglon=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($idRenglon, $idCotizacion, $idProducto, $valorUnitario,$cantidad,$valorTotal));
        return $cmd;
    }
    
  
    /*Obtiene el ultimo reglon*/
    public static function obtenerUltimo()    {
        // Sentencia INSERT
        $consulta = "SELECT * FROM `renglones_cotizaciones` ORDER BY idRenglon DESC LIMIT 1";
        // Preparar la sentencia
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
     /* Eliminar el registro con el identificador especificado*/
    public static function delete($idRenglon)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM renglones WHERE idRenglon=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idRenglon));
    }
}
?>    

