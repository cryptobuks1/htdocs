<?php

require '../Database.php';
class Clientes
{
    function __construct()
    {
    }
    /*Retorna en la fila especificada de la tabla 'Clientes'     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM clientes";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return -1;
        }
    }
    /*Obtiene los campos de un Cliente con un identificador*/
    public static function getById($idCliente)
    {
        // Consulta de la tabla Cliente
        $consulta = "SELECT *
                    FROM clientes
                    WHERE idCliente = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idCliente));
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
        $idCliente,
        $nombreCli,
        $tel,
        $email,
        $cia,    
        $obs
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE clientes" .
            " SET nombreCli=?, tel=?, email=?, cia=?, obs=?" .
            "WHERE idCliente=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($idCliente, $nombreCli, $tel,$email,$cia,$obs));
        return $cmd;
    }
  /*Inserta clinete*/
    public static function insert(
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
     /* Eliminar el registro con el identificador especificado*/
    public static function delete($idCliente)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM clientes WHERE idCliente=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($idCliente));
    }
}
?>    

