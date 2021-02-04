<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: perfil.php');
        exit();
    }

    function Apresentar_form(){
        echo '<form class="form_login" method="POST" action="login.php">

                    <h3>Login</h3><hr><br>
                    Para entrar no Forum da DC Comics necessita introduzir o seu username e a sua password.<br>
                    Se não tem conta de utilizador, pode <a href="signup.php">criar uma nova</a>.<br><br>

                    Username:<br>
                    <input type="text" size="20" name="text_utilizador"><br><br>

                    Senha:<br>
                    <input type="password" size="20" name="text_password"><br><br>

                    <input type="submit" name="submit" value="Entrar"><br><br>

                </form> ';
    }

    function Verificar_FormLogin(){
        include 'config.php';
        $liga = mysqli_connect("$host", "$user", "$password", "$base_dados");
            
        $utilizador = $_POST['text_utilizador'];
        $pass = $_POST['text_password'];

        if (empty($utilizador) || empty($pass)) {
            echo '<p> Preencha o Formulário Corretamente </p>;
            <a href="index2.php"> Voltar </a>';
            exit();
        } else {
            $pass_encript = md5($pass);
            
            $sql = "SELECT * FROM users WHERE username='$utilizador' AND pass='$pass_encript'";
            $resultado = mysqli_query($liga, $sql);
            if(mysqli_num_rows($resultado) < 1){
                echo ' Erro ';
                exit();
            } else {
				include 'cabecalho.php';
                while ($num_registos = mysqli_fetch_assoc($resultado)) {
                    $_SESSION['id'] = $num_registos['id_user'];
                    $_SESSION['nome'] = $num_registos['username'];
                    $_SESSION['palavra_passe'] = $num_registos['pass'];

                    header('Location: perfil.php');
                    
                    exit();
                }
            }
        }
    }

    if (!isset($_POST['submit'])) {
        Apresentar_form();
    } else {
        Verificar_FormLogin();
    }
