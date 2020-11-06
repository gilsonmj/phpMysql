<?php

session_start();
include_once("conection.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
$district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
$telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
$animalSpecies = filter_input(INPUT_POST, 'animalSpecies', FILTER_SANITIZE_STRING);
$complaint = $_POST['complaint'];
$complaint_implode = implode(", ",$complaint);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$freeanimal = filter_input(INPUT_POST, 'freeanimal', FILTER_SANITIZE_STRING);
$tutoraction = filter_input(INPUT_POST, 'tutoraction', FILTER_SANITIZE_STRING);
$gavasaction = filter_input(INPUT_POST, 'gavasaction', FILTER_SANITIZE_STRING);






//echo = "Nome: $nome <br>";
//echo = "Email: $email <br>";

$resultUsers = "INSERT INTO usuarios (nome, email, adress, district, telephone, animalSpecies, complaint, comments, freeanimal, tutoraction, gavasaction, created) VALUES('$nome', '$email', '$adress', '$district', '$telephone', '$animalSpecies', '$complaint_implode', '$comments', '$freeanimal', '$tutoraction', '$gavasaction', NOW())";
$resultadoUsuario = mysqli_query($conn, $resultUsers);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<a style='color:green'> Usuário cadastrado com sucesso </a>";
    header("Location: index.php");
} else {
    $_SESSION['msg'] = "<a style='color:green'> Usuário não foi cadastrado </a>";
    header("Location: register.php");
}
