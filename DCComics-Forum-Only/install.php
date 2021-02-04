<?php
    // Informações da base de dados
    include 'config.php';


    //-------------------------------------------------------------------------------
    // Criar a base de dados
    $ligacao = new PDO("mysql:host=$host", $user, $password);
    $motor = $ligacao->prepare("create database $base_dados");
    $motor->execute();
    $ligacao = null;
	
    echo '<p>Base de dados criada com sucesso.</p><hr>';


    //-------------------------------------------------------------------------------
    // Abrir a base de dados
    $ligacao = new PDO ("mysql:dbname=$base_dados;host=$host", $user, $password);
$ligacao2 = new PDO ("mysql:dbname=$base_dados;host=$host", $user, $password);

    //-------------------------------------------------------------------------------
    // Tabela "users"
    $sql = "create table users(
            id_user         int not null primary key,
            username        varchar(30),
            pass            varchar(100)
            )";
    
    $motor = $ligacao->prepare($sql);
    $motor->execute();

	$ligacao = null;
    //Os Users são criados pelos forms

    echo '<p>Tabela "users" criada com sucesso.</p>';
	
	  
    //-------------------------------------------------------------------------------
    // Tabela "posts"
	
	$sql="CREATE TABLE posts(
			id_post int primary key not null,
			id_user int not null,
			titulo varchar(100),
			mensagem text,
			data_post datetime,
			foreign key(id_user) references users(id_user) on delete cascade
			)";
	$motor = $ligacao2 -> prepare($sql);
	$motor->execute();

	$ligacao = null;
		
	echo '<p>Tabela "posts" criada com sucesso.</p>';
    echo '<hr>';
    echo '<p>Processo de criação de base de dados criado com sucesso.</p>';
?>