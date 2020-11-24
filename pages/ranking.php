<?php 
    /* if(!Panel::logged())
        header('Location: '.INCLUDE_PATH_PAINEL); */
?>

<style>
    <?php include('styles/ranking.css'); //adição do css da pagina ?>
</style>

<section class="ranking">
	<div class="container">
		<h1 class="title">TETRIS UNICHAMPS</h1>
		<h2 class="title">RANKING</h1>
		<div class="ranks">
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
						<?php
						$rankData = Panel::rankSelect();
						print_r($rankData);
						?>
					</div>
				</div>
			</div>
		</div>
        
		<a href='<?php echo INCLUDE_PATH; ?>home'><button class="buttons signOut" class="button"><img src="<?php echo INCLUDE_PATH; ?>assets\icons\backArrow.svg" />VOLTAR</button></a>
	</div>
</section>