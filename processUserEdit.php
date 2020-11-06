<?php
    session_start();
    include_once("conection.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
    $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $animalSpecies = filter_input(INPUT_POST, 'animalSpecies', FILTER_SANITIZE_STRING);

    

    $resultUsers = "UPDATE usuarios SET nome = '$name', email = '$email', adress = '$adress', district = '$district', telephone = '$telephone', animalSpecies = '$animalSpecies', modified=NOW() WHERE id='$id';";
    $resultadoUsuario = mysqli_query($conn, $resultUsers);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<a style='color:green'> Usuário editado com sucesso </a>" ;
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<a style='color:red'> Usuário não foi editado com sucesso </a>";
        header("Location: editUser.php?id=$id");
    }

?>
