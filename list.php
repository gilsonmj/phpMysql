<?php
session_start();
include_once("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - Listar</title>
    </head>

    <body>
        <a href="index.php">Cadastrar</a><br>
        <a href="list.php">Listar</a><br>
        <h1>Listar Usuário</h1>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        //Receber o número da página
        $pageList = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT,);
        $page = (!empty($pageList)) ? $pageList : 0;

        //Setar a quantidade de itens por página
        $resultPerPage = 10;

        //Calcular início de visualização
        $start = ($resultPerPage * $page) - $resultPerPage;

        $resultUsers = "SELECT * FROM usuarios LIMIT $start, $resultPerPage";
        $resultadoUsuario = mysqli_query($conn, $resultUsers);
        while ($rowUser = mysqli_fetch_assoc($resultadoUsuario)) {
            echo "ID: " . $rowUser['id'] . "<br>";
            echo "Nome: " . $rowUser['nome'] . "<br>";
            echo "Email: " . $rowUser['email'] . "<br> <hr>";
        }

        //Paginação - Somar a quantidade de usuários
        $resultadoPg = "SELECT COUNT(id) AS num_result FROM usuarios";
        $resultPg = mysqli_query($conn, $resultadoPg);
        $rowPg = mysqli_fetch_assoc($resultPg);
        //echo $rowPg['num_result'];

        //Quantidade de página
        $pageQuant = ceil($rowPg['num_result'] / $resultPerPage);

        $maxLinks = 2;
        echo "<a href='list.php?pagina=1'> Primeira </a>";

        for($pagAnt = $page - $maxLinks; $pagAnt <= $page - 1; $pagAnt++){
			if($pagAnt >= 1){
				echo "<a href='list.php?pagina=$pagAnt'>$pagAnt</a> ";
			}
		}

        for($pagDep = $page + 1; $pagDep <= $page + $maxLinks; $pagDep++){
			if($pagDep <= $pageQuant){
				echo "<a href='list.php?pagina=$pagDep'>$pagDep</a> ";
			}
		}

        echo "<a href='list.php?pagina=$pageQuant'>Ultima</a>";

        ?>
</body>

</html>