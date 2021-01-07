<?php 
    if(!Panel::logged())
        header('Location: '.INCLUDE_PATH);
?>

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
<<<<<<< Updated upstream
				<form>
=======
				<form method="post" class="pointsForm">
>>>>>>> Stashed changes

					<input type="number" name="points" id="pointsInput" value=0>

					<input type="submit" id="submitPoints" name="sub" >
					<?php
						if(isset($_POST['sub'])){
<<<<<<< Updated upstream
							if(Panel::verifyUser($_POST['username']) === 0){
								Panel::rankInsert($_POST['username'], $_POST['points']);
=======
							if(Panel::verifyUser($_SESSION['login']) !== 0){
								Panel::rankInsert($_POST['points']);
>>>>>>> Stashed changes
							}
						}
					?>
				</form>

            </div>
		<div class="break"></div>
			<!-- Pontuação -->
            <div class="scoreGame">
                <h3 id="rows">Linhas:  0</h3>

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
					<?php
						if(isset($_POST['sub'])){
							if(Panel::verifyUser($_POST['username']) === 0){
								
								Panel::rankInsert();
								echo '<div class="success"><span>Usuário cadastrado com sucesso!</span></div>';
							}
							else
								echo '<div class="error"><span>Nome de usuário já cadastrado!</span></div>';
						}
					?>
				</div>
				<h3>Velocidade Atual:</h3>
				<div>
					<h3 id="level">1x<h3>
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