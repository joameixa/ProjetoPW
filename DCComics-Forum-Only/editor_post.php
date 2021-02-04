<html>
	<head>		
	<meta name="author" value="João Ameixa"/>
	<meta name ="date" value="Janeiro de 2018"/>
	<meta name ="contact" value="joaomfameixa@gmail.com"/>
	<meta charset="utf-8"/>
	<title>Editar</title>
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
 //Editar / criar post
    session_start();
    if(!isset($_SESSION['nome']))
    {
        include 'cabecalho.php';
        echo '<div class="erro">Não tem permissão para ver esta página.<br><br>
                <a href="index.php">Retroceder</a>
            </div>';
        
        include 'rodape.php';
        exit;
    }


    //-----------------------------------------------------
    include 'cabecalho.php';


    //-----------------------------------------------------
    //Verificar se e para editar o post
    $pid = -1;
    $editar = false;
    $mensagem = "";
    $titulo = "";

    if(isset($_REQUEST['pid']))
    {
        $pid = $_REQUEST['pid'];
        $editar = true;

        //vai buscar os dados do post a bd
        include 'config.php';
        $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
        $motor = $ligacao->prepare("SELECT * FROM posts WHERE id_post = ".$pid);
        $motor->execute();

        $dados = $motor->fetch(PDO::FETCH_ASSOC);
        $ligacao = null;

        $titulo = $dados['titulo'];
        $mensagem = $dados['mensagem'];
    }



    //-------------------------------------------------------------------------------
    // Dados do utilizador que está logado
    echo '<div class="dados_utilizador">
        <span>'.$_SESSION['nome'].'</span>    |   <a href="logout.php">Log Out</a>
    </div>';

    //-----------------------------------------------------
    //Formulario para construcao dos posts //<input type="text" name="text_titulo" size="85" value='.$titulo.'><br><br>
    echo '<div>
        <form class="form_post" method="post" action="post_add.php">

        <h3>Post<h3><hr><br>
        
        <input type="hidden" name="id_user" value='.$_SESSION['id'].'>
        <input type="hidden" name="id_post" value='.$pid.'>

        Título:<br>
		<select name="text_titulo" value='.$titulo.' size=4>
			<option value=Arrow> Arrow
			<option value=Flash> Flash
			<option value=Supergirl> Supergirl
			<option value=Legends of Tomorrow> Legends of Tomorrow
			</select>
			
       
        <br><br>
        Mensagem:<br>
        <textarea rows="10" cols="87" name="text_mensagem">'.$mensagem.'</textarea><br><br>

        <input type="submit" value="Gravar"><br><br>

        <a href="forum.php">Voltar</a>

        
    </div>	
	</form>';

    //----------------------------------------------------
    include 'rodape.php';
   

		?>	
	</div>
	</body>
</html>