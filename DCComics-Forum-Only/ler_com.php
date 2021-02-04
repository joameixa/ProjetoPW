<html lang="pt">
<title>DC Comics Forum</title>
<meta charset="utf-8">
<link rel="stylesheet" href=style1.css type="text/css"/>
<body>


  <!-- Header -->
  <header class="content">

    <font face="Source Sans Pro Black" color=Black size=5>
		<ul>
			<li><a href=index.php><img src=home.png width=100px height=80px  align=left></a></li>
			<li><a href=paginadc.html><img src=dclogo.png width=80px height=40px align=left></a></li>
			<li><a href=paginaarrow.html><img src=iconearrow.jpg width=100px height=50px  align=left></a></li>
			<li><a href=paginaflash.html><img src=iconeflash45.png width=100px height=50px   align=left></a></li>
			<li><a href=paginasupergirl.html><img src=iconesupergirl45.jpg width=100px height=50px  align=left></a></li>
			<li><a href=paginalegends.html><img src=iconelegends.png width=100px height=50px  align=left></a></li>
			<li><a href=comentario.html>Comentario</a></li>
			<li><a href=index2.php align=right>Login</a></li>
		</ul>
		<font>
  </header>
  
<h3 align=center>Comentários já inseridos</h3>
<?php
error_reporting(false);
$f=fopen("registo_com.txt","r");
//Lê cada linha do ficheiro
while (!feof($f))
{
if($f=fopen("registo_Com.txt","r")){
echo "<table align=center border=1>";
echo "<td align=center>Nome</td>";
echo "<td align=center>Sobrenome</td>";
echo "<td align=center>O que acha?</td>";
echo "<td align=center>O que pode ser melhorado?</td>";
echo "<td align=center>Apreciação</td>";
while(!feof($f))
{
echo "<tr>";
$i=0;
$linha=fgets($f);
$dados=explode(",",$linha);
for($i=0;$i<5;$i++)
{
echo "<td align=center> ".$dados[$i]."</td>";
}
}
echo "</table>";
}
}
fclose($f);
?>
<br>
<center><font color="black"><input type="button" value="Voltar" onClick="history.go(-1)"></center>
</body>  
</html>