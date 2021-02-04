<html>
	<head>
		<meta name="author" value="João Ameixa"/>
	<meta name ="date" value="Janeiro de 2021"/>
	<meta name ="contact" value="joaomfameixa@gmail.com"/>
	<meta charset="utf-8"/>
	<title>Forum DC Comics</title>
	<link rel="shortcut icon" href="dclogo.png" type="image/x-png"/>
	<link rel="stylesheet" href=style1.css type="text/css"/>
	<link rel="stylesheet" href=main.css type="text/css"/>	
	</head>
	
	<body>
		<div class="example1">
	<font face="Source Sans Pro Black" size=25>
	<ul>
		<li><a href=index.php><img src=home.png height=6%></a></li>
		<li><a href=paginadc.html><img src=dclogo.png height=6%></a></li>
	</ul>
	
	</font>
		<?php

    session_start();
    if(!isset($_SESSION['nome']))
    {
        include 'cabecalho.php';
        echo '<div class="erro">Não tem permissão para ver o conteúdo do fórum.<br><br>
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
		

	//-------------------------------------------------------------------------------
	// Novo post
	echo '<div class="novo_post"><a href="editor_post.php">Novo Post</a></div>';


    //-------------------------------------------------------------------------------
    // Apresentacao dos posts
	
	include 'config.php';
	
	$ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
	
	//Buscar od dados dos posts
	$sql="SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user ORDER BY data_post DESC"; 
	$motor = $ligacao->prepare($sql);
	$motor->execute();
	$ligacao = null;
	
	if($motor->rowCount() == 0)
	{
		echo '<div class="login_sucesso">
			Não existem posts no fórum.
		</div>';
	}
	else
	{
		//foram encontrados posts na base de dados
		foreach($motor as $post)
		{
			//dados do post
			$id_post = $post['id_post'];
			$id_user = $post['id_user'];
			$titulo = $post['titulo'];
			$mensagem = $post['mensagem'];
			$data_post = $post['data_post'];
			
			//dados do utilizador
			$username = $post['username'];				
			
			
			echo '<div class="post">';
				
			//dados user
			echo '<span id="post_username">'.$username.'</span>';
			echo '<span id="post_titulo">'.$titulo.'</span>';
			echo '<hr>';
			echo '<div id="post_mensagem">'.$mensagem.'</div>';

			//data e hora
			echo '<div id="post_data">';
			
			//adicionar link edidar para o utilizador
			if($id_user == $_SESSION['id'])
			{
				echo '<a href="editor_post.php?pid='.$id_post.'" id="editar">Editar</a>';
			}
			echo $data_post;
			//echo '<span id="$id_post">#'.$id_post.'<span>';
			echo '</div></div>';
			
		}
	}


	//-------------------------------------------------------------------------------
	//Buscar users
	$ligacao =  new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
	$motor = $ligacao->prepare("SELECT id_user FROM users");
	$motor->execute();
	$numUsers = $motor->rowCount();
	if($numUsers == null) $numUsers = 0;
	$ligacao = null;

	//Buscar posts
	$ligacao =  new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
	$motor = $ligacao->prepare("SELECT id_post FROM posts");
	$motor->execute();
	$numPosts = $motor->rowCount();
	if($numPosts == null) $numPosts = 0;
	{

	//Apresentar os dados: nuemero  de users e numero de posts guardados na bd
	echo '<div class="totais">
			Número de utilizadores registados: <strong>'.$numUsers.'</strong> | Número total de posts: <strong>'.$numPosts.'</strong>.
		</div>';
	}
    //-------------------------------------------------------------------------------
	include 'rodape.php';
    //-------------------------------------------------------------------------------
	
   

		?>		
			
		</div>	
	</div>
	</body>
</html>