<?php 
    if(Panel::logged())
        header('Location: '.INCLUDE_PATH);
?>

<style>
    <?php include('styles/login.css'); ?>
</style>

<section class="login">
    <div class="loginContainer">
        <h1 class="title">TETRIS UNICHAMPS</h1>
        <h2 class="loginText">CADASTRE-SE</h2>
        <div class="loginInputs">
            <form method="post">
                <input type="text" name="username" class="userInput" placeholder="USUARIO" required></input>
                <input type="password" name="pass" class="passInput" placeholder="SENHA" required></input>
                <input type="submit" name="sub" class="loginButton" value="CADASTRE-SE"></input>
            </form>
            <?php
            if(isset($_POST['sub'])){
                if(Panel::verifyUser($_POST['username']) === 0){
                    User::addUser($_POST['username'], md5($_POST['pass']));
                    echo '<div class="success"><span>Usuário cadastrado com sucesso!</span></div>';
                }
                else
                    echo '<div class="error"><span>Nome de usuário já cadastrado!</span></div>';
            }
            ?>
            <p class="signUp">JÁ É CADASTRADO?<br/>FAÇA O LOGIN <a href="<?php echo INCLUDE_PATH; ?>login" class="signUpButton">AQUI</a></p>
        </div>
    </div>
</section>