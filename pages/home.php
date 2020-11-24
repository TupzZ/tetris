<?php
    if(!Panel::logged()){
        header('Location: '. INCLUDE_PATH);
    }
?>

<style>
    <?php include('styles/home.css'); //adição do css da pagina?>
</style>

<section class="home">
    <div class="container">
        <h1 class="title">TETRIS UNICHAMPS</h1>
        <div class="containerButton">
		<!-- Home com botões de iniciar jogo, ranking e sair -->
            <a href='<?php echo INCLUDE_PATH; ?>play'><button class="buttons play" href="<?php echo INCLUDE_PATH; ?>play" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\play.svg" />JOGAR</button></a>
            <a href='<?php echo INCLUDE_PATH; ?>ranking'><button class="buttons ranking" href="<?php echo INCLUDE_PATH; ?>ranking" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\trophy.svg" />RANKING</button></a>
            <a href='<?php echo INCLUDE_PATH; ?>?signOut'><button class="buttons signOut" href="http://localhost/tetris?logout" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\signOut.svg" />SAIR</button></a>
        </div>
    </div>
</section>