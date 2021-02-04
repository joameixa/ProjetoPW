<?php
    session_start();

    if(!isset($_SESSION['id'])){
        echo 'OLA MUNDO ERROR';
    } else {
        if (isset($_POST['alter_nome'])){
            include 'config.php';
            $liga = mysqli_connect("$host", "$user", "$password", "$base_dados");

            $novo_nome = $_POST['novo_utilizador'];
            $id = $_SESSION['id'];

            $sql = "SELECT * FROM users WHERE username='$novo_nome'";
            $sql_result = mysqli_query($liga, $sql);
            if (mysqli_num_rows($sql_result) != 0) {
                echo ' Granda Azar ja existe';
            } else {
                $update = "UPDATE users SET username='$novo_nome' WHERE id_user='$id'";
                $exe = mysqli_query($liga, $update);

                $_SESSION['nome'] = $novo_nome;

                echo ' Alteracao concluida com sucesso <a href="perfil.php"> Voltar </a>';

            }
        }
        elseif (isset($_POST['alter_pass'])) {
            include 'config.php';
            $liga = mysqli_connect("$host", "$user", "$password", "$base_dados");

            $nova_pass = $_POST['nova_password'];
            $id = $_SESSION['id'];

            $nova_pass_encript = md5($nova_pass);

            $update = "UPDATE users SET pass='$nova_pass_encript' WHERE id_user='$id'";
            $exe = mysqli_query($liga, $update);

            $_SESSION['palavra_passe'] = $nova_pass_encript;

            echo ' Alteracao concluida com sucesso <a href="perfil.php"> Voltar </a>';

        }
    }