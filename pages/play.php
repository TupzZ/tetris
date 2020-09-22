<?php 
    if(!Panel::logged())
        header('Location: '.INCLUDE_PATH.'login');
?>

<style>
    <?php include('styles/home.css'); ?>
</style>

<section class="play">
    <div class="container">
        <div class="info"></div>
        <div class="game"></div>
        <div class="rank"></div>
    </div>
</section>