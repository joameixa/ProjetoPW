<html>
	<head>
		<head>
		<meta name="author" value="João Ameixa"/>
	<meta name ="date" value="Janeiro de 2021"/>
	<meta name ="contact" value="joaomfameixa@gmail.com"/>
	<meta charset="utf-8"/>
	<title>Forum DC Comics</title>
	<link rel="shortcut icon" href="dclogo.png" type="image/x-png"/>
	<link rel="stylesheet" href=style1.css type="text/css"/>
		
	</head>
	
	<body>
		<div class="example1">
	<font face="Source Sans Pro Black" size=25>
	<ul>
		<li><a href=index.php><img src=home.png height=6%></a></li>
		<li><a href=paginadc.html><img src=dclogo.png height=6%></a></li>
		<li><a href=paginaarrow.html><img src=iconearrow.jpg height=6%></a></li>
		<li><a href=paginaflash.html><img src=iconeflash45.png height=6%></a></li>
		<li><a href=paginasupergirl.html><img src=iconesupergirl45.jpg height=6%></a></li>
		<li><a href=paginalegends.html><img src=iconelegends.png height=6%></a></li>
	</ul>
	</font>
		<?php

session_start();
    if(!isset($_SESSION['nome']))
    {
        include 'cabecalho.php';
        echo '<div class="erro">Não tem permissão para ver o conteúdo da página.<br><br>
                <a href="index.php">Retroceder</a>
            </div>';
        include 'rodape.php';
        exit;
    }

    
    //-------------------------------------------------------------------------------
    include 'cabecalho.php';


    //-------------------------------------------------------------------------------
    // Dados do utilizador que está logado
    echo '<div class="dados_utilizador">
	<span>'.$_SESSION['nome'].'</span>    |   <a href="logout.php">Log Out</a>
    </div>';

    //buscar dados do formulário
    $id_user = $_POST['id_user'];
    $id_post = $_POST['id_post'];
    $titulo = $_POST['text_titulo'];
    $mensagem = $_POST['text_mensagem' ];
    $editar = false;

    //verificar se os campos estao preenchidos
    if($titulo == "" || $mensagem == "") 
    {
        // ERRO - Campos não preenchidos
        echo '<div class="erro">
            Não foram preenchidos os campos necessários.<br><br>
            <a href="editor_post.php">Tente novamente</a>
        </div>';
        include 'rodape.php';
        exit;
    }

    //abrir ligacao a bd
    include 'config.php';
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

    if($id_post == -1)
    {
        //vai buscar o id post disponivel
        $motor = $ligacao->prepare("SELECT MAX(id_post) AS MaxID FROM posts");
        $motor->execute();
        $id_post = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];

        if($id_post == null)
            $id_post = 0;
        else
            $id_post++;

        $editar = false;
    }
    else
    {
        $editar=true;
    }

    //-------------------------------------------------------------------------------
    //se for para editar
    if(!$editar)
    {
        //data atual
        $data = date('Y-m-d h:i:s', time());


        $motor = $ligacao->prepare("INSERT INTO posts VALUES(?,?,?,?,?)");
        $motor->bindParam(1, $id_post, PDO::PARAM_INT);
        $motor->bindParam(2, $id_user, PDO::PARAM_INT);
        $motor->bindParam(3, $titulo, PDO::PARAM_STR);
        $motor->bindParam(4, $mensagem, PDO::PARAM_STR);
        $motor->bindParam(5, $data, PDO::PARAM_STR);
        $motor->execute();
    }
    else
    {
        //atualizar os dados do post
        $data = date('Y-m-d h:i:s', time());

        $motor = $ligacao->prepare("UPDATE posts SET titulo = :tit, mensagem = :mess, data_post = :dat WHERE id_post = :pid");
        $motor->bindParam(":pid", $id_post, PDO::PARAM_INT);
        $motor->bindParam(":tit", $titulo, PDO::PARAM_STR);
        $motor->bindParam(":mess", $mensagem, PDO::PARAM_STR);
        $motor->bindParam(":dat", $data, PDO::PARAM_STR);
        $motor->execute();
    }

    //gravado com sucesso
    echo '<div class="login_sucesso">
        Post gravado com sucesso.<br><br>
        <a href="forum.php">Voltar</a>
    </div>';
    //-------------------------------------------------------------------------------
    include 'rodape.php';

		?>		
			
	</div>
	</body>
</html>