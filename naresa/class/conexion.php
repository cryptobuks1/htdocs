<?php
class conexion{
	private $servidor='localhost';
	private $user='root';
	private $pass='';
	private $db='naresa';
	private $conexion;
	
	function conectar(){
		$s=$this->servidor;
		$u=$this->user;
		$p=$this->pass;
		$d=$this->db;
		$conex=mysql_connect($s,$su,$p,$d);
		$this->conexion=$conex;
	}
	public function consulta(){
		$consulta=mysql_query("SELECT * FROM trabajos");
	
	}
}
?>