<?php

class dbcx
{
	public static function cx($x)
	{
		try {
			if ($x == 1) {
				$con = new PDO("mysql:host=localhost;dbname=prueba_tecnica;", "root", "");
			}
			if ($x == 0) {
				$con = null;
			}
		} catch (PDOException $e) {
			echo "Error " . $e->getMessage();
		}
		return $con;
	}
}
?>