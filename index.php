<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD -- Cadastrar</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form action="POST" action="process.php"></form>
        <label>Nome:</label>
        <input type="text" name="nome" placeholder = "Digite o nome completo">

        <br><br>
        <label>E-mail</label>
        
        <input type="email" name="email" placeholder = "Digite o seu melhor e-mail">
        <input type="submit" value="cadastrar">

</body>
</html>