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
                <h3 id="time">0</h2>
            </div>
		<div class="break"></div>
		<!-- Pontuação -->
            <div class="scoreGame">
                <h3 id="points">Pontuação: 0</h3>

            </div>
		<div class="break"></div>
		<!-- Mostra peça seguinte -->
            <div class="next">
                <h3>PRÓXIMA PEÇA:</h1>
				<canvas id="next-canvas"></canvas>
			</div>
		<div class="break"></div>
	<!-- contem botoes utilitarios -->
			<div class="utility">
				<div>
					<button id="button" class="buttonPlay Selected"onclick="pauseGame()">Pause game</button>
				</div>
				<div>
					<button id="button2"  class="buttonPlay"  onclick="startGame()">Restart game</button>
				</div>
				<h3>Velocidade Atual:</h3>
				<div>
					<h3 id="level"><h3>
				</div>
			</div>
        </div>

		<!-- Jogo -->
        <div class="game">
			<canvas id="Matriz" width="250" height="500"></canvas>
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
	<script src="Tetris.js"></script>
</section>