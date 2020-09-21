<?php 
    /* if(!Panel::logged())
        header('Location: '.INCLUDE_PATH_PAINEL); */
?>

<style>
    <?php include('styles/ranking.css'); ?>
</style>

<section class="ranking">
    <div class="container">
        <h1 class="title">TETRIS UNICHAMPS</h1>
        <div class="ranks">
            <div class="rankTable">
                <h3 class="rankTitle">GLOBAL RANK</h3>
                <div class="scores">
                    <h4 class="rank">Pos.</h4>
                    <h4 class="player">Player</h4>
                    <h4 class="score">Score</h4>
                </div>
                <div class="scoreTable">
                <div class="scores">
                        <h4 class="rank">1</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">100</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">2</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">98</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">3</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">97</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">4</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">90</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">5</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">100</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">6</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">98</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">7</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">97</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">8</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">90</h4>
                    </div>
                </div>
            </div>
                
            <div class="rankTable">
                <h3 class="rankTitle">LOCAL RANK</h3>
                <div class="scores">
                    <h4 class="rank">Pos.</h4>
                    <h4 class="player">Player</h4>
                    <h4 class="score">Score</h4>
                </div>
                <div class="scoreTable">
                    <div class="scores">
                        <h4 class="rank">1</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">100</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">2</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">98</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">3</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">97</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">4</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">90</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">5</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">100</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">6</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">98</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">7</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">97</h4>
                    </div>
                    <div class="scores">
                        <h4 class="rank">8</h4>
                        <h4 class="player">TupzZ</h4>
                        <h4 class="score">90</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <a href='<?php echo INCLUDE_PATH; ?>home'><button class="buttons signOut" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\backArrow.svg" />VOLTAR</button></a>
    </div>
</section>