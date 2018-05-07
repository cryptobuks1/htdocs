<?php
/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 11/04/2018
 * Time: 4:18
 */

class Icono extends Mysqli
{
    private $id;
    private $icono;
    private $clase;
    private $zise;

    public function __construct(Conexion $con)
    {
        $this->con=$con;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * @param mixed $icono
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;
    }

    /**
     * @return mixed
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * @param mixed $clase
     */
    public function setClase($clase)
    {
        $this->clase = $clase;
    }

    /**
     * @return mixed
     */
    public function getZise()
    {
        return $this->zise;
    }

    /**
     * @param mixed $zise
     */
    public function setZise($zise)
    {
        $this->zise = $zise;
    }

    public function save(){
        $save=$this->con->query("INSERT INTO iconos (id, icon, clase, zise) VALUES"
            ."(NULL, '".$this->icono."','".$this->clase."','".$this->zise."')");
        return $save;
    }
    public function getAll()
    {
        $resultset = [];
        $query = $this->con->query("SELECT * FROM iconos");
        while ($row = $query->fetch_object()) {
            $resultset[] = $row;
        }
        return $resultset;

    }
    public function getById($id){
        $query=$this->con->query("SELECT * FROM iconos WHERE id=$id");
        if($row=$query->fetch_object()){
            $resultset=$row;
        }
        return $resultset;
    }
    public function update($id){
        $query="UPDATE iconos SET icon='".$this->icono."' WHERE id=$id";
        $update=$this->con->query($query);
        return $update;
    }
    public function delete($id){
        $query=$this->con->query("DELETE FROM iconos WHERE id=$id");
        return $query;
    }
}