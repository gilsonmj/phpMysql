<?php

session_start();
include_once("conection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $resultUser = "DELETE FROM usuarios WHERE id='$id'";
    $resultUsuario = mysqli_query($conn, $resultUser);
    
    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green'> Usuário apagado com sucesso. </p>" ;
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red'> Erro: usuário não foi apagado com sucesso. </p>";
        header("Location: index.php");
    }

}else {
    $_SESSION['msg'] = "<p style='color:red'> Necessário selecionar um usuário. </p>";
    header("Location: index.php");
};

    




?>