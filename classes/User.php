<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

	class User{

		public function addUser($username, $pass){
			$sql = Mysql::prepare("INSERT INTO `users` VALUES (NULL,?, ?)");
			if($sql->execute(array($username, $pass))){
				return true;
			}else{
				return false;
			}
		}
	}
?>