<style>
    <?php include('styles/play.css'); //adição do css da pagina?>
</style>

<section class="play">
    <div class="container">
        <h1 class="title">TETRIS UNICHAMPS</h1>
		<!-- Informações de jogo -->
        <div class="info">		
		<!-- Tempode jogo -->
            <div class="gameTime">
                <h3>TIME:</h1>
                <h3>00:30</h2>
            </div>
		<div class="break"></div>
		<!-- Pontuação -->
            <div class="scoreGame">
                <h3>SCORE:</h1>
                <h3>100</h2>
            </div>
		<div class="break"></div>
		<!-- Mostra peça seguinte -->
            <div class="next">
                <h3>PRÓXIMA PEÇA:</h1>
                <img src="">
			</div>
		<div class="break"></div>
	<!-- contem botoes utilitarios -->
			<div class="utility">
				<h3>Velocidade:</h3>
				<div>
					<button class="buttonVelo">+</button>
					<button class="buttonVelo Selected">-</button>
				</div>
			</div>
        </div>

		<!-- Jogo -->
        <div class="game">
			<img src="<?php echo INCLUDE_PATH;?>assets/images/Tetrix.png"> 
		</div>
        
		
		<!-- Rank -->
		
        <div class="rank">
			<h2 class="title">RANKING</h1>
            <div class="rankTable">
                <h3 class="rankTitle">GERAL</h3>
                <div class="scores">
						<div class="column rank">
							<h4>Pos.</h4>
						</div>
						<div class="column player">
							<h4>Player</h4>
						</div>
						<div class="column score">
							<h4>Score</h4>
						</div>
                </div>
                <div class="scoreTable">
                	<div class="scores">
						<div class="column rank">
							<h4>1</h4>
						</div>
						<div class="column player">
							<h4>TupzZ</h4>
						</div>
						<div class="column score">
							<h4>100</h4>
						</div>
                    </div>
                </div>
            </div>
                
            <div class="rankTable">
                <h3 class="rankTitle">PLAYER</h3>
                <div class="scores">
						<div class="column rank">
							<h4>Pos.</h4>
						</div>
						<div class="column player">
							<h4>Player</h4>
						</div>
						<div class="column score">
							<h4>Score</h4>
						</div>
                </div>
                <div class="scoreTable">
                	<div class="scores">
						<div class="column rank">
							<h4>1</h4>
						</div>
						<div class="column player">
							<h4>TupzZ</h4>
						</div>
						<div class="column score">
							<h4>100</h4>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>