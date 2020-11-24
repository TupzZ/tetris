var NCOL= prompt ("Digite a largura do tabuleiro");//Quantidade de colunas da matriL base
var NROW= prompt ("Digite a altura do tabuleiro");//Quantidade de linhas da matriL base


const height_pixel = 500/NROW;//Tamanho dos blocos da matriL base
const width_pixel = 250/NCOL;
const EMPTY_SQ = "#EEEEEE";
var canvas = document.getElementById('Matriz');//Pegar a matriL principal pelo ID
canvas.width = 250;
canvas.height = 500;
var mainBlocks = canvas.getContext("2d");//Efeito 2d
var gameSpeed = 1000;
var interval = setInterval(tickMovimentation, gameSpeed);
var timePlayed = setInterval(gameTime, 1000);
var main = []; //MatriL de base
var gameState = 0;
var mainPiece;
var PecaDaMao;
var nextPiece;
var rowscount = 0;
var points=0;
var controlSpeed = 0;
var level = 1;
var paused = 0;
var pieceCode = (Math.floor(Math.random()*6)+1);
var seconds=0;
var checkPecaDaMao = false;
var activeInstruction = false;
var actualPiece;
var rotateElement = document.getElementById('Matriz');



//variaveis do hold piece
var PecaDaMao;
var checkHolded=false;


//variaveis do hold piece
var PecaDaMao;
var checkHolded=false;


//Criando a Matriz base
             //L[0]                     L[1] = posição girada 90 >    L[2] posição girada 180 >  L[3] posição girada 270 > 
const L = [ [ [0,0,1],[1,1,1],[0,0,0]],[ [1,0,0],[1,0,0],[1,1,0]],[ [1,1,1],[1,0,0],[0,0,0]],[ [0,1,1],[0,0,1],[0,0,1]]]; //L normal
const M = [ [ [1,1,0],[1,1,0],[0,0,0]],[ [1,1,0],[1,1,0],[0,0,0]],[ [1,1,0],[1,1,0],[0,0,0]],[ [1,1,0],[1,1,0],[0,0,0]]]; //quadrado
const N = [ [ [1,0,0],[1,1,1],[0,0,0]],[ [1,1,0],[1,0,0],[1,0,0]],[ [1,1,1],[0,0,1],[0,0,0]],[ [0,0,1],[0,0,1],[0,1,1]]]; //L invertido
const O = [ [ [0,0,1,0],[0,0,1,0],[0,0,1,0],[0,0,1,0]],[ [0,0,0,0],[0,0,0,0],[1,1,1,1],[0,0,0,0]],[ [0,0,1,0],[0,0,1,0],[0,0,1,0],[0,0,1,0]],[ [0,0,0,0],[0,0,0,0],[1,1,1,1],[0,0,0,0]]]; // | 
const Y = [ [ [0,1,0],[1,1,1],[0,0,0]],[ [0,1,0],[0,1,1],[0,1,0]],[ [0,0,0],[1,1,1],[0,1,0]],[ [0,1,0],[1,1,0],[0,1,0]]]; // _|_            
const U = [ [ [1,0,1],[1,1,1],[0,0,0]],[ [0,1,1],[0,1,0],[0,1,1]],[ [0,0,0],[1,1,1],[1,0,1]],[ [1,1,0],[0,1,0],[1,1,0]]]; //U             

for (row = 0 ;row < NROW ; row++){ //Gera linhas
    main[row]= [];
    for(col = 0; col < NCOL ;col++){//Gera colunas
        main[row][col] = EMPTY_SQ;
    }
}

class Piece{ 
    constructor(Tetramino,color) //construtor da peça
    {
        this.Tetramino=Tetramino;
        this.TetraminoN=0;//Mostra a posicao inicial do bloco (no caso L[0])
        this.GoTetramino = this.Tetramino[this.TetraminoN]; //Vá bloco L = bloco [posicao0]
        this.color=color;
        if(Tetramino == O)
        {
            this.row=NROW-4;//posicao inicial do bloco O
            this.col = Math.floor((NCOL / 2) - 1);
        }
        else {
            this.row = NROW - 3;//posição inicial dos outros blocos
            this.col = Math.floor((NCOL / 2) - 1);//posicao inicial acima da matriL principal (Para cair dps)
        }
    }
}

let checkGameOver = () => { 
    if(checkColision(0, 0, mainPiece.GoTetramino)){
        generateRanking();
        gameState = 1;
        clearInterval(interval);
        return true;
    }
    else{
        return false;
    }
};

function createMatrix(row, col, color) {
    mainBlocks.fillStyle = EMPTY_SQ ;
    mainBlocks.fillRect(row*width_pixel, col*height_pixel, width_pixel, height_pixel);
    mainBlocks.strokeStyle = 'black';
    mainBlocks.strokeRect(row*width_pixel, col*height_pixel, width_pixel, height_pixel);
}

function showMatrix() {
    for (row = 0 ;row < NROW ; row++){
        for(col = 0; col < NCOL ;col++){
              createMatrix(col, row, main[col][row]);
        }
    }
}
showMatrix();

function generatePiece(random){ //função para gerar peça aleatoria
  
  switch(random){
    case 1:
        return new Piece(L,"blue");
        break;
    case 2:
        return new Piece(M,"red");
        break;
    case 3:
        return new Piece(N,"green");
        break;
    case 4:
        return new Piece(O,"Gold");
        break;
    case 5:
        return new Piece(Y,"DeepPink");
        break;
    case 6:
        return new Piece(U,"purple");
        break;
  }
}

function deletePiece(){
    for (row = 0; (row+mainPiece.row) < (mainPiece.row + mainPiece.GoTetramino.length) ;  row++) { //conta o tamanho (3x3) ou (4x4)
        for (col = 0; (col + mainPiece.col) < (mainPiece.col + mainPiece.GoTetramino.length) ; col++) {
            if(mainPiece.GoTetramino[row][col] == 1){
                mainBlocks.fillStyle = EMPTY_SQ ; //Define a cor do bloco gerado
                mainBlocks.fillRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                mainBlocks.strokeRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);
            }
        }
    }
}

function deletePecaDaMao(next){
	
    var hold = document.getElementById('hold-canvas');
    hold.width = 150;
    hold.height = 100;
    var holdedBlocks = hold.getContext("2d");
    for (let row = 0; row < next.GoTetramino.length ;  row++) { //conta o tamanho (3x3) ou (4x4)
        for (let col = 0; col < next.GoTetramino.length ; col++) {
            if(next.GoTetramino[row][col] == 1){
                holdedBlocks.fillStyle = EMPTY_SQ; //Define a cor do bloco gerado
                holdedBlocks.strokeStyle = EMPTY_SQ;
                holdedBlocks.fillRect(col*20, row*20, 20, 20);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                holdedBlocks.strokeRect(col*20, row*20, 20, 20);
            }
        }
    }  
}

function drawPiece(){
    for (row = 0; (row+mainPiece.row) < (mainPiece.row+ mainPiece.GoTetramino.length) ;  row++) { //conta o tamanho (3x3) ou (4x4)
        for (col = 0; (col + mainPiece.col) < (mainPiece.col + mainPiece.GoTetramino.length) ; col++) {
            if(mainPiece.GoTetramino[row][col] == 1){
                mainBlocks.fillStyle = mainPiece.color ; //Define a cor do bloco gerado
                mainBlocks.fillRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                mainBlocks.strokeRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);
            }
        }
    }
}

function drawNextPiece(next){
	
    var nextCanvas = document.getElementById('next-canvas');
    nextCanvas.width = 150;
    nextCanvas.height = 100;
    var nextBlocks = nextCanvas.getContext("2d");
    for (let row = 0; row < next.GoTetramino.length ;  row++) { //conta o tamanho (3x3) ou (4x4)
        //(coluna+ColunaInicial) < (ColunaInicial+TamanhoDaPeca)
        for (let col = 0; col < next.GoTetramino.length ; col++) {
            if(next.GoTetramino[row][col] == 1){
                nextBlocks.fillStyle = next.color ; //Define a cor do bloco gerado
                nextBlocks.fillRect(col*20, row*20, 20, 20);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                nextBlocks.strokeRect(col*20, row*20, 20, 20);
            }
        }
    }  
}

mainPiece = generatePiece(pieceCode);
actualPiece = mainPiece;
pieceCode = (Math.floor(Math.random()*6)+1);
nextPiece = generatePiece(pieceCode);
drawNextPiece(nextPiece);
drawPiece(mainPiece);

function startGame(){
    rowscount = 0;
    points=0;
    controlSpeed = 0;
    level = 1;
    paused = 0;
    seconds=0;
    gameState = 0;

    if (rotateElement.classList[0] == 'rotacionar')
        rotateElement.classList.remove('rotacionar');
    for (row = 0 ;row < NROW ; row++){ //Gera linhas
        main[row]= [];
        for(col = 0; col < NCOL ;col++){//Gera colunas
            main[row][col] = EMPTY_SQ;
        }
    }
    showMatrix();

    mainPiece = generatePiece(pieceCode);
    pieceCode = (Math.floor(Math.random()*6)+1);
    nextPiece = generatePiece(pieceCode);
    if(checkPecaDaMao == true){
        deletePecaDaMao(PecaDaMao);
    }
    drawNextPiece(nextPiece);
    drawPiece(mainPiece);

    display = "Pontuação: " + points.toString();


    display = "Pontuação: " + points.toString()
    document.getElementById("points").innerHTML = display;
    display = "Linhas: " + rowscount.toString();
    document.getElementById("rows").innerHTML = display;
    display = level.toString() + "x";
    document.getElementById("level").innerHTML = display;
    
 
   

    
    pieceCode = (Math.floor(Math.random()*6)+1);

    interval = setInterval(tickMovimentation, 1000);
    
}

function drawPecaDaMao(next){
	
    var hold = document.getElementById('hold-canvas');
    hold.width = 150;
    hold.height = 100;
    var holdedBlocks = hold.getContext("2d");
    for (let row = 0; row < next.GoTetramino.length ;  row++) { //conta o tamanho (3x3) ou (4x4)
        //(coluna+ColunaInicial) < (ColunaInicial+TamanhoDaPeca)
        for (let col = 0; col < next.GoTetramino.length ; col++) {
            if(next.GoTetramino[row][col] == 1){
                holdedBlocks.fillStyle = next.color ; //Define a cor do bloco gerado
                holdedBlocks.fillRect(col*20, row*20, 20, 20);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                holdedBlocks.strokeRect(col*20, row*20, 20, 20);
            }
        }
    }  
}

function tickMovimentation() { //Função para a movimentação constante da peça
    if(paused == 1){ 
        return false;
    }
    else{
         
        if(checkColision(-1, 0, mainPiece.GoTetramino)){
            drawPieceOnBoard();
            mainPiece = nextPiece;
            nextPiece = generatePiece((Math.floor(Math.random()*6)+1));
            if(checkGameOver()){
                return false;
            }
            else{
                drawPiece(mainPiece);
                drawNextPiece(nextPiece);
            }
        }
        else{
            deletePiece(); //apagar peça antes de mover
            mainPiece.row--; //sobe a peça
            drawPiece(); //desenha a peça no lugar novo
        }
    }
}
function pauseGame(){
    if(paused == 1){
        paused = 0;
        document.getElementById("button").innerHTML = "Pause game";
    }
    else{
        paused = 1;
        document.getElementById("button").innerHTML = "Continue game";
    }
}

document.onkeydown = function(event) { //função para detectar as setas do teclado que sao pressionadas
    if(gameState == 1){
        return false;
    }
    else{
        switch (event.keyCode) {
        case 37: //se for a seta <
                var arrow = 37;
                arrowMovimentation(arrow);
            break;
        case 38: //se for a seta ^
                arrow = 38;
                arrowMovimentation(arrow);
            break;
        case 39: //se for a seta >
                arrow = 39;
                arrowMovimentation(arrow);
            break;
        case 40: //se for a seta para baixo
                rotatePiece();
            break;
        case 67:
                arrow = 67;
                arrowMovimentation(arrow);
        break;
        case 80:
                arrow = 80;
                arrowMovimentation(arrow);
        break;
        }
    }
};



function arrowMovimentation(arrow){ // funcao de movimentaçao horizontal da peça
    if(arrow == 37)
    {
        if(checkColision(0, -1, mainPiece.GoTetramino)){
            return false;
        }
        else{
            deletePiece();
            mainPiece.col--;
            drawPiece();
        }
    }
    else
    if(arrow == 39)
    {
        if(checkColision(0, 1, mainPiece.GoTetramino)){
            return false;
        }
        else{
            deletePiece();
            mainPiece.col++;
            drawPiece();
        }
    }
    else
    if(arrow == 38)
    {
        if(checkColision(-1, 0, mainPiece.GoTetramino)){
            drawPieceOnBoard();
            mainPiece = nextPiece;
            nextPiece = generatePiece((Math.floor(Math.random()*6)+1));
            if(checkGameOver()){
                return false;
            }
            else{
                drawNextPiece(nextPiece);
            }
            return false;

        }
        else{
            deletePiece();
            mainPiece.row--;
            drawPiece();
        }
    }
    if(arrow == 40) //Funcao para girar a peca
    {
        if (mainPiece.TetraminoN > 3)//reseta o vetor
        {
            mainPiece.TetraminoN =0;
        }
        else //se nao for a ultima posicao da peca 
        {
            deletePiece();
            mainPiece.GoTetramino = mainPiece.Tetramino;
            mainPiece.Tetramino[mainPiece.TetraminoN++];
            drawPiece();
        }
    }
    else
    if(arrow == 67){
        if(checkPecaDaMao == true){
            deletePecaDaMao(PecaDaMao);
            deletePiece();
            mainPiece= PecaDaMao;
            drawPiece(mainPiece);
            checkPecaDaMao = false;
        }
        else{
            PecaDaMao = mainPiece;
            deletePiece();
            drawPecaDaMao(PecaDaMao);
            mainPiece = nextPiece;
            pieceCode = (Math.floor(Math.random()*6)+1);
            nextPiece = generatePiece(pieceCode);
            drawNextPiece(nextPiece);
            drawPiece(mainPiece);
            checkPecaDaMao = true;
        }
    }
    else
    if(arrow == 80){
        pauseGame();
    }
}

function checkColision(r, c, futurePiece){
    for(row = 0 ; row < mainPiece.GoTetramino.length ; row++){
        for(col = 0 ; col < mainPiece.GoTetramino.length ; col++){
            if(futurePiece[row][col] != 0){
                let nextRow;
                let nextCol;
                nextRow = row + r + mainPiece.row;
                nextCol = col + c + mainPiece.col;
                if(nextRow < 0 || nextCol < 0 || nextCol > NCOL){
                    
                    return true;
                }
                if(main[nextRow][nextCol] != EMPTY_SQ){

                    return true;
                }
                else{
                    continue;
                }
            }
            else{
                continue;
            }
        }
    }
    return false;
}

function drawPieceOnBoard(){
    for(row = 0 ; row < mainPiece.GoTetramino.length ; row++){
        for(col = 0 ; col < mainPiece.GoTetramino.length ; col++){
            if(mainPiece.GoTetramino[row][col] == 1){
                main[row+mainPiece.row][col+mainPiece.col] = mainPiece.color;
                mainBlocks.fillStyle = mainPiece.color ; //Define a cor do bloco gerado
                mainBlocks.fillRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                mainBlocks.strokeRect((mainPiece.col+col)*width_pixel, (row+mainPiece.row)*height_pixel, width_pixel, height_pixel);
            }
        }
       
    }
   checkRow(); 
}

function checkRow(){
    var count = 0;
    var rowsSequence=0;
    for(row = 0 ; row < NROW ; row++){
        for(col = 0 ; col < NCOL ; col++){ //percorre a matriz base inteira
            if(main[row][col] != EMPTY_SQ){ //verifica se é diferente de vazio
                count++;
            }
        }
        if(count == NCOL){ // compara se a linha inteira está preenchida;

            rowscount++;
            var display = "Linhas: " + rowscount.toString();
            document.getElementById("rows").innerHTML = display;
            console.log("Main piece: ", mainPiece,"Actual piece: ", actualPiece,"M: ", M)
            if (mainPiece.GoTetramino == M[0])
            {
                rotacionar();
            }
            rowsSequence++;
            for(lin = row; lin < NROW-1; lin++){
                for(col = 0; col < NCOL; col ++){  // se foi preenchida
                    main[lin][col] = main[lin+1][col]; // coloca as colunas em branco
                    mainBlocks.fillStyle = main[lin][col]; //Define a cor do bloco gerado
                    mainBlocks.fillRect(col*width_pixel, lin*height_pixel, width_pixel, height_pixel);//Linha*tamDoBloco,Coluna*TamDoBloco, TamDoBloco,TamDoBloco
                    mainBlocks.strokeRect(col*width_pixel, lin*height_pixel, width_pixel, height_pixel);
                }
            }
            count = 0;
            row--;
        }
        else{
            count = 0; 
        }
    }
    if(rowsSequence > 0){
        points += (rowsSequence*10)*rowsSequence;
        var display = "Pontuação: " + points.toString();
        document.getElementById("points").innerHTML = display;
        controlSpeed += (rowsSequence*10)*rowsSequence;
        if(controlSpeed/200 >= 1){
            level++;
            var display = level.toString() + "x";
            document.getElementById("level").innerHTML = display;        
            gameSpeed =  Math.floor(gameSpeed*0.5);
            controlSpeed -= 200;
            clearInterval(interval);
            interval = setInterval(tickMovimentation, gameSpeed);
        }
    }
}

function rotacionar()
{
    if (rotateElement.classList[0] == 'rotacionar')
        rotateElement.classList.remove('rotacionar')
    else
        rotateElement.classList.add('rotacionar');
}

function rotatePiece(){
    let futureN = mainPiece.TetraminoN;
    let futureTetramino = mainPiece.GoTetramino;
    if(futureN == 3){
        futureN = 0;
        futureTetramino = mainPiece.Tetramino[futureN];
    }
    else{
        futureN++;
        futureTetramino = mainPiece.Tetramino[futureN];
    }
    if(checkColision(0, 0, futureTetramino)){
        return false;
    }
    else{
        deletePiece();
        mainPiece.TetraminoN = futureN;
        mainPiece.GoTetramino = futureTetramino;
        drawPiece();
    }
}

function gameTime()
{
    if (gameState == 1 || paused == 1)
        return false;
    seconds++;
    if (seconds%2){
        time =seconds;
    }
    var display = "Tempo: " + seconds.toString() + " segundos";
    document.getElementById("time").innerHTML = display;
    
    return true;
}
/*Funcao para o ranking */
var name;
var time;
var cont=0;

//Criando arrow function como objeto pessoa
class Pessoa {
    constructor() {
        this.name = setName(name);
        this.points = points;
        this.level = level;
        this.time = seconds;
    }
};

//Funções para setar o valor dos atributos
function setName(){
    name =  "<?php $_SESSION['login']; ?>";
    return name;
}

function generateRanking(){
	if(confirm("GAMEOVER, deseja reiniciar o jogo?"));{
		document.location.reload(true);
	}
    players.push (new Pessoa());
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "tetris"
    });
    
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        var sql = "INSERT INTO `score` VALUES (NULL,?, ?)";
        con.query(sql,Pessoa.name,Pessoa.points, function (err, result) {
        if (err) throw err;
        console.log("1 record inserted");
        });
    });

    return false;
}

 




