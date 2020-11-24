<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$second= 3;
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Criando DB Tetris <br>";
	
	// Create database
	$sql = "CREATE DATABASE tetris";	
	if ($conn->query($sql) === TRUE) {
		$sql = "use `tetris`";
		if ($conn->query($sql) === TRUE) {
			$sql = " CREATE TABLE `score` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`score` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			if ($conn->query($sql) === TRUE){
				$sql = "CREATE TABLE `users` (  `id` int(11) NOT NULL,  `username` varchar(255) NOT NULL, `nome` varchar(255) NOT NULL,`nacimento` varchar(255) NOT NULL, `cpf` varchar(255) NOT NULL, `tel` varchar(255) NOT NULL,`email` varchar(255) NOT NULL,  `password` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
				if ($conn->query($sql) === TRUE){				
					$sql = "ALTER TABLE `score`  ADD PRIMARY KEY (`id`)";
					if ($conn->query($sql) === TRUE){					
						$sql = "ALTER TABLE `users`  ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `username` (`username`);";
						if ($conn->query($sql) === TRUE){						
							$sql = "ALTER TABLE `users`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";
							if ($conn->query($sql) === TRUE){
								  echo "Database created successfully";
							}else{ echo "Error creating database: " . $conn->error;}
						}else{ echo "Error creating database: " . $conn->error;}
					}else{ echo "Error creating database: " . $conn->error;}
				}else{ echo "Error creating database: " . $conn->error;}
			}else{ echo "Error creating database: " . $conn->error;}
		}else{ echo "Error creating database: " . $conn->error;}
	} else {
	  echo "Error creating database: " . $conn->error;
	}
	$conn->close();
?>


