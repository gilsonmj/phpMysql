<?php
session_start();
include_once("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/index.css">

    <title>CRUD - Pesquisar</title>
</head>

<body>
    <a href="register.php">Pesquisar</a><br>
    <a href="index.php">Listar</a><br>

    <h1>Pesquisar Usuário</h1>


    <section>
        <form method="POST" action="">
            <div class="section-container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                        <form id="form-register">
                            <div class="form-row mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <label class="text-orange"><b>Nome do tutor*</b></label>
                                    <input class="form-control" type="text" id="name" name="nome" required="" placeholder="Digite aqui">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12" style="text-align: center;">
                                <button type="submit" name="sendSearch" value="Pesquisar">Pesquisar</button>
                            </div>
                        </form>
                        <?php
                        $sendSearch = filter_input(INPUT_POST, 'sendSearch', FILTER_SANITIZE_STRING);
                        if ($sendSearch) {
                            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                            $resultUser = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
                            $resultadoUser = mysqli_query($conn, $resultUser);
                            while($rowUser = mysqli_fetch_assoc($resultadoUser)){
                                echo "ID: " . $rowUser['id'] . "<br>";
                                echo "Nome: " . $rowUser['nome'] . "<br>";
                                echo "E-mail: " . $rowUser['email'] . "<br>";
                                echo "<a href='editUser.php?id=" . $rowUser['id'] . "'>Editar</a><br>";
                                echo "<a href='deleteUser.php?id=" . $rowUser['id'] . "'>Apagar</a><br>";

                            };
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>