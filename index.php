<?php 
	include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tetris Unichamps</title>
	<link href="<?php echo INCLUDE_PATH; ?>styles/index.css" rel="stylesheet">
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	crossorigin=""></script>
	<link 
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;400&family=Poppins:wght@400;800&display=swap" 
    rel="stylesheet"
    />
	<!-- <link rel="icon" href="<?php //echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon"/> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descrição do meu site">
	<meta name="keywords" content="palavra chave, do, meu, site">
	<meta charset="UTF-8">
</head>
<body>
	<img src="assets/images/animatedBg.gif" alt="Background" class="bg" />
	<?php 
	
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	$url = $_GET['url'];

	if(!$url){
		if(Panel::logged()){
			Panel::redirect(INCLUDE_PATH.'home');
		}
		else{
			Panel::redirect(INCLUDE_PATH.'login');
		}
	}
	else if(file_exists('pages/'.$url.'.php'))
		include('pages/'.$url.'.php');
	else
		Panel::redirect(INCLUDE_PATH);
	?>
</body>
</html>