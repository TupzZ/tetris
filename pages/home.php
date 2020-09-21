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
            <button class="buttons play" href="<?php echo INCLUDE_PATH; ?>play" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\play.svg" />JOGAR</button>
            <button class="buttons ranking" href="<?php echo INCLUDE_PATH; ?>ranking" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\trophy.svg" />RANKING</button>
            <button class="buttons signOut" href="http://localhost/tetris?logout" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\signOut.svg" />SAIR</button>
        </div>
    </div>
</section>