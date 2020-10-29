<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD -- Cadastrar</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form method="POST" action="process.php">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder = "Digite o nome completo">

        <br><br>
        <label>E-mail</label>
        
        <input type="email" name="email" placeholder = "Digite o seu melhor e-mail">
        
        <input type="submit" value="Cadastrar"><br></br>


    </form>
        <a href="list.php">Listar</a><br>

</body>
</html>