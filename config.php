<?php

	session_start();

	date_default_timezone_set('America/Sao_Paulo');

    define('INCLUDE_PATH', 'http://localhost/tetris/');

	// Conexão com BD
	define('HOST','localhost');
	define('DB','tetris');
	define('PASS','');
	define('USER','root');

	// Carregar classes
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);
?>