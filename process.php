<?php 

    session_start();
    include_once("conection.php");
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    //echo = "Nome: $nome <br>";
    //echo = "Email: $email <br>";

    $resultUsers = "INSERT INTO usuarios (nome, email, created) VALUES('$nome', '$email', NOW())";
    $resultadoUsuario = mysqli_query($conn, $resultUsers);

    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green'> Usuário cadastrado com sucesso";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red'> Usuário não foi cadastrado com sucesso";
        header("Location: index.php");
    }
