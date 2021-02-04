<html> 
    <head>
        <meta charset="utf-8">
    </head>
<?php
    // Signup
    $id_sessao = session_id();
    if(empty($id_sessao)) session_start();

    if (isset($_SESSION['id'])) {
        header('Location: perfil.php');
        exit();
    }

    
    //-------------------------------------------------------------------------------
    // Cabeçalho
    include 'cabecalho.php';
    

    // Verificar se foram inseridos dados
    if(!isset($_POST['btt_submit'])) {
        ApresentarFormulario();
    }
    else
    {
        RegistarUtilizador();
    }


    //-------------------------------------------------------------------------------
    // Rodapé
    include 'rodape.php';

   
    //-------------------------------------------------------------------------------
    // Funções
    //-------------------------------------------------------------------------------
    function ApresentarFormulario() {
        // Apresenta o formulário de signup
        echo '
            <form class="form_signup" method="post" action="signup.php?a=signup" enctype="multipart/form-data">
                <h3>Signup</h3><hr><br>

                Username:<br>
                <input type="text" size="20" name="text_utilizador"><br><br>

                Password:<br>
                <input type="password" size="20" name="text_password1"><br><br>

                Repita a password:<br>
                <input type="password" size="20" name="text_password2"><br><br>

               <br>
                <input type="submit" name="btt_submit" value="Registar"><br><br>
                <a href="index.php">Voltar</a>
            </form>
        ';
    }
    
    function RegistarUtilizador() {
        // Regista um novo utilizador
        $utilizador = $_POST['text_utilizador'];
        $password1 = $_POST['text_password1'];
        $password2 = $_POST['text_password2'];
        //$avatar = $_FILES['imagem_avatar'];

        $erro = false;

        //-------------------------------------------------------------------------------
        
        // Erros

        // Tem de preencher todos os campos
        if($utilizador=="" || $password1=="" || $password2=="") {
            echo '<div class="erro">Tem de preencher todos os campos!</div>';
            $erro = true;
        }

        // As passwords não coincidem
        elseif($password1 != $password2) {
            echo '<div class="erro">As passwords não coincidem!</div>';
            $erro = true;
        }

        //-------------------------------------------------------------------------------
        // Verificar se existiram erros
        if($erro)
        {
            ApresentarFormulario();
            include 'rodape.php';
            exit;
        }


        //-------------------------------------------------------------------------------
        // Processamento do registo de novo utilizador
        //-------------------------------------------------------------------------------
        include 'config.php';
        $ligacao = new PDO ("mysql:dbname=$base_dados;host=$host", $user, $password);

        //-------------------------------------------------------------------------------
        // Verificar se já existe um utilizador com o mesmo username
        $motor = $ligacao->prepare("select username from users where username = ?");
        $motor->bindparam(1, $utilizador, PDO::PARAM_STR);
        $motor->execute();

        if($motor->rowCount() != 0)
        {
            // Erro - Utilizador já se encontra registado
            echo '<div class="erro">Já existe um utilizador com esse username.</div>';
            $ligacao = null;
            ApresentarFormulario();

            include 'rodape.php';
            exit;
        }
        else {
            // Registo do novo utilizador
            $motor = $ligacao->prepare("select MAX(id_user) as MaxID from users");
            $motor->execute();
            $id_temp = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];
            if($id_temp == null)
            {
                $id_temp = 0;
            }
            else {
                $id_temp++;
            }

            // Encriptar a password
            $passwordEncriptada = md5($password1);

            $sql = "insert into users values( :id_user, :user, :pass)";
            $motor = $ligacao->prepare($sql);
            $motor->bindparam(":id_user", $id_temp, PDO::PARAM_INT);
            $motor->bindparam(":user", $utilizador, PDO::PARAM_STR);
            $motor->bindparam(":pass", $passwordEncriptada, PDO::PARAM_STR);
            $motor->execute();
            $ligacao = null;


            // Mensagem de boas-vindas
            echo '
            <div class="novo_registo_sucesso">Bem-Vindo ao Forum da DCComics, <strong>'.$utilizador.'</strong><br><br>
            A partir deste momento pode realizar o seu login e participar neste forum de Séries DCComics online.
            <br><br>
            <a href="login.php">Login</a>
            </div>
            ';
        }
    }

?>
</html>