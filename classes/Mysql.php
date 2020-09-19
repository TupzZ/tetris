<?php

	class Mysql{
		private static $pdo;
		public static function prepare($sql = false){
			if($sql != false){
				if(self::$pdo == null){
					try{
						$pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}catch(Exception $e){
						echo "<h2>Erro ao conectar!<h2>";
					}
				}
				$pdo = $pdo->prepare($sql);
				return $pdo;
			}else{
				if(self::$pdo == null){
					try{
						$pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}catch(Exception $e){
						echo "<h2>Erro ao conectar!<h2>";
					}
				}
				return $pdo;
			}			
		}
	}
?>