<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

	class User{

		public function addUser($username,$nome,$nascimento,$cpf,$tel,$email, $pass){
			$sql = Mysql::prepare("INSERT INTO `users` VALUES (NULL,?, ?, ?, ?, ?, ?, ?)");
			if($sql->execute(array($username,$nome,$nascimento,$cpf,$tel,$email, $pass))){
				return true;
			}else{
				return false;
			}
		}
	}
?>