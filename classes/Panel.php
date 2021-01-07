<?php
	class Panel
	{

		public static function logged(){
			return isset($_SESSION['login']) ? true : false;
		}
		public static function logout(){
			if(isset($_SESSION['login'])) {
				
				session_destroy();
				header('Location: '.INCLUDE_PATH);
				exit();
			 }
			 else{
				header('Location: '.INCLUDE_PATH);
			 } 
		}

		public static function insert($arr, $table){
			$query = "INSERT INTO `$table` VALUES (NULL";
			foreach ($arr as $key => $value) {
				if ($key == 'sub') {
					continue;
				}
				if ($value == '') {
					return false;
				}
				$query .= ",?";
				$par[] = $value;
			}
			$query .= ")";
			$sql = Mysql::prepare($query);
			if($sql->execute($par)){
				$id = Mysql::prepare("SELECT MAX(id) as id FROM `$table`");
				$id->execute();
				$id = $id->fetch();
				$lastId = Mysql::prepare("SELECT MAX(order_id) as order_id FROM `$table`");
				$lastId->execute();
				$lastId = $lastId->fetch();
				++$lastId['order_id'];
				$sql = Mysql::prepare("UPDATE `$table` SET order_id = ? WHERE id = ?");
				$sql->execute(array($lastId['order_id'], $id['id']));
				return true;
			}
			else{return false;}
		}

		public static function listAll($table, $start = null, $end = null){
			if($start == null && $end == null)
				$sql = Mysql::prepare("SELECT * FROM `$table` ORDER BY order_id ASC");
			else
				$sql = Mysql::prepare("SELECT * FROM `$table` WHERE order_id BETWEEN $start AND $end ORDER BY order_id ASC ");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function getUser($username) {
			$sql = Mysql::prepare("SELECT * FROM `users` WHERE username = ?");
			$sql->execute(array($username));
			$userData = $sql->fetchAll();
			return $userData[0];
		}

		public static function verifyUser($user){
			$sql = Mysql::prepare("SELECT * FROM `users` WHERE username = ?");
			$sql->execute(array($user));
			return $sql->rowCount();
		}

		public static function verifyLogin($user, $pass){
			$sql = Mysql::prepare("SELECT * FROM `users` WHERE username = ? AND `password` = ?");
			$sql->execute(array($user, $pass));
			return $sql->rowCount();
		}
<<<<<<< Updated upstream

		public static function userIDtoUserName($ID){
			$sql = Mysql::prepare("SELECT username FROM `users` where id = ?");
			$sql->execute(array($ID));			
			return $sql->fetchAll();
		}	
		

		public static function rankInsert($user, $points){
			$arr = array($user, $points);
			insert($arr, 'score');
		}

		public static function rankSelect(){
			$sql = Mysql::prepare("SELECT score, id FROM `score` order by score desc limit 5");
=======
		
		public static function rankInsert($points){
			$sql = Mysql::prepare("INSERT INTO `score` VALUES (NULL, ?, ?)");
			if($sql->execute(array($_SESSION['login'], $points))){
				Panel::redirect(INCLUDE_PATH.'gameOver');
			} else {
				return false;
			}
		}

		public static function rankSelect(){
			$sql = Mysql::prepare("SELECT score, user FROM `score` order by score desc limit 5");
>>>>>>> Stashed changes
			$sql->execute();
			return $sql->fetchAll();
		}
	}
?>