<?php 
    /* if(!Panel::logged())
        header('Location: '.INCLUDE_PATH_PAINEL); */
?>

<style>
    <?php include('styles/home.css'); ?>
</style>

<section class="home">
    <div class="container">
        <h1 class="title">TETRIS UNICHAMPS</h1>
        <div class="containerButton">
            <div class="buttons play"><a href="<?php echo INCLUDE_PATH; ?>play" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\play.svg" /> JOGAR</a></div class="buttons">
            <div class="buttons ranking"><a href="<?php echo INCLUDE_PATH; ?>ranking" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\trophy.svg" /> RANKING</a></div class="buttons">
            <div class="buttons signOut"><a href="<?php echo INCLUDE_PATH; ?>?logout" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\signOut.svg" /> SAIR</a></div class="buttons">
        </div>
    </div>
</section>