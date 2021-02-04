<html>
	<head>
		<meta name="author" value="João Ameixa"/>
		<meta name ="date" value="Janeiro de 2021"/>
		<meta name ="contact" value="joaomfameixa@gmail.com"/>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" href="home.png" type="image/x-png"/>
		<link rel="stylesheet" href=style1.css type="text/css"/>
		<title>Index</title>
	</head>
	<body>

	<?php
		session_start();
	?>
		
	<div class="content">
		<font face="Source Sans Pro Black" color=white size=5>
		<footer>
		<p>Copyright ©: João Miguel Fernandes Ameixa</p>
            <p>Contactos: </p>
		<a href="mailto:joaomfameixa@gmail.com"><img src=gmail.png height=6%></a>
		<a href=https://www.facebook.com/jonny.ameixa><img src=facebook.png height=6%></a>
		<a href=https://twitter.com/joaomfameixa><img src=twitter.png height=6%></a>
            <a href=https://www.instagram.com/jameixa14/><img src=instagram.png height=6%></a>
		</footer>
		</font>
		<font face="Source Sans Pro Black" color=Black size=5>
		<ul>
			<li><a class="active" href=index.php><img src=home.png height=6%></a></li>
			<li><a href=paginadc.html><img src=dclogo.png height=6%></a></li>
			<?php
				if (isset($_SESSION['id'])) {
					echo '<li><a href=forum.php>Forum</a></li>
					<li><a href="perfil.php"> ' . $_SESSION['nome'] . '</a></li>
						<li><a href="logout.php"> LogOut </a></li>';

				} else {
					echo '<li><a href=forum.php>Forum</a></li>
						<li><a href=login.php align=right>Login</a></li>';
				}
			?>
		</ul>
		<font>
	<button id="myBtn" onclick="myFunction()">Pausa</button>
	</div>
	
	</body>
	
</html>