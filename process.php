<?php 

    include_once("conection.php");
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_EMAIL);

    //echo = "Nome: $nome <br>";
    //echo = "Email: $email <br>";

    $resultUsers = "INSERT INTO usuarios (nome, email, created) VALUES('$nome', '$email', NOW())";
    $resultadoUsuario = mysqli_query($conn, $resultUsers);
?>