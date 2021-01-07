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
		
		public function editUser($username,$nome,$nascimento,$cpf,$tel,$email, $pass){			
			$sql = Mysql::prepare("UPDATE `users` SET username = ?, nome = ?, nacimento = ?, cpf = ?, tel = ?, email = ?, password = ? WHERE username = ?");
			if($sql->execute(array($username,$nome,$nascimento,$cpf,$tel,$email, $pass, $_SESSION['login']))){
				$_SESSION['login'] = $username;
				echo '<div class="success"><span>Usuário editado com sucesso!</span></div>';
			}else{
				echo '<div class="error"><span>Falha ao editar usuário!</span></div>';
			}
		}
	}
?>