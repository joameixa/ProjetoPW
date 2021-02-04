<html>
<head>
<link rel="stylesheet" href=style1.css type="text/css"/>
<link rel="stylesheet" href=main.css type="text/css"/>
</head>
<body>
<div class="example1">
	<font face="Source Sans Pro Black" color=white size=25>
	<ul>
		<li><a href=index.php><img src=home.png height=6%></a></li>
		<li><a href=paginadc.html><img src=dclogo.png height=6%></a></li>
	</ul>
	</font>
	</div>
	<div class="dados_utilizador">
	<font face="Source Sans Pro Black" color=black>
<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo 'OLA MUNDO ERROR';
    } else {
        echo  ' Bem-Vindo, <b>' . $_SESSION['nome'] . '</b>. Aqui podera alterar ver e alterar os seus dados <br><br>';
        
        

        if (isset($_POST['alter_nome'])) {
            echo '
                <form action="perfil.inc.php" method="POST">
                    Username:<br>
                    <input type="text" size="14" name="novo_utilizador"><br><br> 
                    <button type=submit name=alter_nome> Alterar nome</button>
                </form>';
        } else {
            echo '<p> ' . $_SESSION['nome'] . ' </p>
            <form action="perfil.php" method="POST"> 
                <button type=submit name=alter_nome> Alterar nome </button>
            </form><br>';
        }
        if (isset($_POST['alter_pass'])) {
            echo '
                <form action="perfil.inc.php" method="POST">
                    Senha:<br>
                    <input type="password" size="14" name="nova_password"><br><br>
                    <button type=submit name=alter_pass> Alterar palavra-passe </button>
                </form>';
        } else {
            echo '<p> ' . $_SESSION['palavra_passe'] . ' </p>
            <form action="perfil.php" method="POST"> 
                <button type=submit name=alter_pass> Alterar palavra-passe </button>
            </form><br>';
        }
    }
	echo '<div class="voltar"><a href="index.php">Voltar</a></div>';
	?>
	</font>
	</body>
	</div>