<?php
/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 04/04/2018
 * Time: 16:11
 */

class Marca extends Mysqli
{
    private $id;
    private $nombre;
    private $tag;
    private $posicion;
    private $img;

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * @param mixed $posicion
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }


    public function save(){

        $query="INSERT INTO marcas (id, nombre, tag, posicion, img)"
        ."VALUES (NULL, '".$this->nombre."', '".$this->tag."', '".$this->posicion."', '".$this->img."')";
        $save=$this->con->query($query);
        return $save;
    }
    public function getAll(){
        $resultset=[];
        $query=$this->con->query("SELECT * FROM marcas ORDER BY posicion");
        while($row=$query->fetch_object()){
            $resultset[]=$row;
        }
        return $resultset;
    }
    public function getByTag($tag){
        $resultset=[];
        $query=$this->con->query("SELECT * FROM marcas WHERE tag IN($tag)");
        while($row=$query->fetch_object()){
            $resultset[]=$row;
        }
        return $resultset;
    }
    public function getMembresia(){
        $query=$this->con->query("SELECT * FROM marcas WHERE nombre='Membresias'");
        if($row=$query->fetch_object()){
            $resultset=$row;
        }
        return $resultset;
    }
    public function getUltimoRegistro(){
        $resultset='';
        $query=$this->con->query("SELECT * FROM marcas ORDER BY id DESC LIMIT 1");
        if($row=$query->fetch_object()){
            $resultset=$row;
        }
        return $resultset;
    }
    public function getById($id){
        $query=$this->con->query("SELECT * FROM marcas WHERE id=$id");
        if($row=$query->fetch_object()){
            $resultset=$row;
        }
        return $resultset;
    }
    public function update($id){
        $query="UPDATE marcas SET nombre='".$this->nombre."',  tag='".$this->tag."', posicion='".$this->posicion."',img='".$this->img."' WHERE id=$id";
        $update=$this->con->query($query);
        return $update;
    }
    public function delete($id){
        $query=$this->con->query("DELETE FROM marcas WHERE id=$id");
        return $query;
    }
}