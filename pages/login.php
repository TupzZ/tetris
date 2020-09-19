<?php 
    if(Panel::logged())
        header('Location: '.INCLUDE_PATH_PAINEL);
?>

<style>
    <?php include('styles/login.css'); ?>
</style>

<section class="login">
    <img src="assets/images/animatedBg.gif" alt="Background" class="bg" />
    <div class="loginContainer">
        <h1 class="title">TETRIS UNICHAMPS</h1>
        <h2 class="loginText">FAÇA O LOGIN</h2>
        <div class="loginInputs">
            <form method="post">
                <input type="text" name="username" class="userInput" placeholder="USUARIO"></input>
                <input type="password" name="pass" class="passInput" placeholder="SENHA"></input>
                <input type="submit" name="sub" class="loginButton" value="LOGIN"></input>
            </form>
            <?php
            if(isset($_POST['sub'])){
                if(Panel::verifyLogin($_POST['username'], md5($_POST['pass'])) === 1){
                    echo '<div class="success"><span>Logado com sucesso!</span></div>';
                }
                else
                    echo '<div class="error"><span>Usuário e/ou senha incorretos!</span></div>';
            }
            ?>
            <p class="signUp">AINDA NÃO É CADASTRADO?<br/>FAÇA SEU CADASTRO <a href="<?php echo INCLUDE_PATH; ?>signup" class="signUpButton">AQUI</a></p>
        </div>
    </div>
</section>