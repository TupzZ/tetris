<?php 
<<<<<<< Updated upstream
    if(Panel::logged())
        header('Location: '.INCLUDE_PATH);
=======
    if(!Panel::logged())
        header('Location: '.INCLUDE_PATH);
	$userData = Panel::getUser($_SESSION['login']);
>>>>>>> Stashed changes
?>

<style>
    <?php include('styles/login.css'); //adição do css da pagina?>
</style>

<section class="login">
    <div class="container">
        <h2 class="loginText">EDITAR PERFIL</h2>
        <div class="loginInputs">
            <form method="post">
                <input type="text" name="username" class="userInput" value="<?php echo $userData['username']; ?>" placeholder="USUARIO" ></input>
                <input type="text" name="nome" class="userInput" value="<?php echo $userData['nome']; ?>" placeholder="NOME" ></input>
                <input type="text" name="nascimento" class="userInput" value="<?php echo $userData['nacimento']; ?>" placeholder="DATA DE NASCIMENTO" ></input>
                <input type="text" name="cpf" class="userInput" value="<?php echo $userData['cpf']; ?>" placeholder="CPF" ></input>
                <input type="text" name="tel" class="userInput" value="<?php echo $userData['tel']; ?>" placeholder="TELEFONE" ></input>
                <input type="text" name="email" class="userInput" value="<?php echo $userData['email']; ?>" placeholder="EMAIL" ></input>
                <input type="password" name="pass" class="passInput" value="<?php echo $userData['password']; ?>" placeholder="SENHA" ></input>
                <input type="submit" name="sub" class="loginButton" value="EDITAR"></input>
            </form>
            <?php
            if(isset($_POST['sub'])){
                if(Panel::verifyUser($_POST['username']) === 0){
                    User::editUser($_POST['username'],$_POST['nome'],$_POST['nascimento'],$_POST['cpf'],$_POST['tel'],$_POST['email'], $_POST['pass']);
                    echo '<div class="success"><span>Usuário cadastrado com sucesso!</span></div>';
                }
                else
                    echo '<div class="error"><span>Nome de usuário já cadastrado!</span></div>';
            }
            ?>
            <p class="signUp"><a href="<?php echo INCLUDE_PATH; ?>" class="signUpButton">VOLTAR</a></p>
        </div>
    </div>
</section>