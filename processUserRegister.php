<?php 

    session_start();
    include_once("conection.php");
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
    $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);



    //echo = "Nome: $nome <br>";
    //echo = "Email: $email <br>";

    $resultUsers = "INSERT INTO usuarios (nome, email, adress, district, telephone, created) VALUES('$nome', '$email', '$adress', '$district', '$telephone', NOW())";
    $resultadoUsuario = mysqli_query($conn, $resultUsers);

    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<a style='color:green'> Usuário cadastrado com sucesso </a>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<a style='color:green'> Usuário não foi cadastrado </a>";
        header("Location: register.php");
    }
