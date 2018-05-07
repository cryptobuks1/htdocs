<?php
/**
 * Representa el la estructura de las Cotizacioness
 * almacenadas en la base de datos
 */
require '../Database.php';
class Cotizaciones
{
    function __construct()
    {
    }
    /*Retorna en la fila especificada de la tabla 'Cotizaciones'*/
    public static function getAll()
    {
        $consulta = "SELECT * FROM cotizaciones INNER JOIN clientes ON cotizaciones.idCli = clientes.idCliente";
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
    /*Retorna en la fila especificada de la tabla 'Cotizaciones'*/
    public static function getAllRenglones($idCot)
    {
        $consulta = "SELECT * FROM renglones_cotizaciones INNER JOIN productos ON renglones_cotizaciones.idProd = productos.idProducto WHERE idCot=?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idCot));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function getAllidRenglones($idCot)
    {
        $consulta = "SELECT idRenglon FROM renglones_cotizaciones WHERE idCot=?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idCot));
            $row= $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            return false;
        }
    }
    /*Obtiene los campos de un Cotizacion con un identificador*/
    public static function getById($idCotizacion)
    {
        // Consulta de la tabla Cotizacion
        $consulta = "SELECT *
                    FROM cotizaciones
                    WHERE idCotizacion = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idCotizacion));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /*Actualiza un registro de la bases de datos basado*/
    public static function update($total,$descrip,$idCotizacion){
        // Creando consulta UPDATE
        $consulta = "UPDATE cotizaciones" .
            " SET total=?, descrip=?" .
            " WHERE idCotizacion=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($total,$descrip,$idCotizacion));
        return $cmd;
    }   
    public static function updateCli($idCli,$nombreCli,$tel,$email,$cia,$obs){
        // Creando consulta UPDATE
        $consulta = "UPDATE clientes SET nombreCli=?, tel=?, email=?, cia=?, obs=? WHERE idCliente=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($nombreCli,$tel,$email,$cia,$obs,$idCli));
        return $cmd;
    }
    public static function updateRenglones($cantidad,$idRenglon){
        // Creando consulta UPDATE
        $consulta = "UPDATE renglones_cotizaciones" .
            " SET cantidad=?" .
            " WHERE idRenglon=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($idRenglon,$cantidad));
        return $cmd;
        
    }
    /*Inserta clinete*/
    public static function insertCli(
        $nombreCli,
        $tel,
        $email,
        $cia,
        $obs
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO clientes ( " .
            "nombreCli,tel,email,cia,obs)" .
            " VALUES( ?,?,?,?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $nombreCli,
                $tel,
                $email,
                $cia,
                $obs
            )
        );
    }
    
    /*Obtiene el ultimo cliente*/
    public static function obtenerUltimoCli()    {
        // Sentencia INSERT
        $consulta = "SELECT * FROM `clientes` ORDER BY idCliente DESC LIMIT 1";
        // Preparar la sentencia
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row['idCliente'];
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    
     /* Insertar un nuevo Cotizacion     */
    public static function insert(
        $IdCliente,
        $fecha,
        $descrip,
        $subtotal,
        $impuesto,
        $descuento,
        $total
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO cotizaciones ( " .
            "idCli,fecha,descrip,subtotal,impuesto,descuento,total)" .
            " VALUES( ?,?,?,?,?,?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $IdCliente,
                $fecha,
                $descrip,
                $subtotal,
                $impuesto,
                $descuento,
                $total
            )
        );
    }
    /*obtener cliente por email*/
    public static function obtenerCliEmail($email){
        // Sentencia INSERT
        $consulta = "SELECT * FROM `clientes` WHERE email=?";
        // Preparar la sentencia
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
    /*ultima cotizacion´*/
    public static function obtenerUltimoCot()    {
        // Sentencia INSERT
        $consulta = "SELECT * FROM `cotizaciones` ORDER BY idCotizacion DESC LIMIT 1";
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
    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idCotizacion identificador de la tabla Cotizaciones
     * @return bool Respuesta de la eliminación
     */
    public static function delete($idCotizacion)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM cotizaciones WHERE idCotizacion=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idCotizacion));
    }
    /*borrar renglon con el id cotizacion*/
    public static function deleteRenPorIdCot($idCot)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM renglones_cotizaciones WHERE idCot=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idCot));
    }
    /*borrar renglon con idRenglon*/
    public static function deleteRen($idRenglon)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM renglones_cotizaciones WHERE idRenglon=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idRenglon));
    }
    /*Inserta renglones*/
    public static function insertRenglon(
        $idCotizacion,
        $idProducto,
        $valorUnitario,
        $cantidad,
        $valorTotal    
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO renglones_cotizaciones ( " .
            "idCot,idProd,valorUnitario,cantidad,valorTotal)" .
            " VALUES( ?,?,?,?,?)";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $idCotizacion,
                $idProducto,
                $valorUnitario,
                $cantidad,
                $valorTotal  
            )
        );
    }
     /**
     * Obtiene los campos de un producto con un identificador
     
     */
      public static function getPById($idProducto)
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
}


?>
