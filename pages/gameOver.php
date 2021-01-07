<?php 
    if(!Panel::logged())
        header('Location: '.INCLUDE_PATH);
?>

<style>
    <?php include('styles/gameOver.css'); //adição do css da pagina ?>
</style>

<section class="gameOver">
	<div class="container">
		<h1>Game Over!</h1>
		<div class="buttons">
			<a href="<?php echo INCLUDE_PATH.'play'; ?>" class="playAgain">Jogar novamente</a>
			<a href="<?php echo INCLUDE_PATH; ?>" class="menu">Menu</a>
		</div>
	</div>
</section>