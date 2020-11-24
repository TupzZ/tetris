# TetrisRolling
 Tetris Rolling game
 
 # Apresentação do projeto
 
O trabalho aqui contido foi desenvolvido para disciplina SI401, com o intuito de gerar um jogo chamado Rolling Tetris
 
 # Tecnologias utilizadas
 - PHP
 - JS
 - HTML
 - CSS
 
 # Banco de Dados
 
 Dentro do diretorio Assets existe o diretorio database, onde esta o sql do banco de dados utilizado, e também existe um script PHP que ao rodar ele utilizando o localhost ele ira gerar o banco de dados.
 
 # Explicações não descritas no filme
 
 O codigo foi implementado em html porem usando a extensão ".php", pois se viu mais facil a implementação ja dessa maneira para facilitar processos futuros, o validador da W3 da erro nas tags pois nao conta com a existencia de PHP dentro de arquivos HTML, sendo o arquivo home.php o que mais contem codigo php dentro da execução dos botões e por isso contem 16 erros de validação, esses erros não são solucionaveis pois o validador não conta com a existencia da tag "<?php?>" no HTML5.
 Existem outros arquivos PHP como o cofig.php e as classes User.php, Panel.php e Mysql.php, elas contem as funções previamente escritas para controle de acesso vindo do servidor.
 A logica do Jogo foi desenvolvida em JS, sendo que as alterações e execuções do programa sempre miram os IDs das tags, fazendo mudançãs nos seus comportamentos. Foi selecionado o Canvas para a criação da Mattriz onde o jogo ocorre e para a manipulação das peças, onde é possivel tratar o jogo de maneira mais matematica, levando assim a criação da fisica do jogo atraves de uma matriz que o tamanho é selecionado pelo Usuario. Na descrição do problema é pedido para adicionar duas coisas, um tabuleiro flexivel em tamanho com pelo menos 2 tamanhos, e que ele faça uma rotação caso a peça especial destrua a linha, a peça especial é o quadrado, e quando esse tetramino destroi a linha ele aciona o metodo Rotacionar(), que permite a rotação em 180 graus da matriz.
 
# Alterações a serem feitas no futuro
 Iremos adicionar a pagina para a alteração dos dados do usuario na fase de manipulação de dados do servidor, pois iremos utilizar dessa fase para criar um banco de dados um pouco mais robusto. E esse também é o mesmo caso do Ranking, pois iremos adicionar as informações do ranking no servidor apos o fim do jogo e organizar o ranking dos players mostrado no ambiente visual utilizando PHP. 
 


# Video do grupo 
 https://drive.google.com/file/d/1B7gNaEdV_4WSwrxqJXhN9gjHaxQ4j5oE/view?usp=sharing
