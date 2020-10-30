<?php
session_start();
include_once("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>CRUD - Listar</title>
</head>

<body>
    <div class="container">
        <a href="register.php">Cadastrar</a><br>
        <a href="index.php">Listar</a><br>
        <h1>Listar Usuário</h1>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        //Receber o número da página
        $pageList = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT,);
        $page = (!empty($pageList)) ? $pageList : 1;

        //Setar a quantidade de itens por página
        $resultPerPage = 10;

        //Calcular início de visualização
        $start = ($resultPerPage * $page) - $resultPerPage;

        $resultUsers = "SELECT * FROM usuarios LIMIT $start, $resultPerPage";
        $resultadoUsuario = mysqli_query($conn, $resultUsers);
        while ($rowUser = mysqli_fetch_assoc($resultadoUsuario)) {
            echo "<br>";
            echo "ID: " . $rowUser['id'] . "<br>";
            echo "Nome: " . $rowUser['nome'] . "<br>";
            echo "Email: " . $rowUser['email'] . "<br>";
            echo "<a href='editUser.php?id=" . $rowUser['id'] . "'>Editar</a><br>";
            echo "<a href='processDeleteUser.php?id=" . $rowUser['id'] . "' data-confirm='Tem certeza que deseja excluir o item selecionado?'>Excluir</a><br> <hr>";
        }

        //Paginação - Somar a quantidade de usuários
        $resultadoPg = "SELECT COUNT(id) AS num_result FROM usuarios";
        $resultPg = mysqli_query($conn, $resultadoPg);
        $rowPg = mysqli_fetch_assoc($resultPg);
        //echo $rowPg['num_result'];

        //Quantidade de página
        $pageQuant = ceil($rowPg['num_result'] / $resultPerPage);

        $maxLinks = 2;
        echo "<a href='index.php?pagina=1'> 1 </a>";

        for ($pagAnt = $page - $maxLinks; $pagAnt <= $page - 1; $pagAnt++) {
            if ($pagAnt >= 1) {
                echo "<a href='index.php?pagina=$pagAnt'>$pagAnt</a> ";
            }
        }

        for ($pagDep = $page + 1; $pagDep <= $page + $maxLinks; $pagDep++) {
            if ($pagDep <= $pageQuant) {
                echo "<a href='index.php?pagina=$pagDep'>$pagDep</a> ";
            }
        }

        echo "<a href='index.php?pagina=$pageQuant'>Ultima</a>";
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="./assets/js/index.js"></script>

</body>

</html>