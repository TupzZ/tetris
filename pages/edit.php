<?php 
    if(Panel::logged())
        header('Location: '.INCLUDE_PATH);
?>

<style>
    <?php include('styles/login.css'); //adição do css da pagina?>
</style>

<section class="login">
    <div class="">
        <h2 class="loginText">Mudança Cadastral</h2>
        <div class="loginInputs">
            <form method="post">
                <input type="text" name="username" class="userInput" placeholder="USUARIO" ></input>
                <input type="text" name="nome" class="userInput" placeholder="NOME" ></input>
                <input type="text" name="nascimento" class="userInput" placeholder="DATA DE NASCIMENTO" ></input>
                <input type="text" name="cpf" class="userInput" placeholder="CPF" ></input>
                <input type="text" name="tel" class="userInput" placeholder="TELEFONE" ></input>
                <input type="text" name="email" class="userInput" placeholder="EMAIL" ></input>
                <input type="password" name="pass" class="passInput" placeholder="SENHA" ></input>
                <input type="submit" name="sub" class="loginButton" value="CADASTRE-SE"></input>
            </form>
            <?php
            if(isset($_POST['sub'])){
                if(Panel::verifyUser($_POST['username']) === 0){
					if()
                    User::editUser($_POST['username'],$_POST['nome'],$_POST['nascimento'],$_POST['cpf'],$_POST['tel'],$_POST['email'], md5($_POST['pass']));
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