<?php
 
class DB {
	static $dbh;
	
	private function __construct() {}

	/**
	 * @static
	 * @return PDO
	 */
	static function getConnection() {
		if(empty(self::$dbh)) {
			try {
				self::$dbh = new PDO("mysql:host=localhost;dbname=trionfoa_law", "trionfoa_lawuser", "l(Msm)ca.v(R", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			} catch(PDOException $e) {
				echo "Error al conectar con la base de datos: " . $e->getMessage();
			}
		}

		return self::$dbh;
	}

	/**
	 * @static
	 * @param string $query
	 * @return PDOStatement
	 */
	static function getStatement($query) {
		return self::getConnection()->prepare($query);
	}
}
