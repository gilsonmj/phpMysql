<?php
    session_start();
    include_once("conection.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    

    $resultUsers = "UPDATE usuarios SET nome = '$name', email = '$email', modified=NOW() WHERE id='$id';";
    $resultadoUsuario = mysqli_query($conn, $resultUsers);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<a style='color:green'> Usuário editado com sucesso </a>" ;
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<a style='color:red'> Usuário não foi editado com sucesso </a>";
        header("Location: editUser.php?id=$id");
    }

?>
