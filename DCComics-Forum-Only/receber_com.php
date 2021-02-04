<html lang="pt">
<title>DC Comics Forum</title>
<meta charset="utf-8">
<link rel="stylesheet" href=style1.css type="text/css"/>
<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

  <!-- Header -->
  <header class="content">

    <font face="Source Sans Pro Black" color=Black size=5>
		<ul>
			<li><a href=index.php><img src=home.png width=100px height=80px  align=left></a></li>
			<li><a href=paginadc.html><img src=dclogo.png width=100px height=80px   align=left ></a></li>
			<li><a href=paginaarrow.html><img src=iconearrow.jpg width=100px height=50px  align=left></a></li>
			<li><a href=paginaflash.html><img src=iconeflash45.png width=100px height=50px   align=left></a></li>
			<li><a href=paginasupergirl.html><img src=iconesupergirl45.jpg width=100px height=50px  align=left></a></li>
			<li><a href=paginalegends.html><img src=iconelegends.png width=100px height=50px  align=left></a></li>
			<li><a href=comentario.html>Comentario</a></li>
			<li><a href=index2.php align=right>Login</a></li>
		</ul>
		<font>
  </header>
<!-- <body background="fundo.jpg"> !-->
  <font color="Black">
<?php
if($_POST['nome']){
if($_POST['sobrenome']){
if($_POST['opiniao1']){
if($_POST['opiniao2']){
if($_POST['gosto']){
if($_POST['nome'] != $_POST['sobrenome'])
echo "Comentário introduzido com sucesso!";
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$opiniao1 = $_POST["opiniao1"];
$opiniao2 = $_POST["opiniao2"];
$gosto = $_POST["gosto"];
$conteudo="$nome,$sobrenome,$opiniao1,$opiniao2,$gosto,\r\n";
if (!$abrir=fopen("registo_com.txt","a"))
{
echo " Erro ao abrir ficheiro";
exit;
}
if (!fwrite($abrir,$conteudo))
{
echo " Erro ao escrever no ficheiro";
exit;
}
echo " Ficheiro gravado com sucesso!";
fclose($abrir);
}
else
{
	echo "Nao escolheu a apreciação!";
}
}
else
{
	echo "Nao disse o que achava que pode ser melhorado!";
}
}
else
{
	echo "Nao explicou o que acha do site!";
}
}
else
{
	echo "Nao introduziu o sobrenome!";
}
}
else
{
	echo "Nao introduziu o nome!";
}

?>
<br>
<br>
<form> 
</font>
<font color="black"><input type="button" value="Voltar" onClick="history.go(-1)"> 
</form>
</body>
</html>