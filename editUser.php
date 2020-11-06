<?php
session_start();
include_once("conection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$resultUser = "SELECT * FROM usuarios WHERE id = '$id'";
$resultadoUser = mysqli_query($conn, $resultUser);
$rowUser = mysqli_fetch_assoc($resultadoUser);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/index.css">
    <title>CRUD - Editar</title>
</head>

<body>
    <a href="register.php">Cadastrar</a><br>
    <a href="index.php">Listar</a><br><br><br>
    <h1>Editar Usuário</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <section>
        <form method="POST" action="processUserEdit.php">
            <div class="section-container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                        <form id="form-register">
                            <div class="form-row mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <label class="text-orange"><b>Nome do tutor*</b></label>
                                    <input class="form-control" type="text" id="name" name="nome" required="" placeholder="Digite aqui" value="<?php echo $rowUser['nome'] ?>">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <label class="text-orange"><b>E-mail*</b></label>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Digite aqui seu e-mail." value="<?php echo $rowUser['email'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 mb-4">
                                    <label class="text-orange"><b>Endereço*</b></label>
                                    <input class="form-control adress" type="adress" id="adress" name="adress" required="" placeholder="Digite aqui" value="<?php echo $rowUser['adress'] ?>">
                                </div>
                                <div class="col-7 mb-4">
                                    <label class="text-orange"><b>Bairro*</b></label>
                                    <input class="form-control district" id="district" name="district" required="" placeholder="Digite aqui" value="<?php echo $rowUser['district'] ?>">
                                </div>
                                <div class="col-sm-5 mb-4">
                                    <label class="text-orange"><b>Telefone*</b></label>
                                    <input class="form-control" name="telephone" id="telephone" type="tel" required="" placeholder="(xx) 00000-0000" minlength="10" maxlength="15" aria-invalid="false" value="<?php echo $rowUser['telephone'] ?>">
                                </div>
                            </div>
                            <div class="form-row mb-1" id="animalEspeciesInput">
                                <div class="col-12 form-row mb-4">
                                    <label class="text-orange"><b>Espécie?*</b></label>
                                    <select class="custom-select especie" name="animalSpecies" id="animalSpecies" aria-invalid="false">
                                        <option>Cão</option>
                                        <option>Gato</option>
                                        <option>Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="formcomplaint">
                                <label class="text-orange"><b>Observações*</b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="complaint[]" value="vegetarian" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Vegetarian
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="ham" name="complaint[]" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Ham
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="turkey" name="complaint[]" id="defaultCheck3">
                                    <label class="form-check-label" for="defaultCheck3">
                                        Turkey
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="other" name="complaint[]" id="defaultCheck4">
                                    <label class="form-check-label" for="defaultCheck4">
                                        Other
                                    </label>
                                </div>
                            </div>
                            <div class="form-row mt-5">
                                <label class="text-orange"><b>Observações durante a visita*</b></label>
                                <textarea class="form-control" id="mensagem" name="comments" placeholder="Digite aqui" required=""></textarea>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-5" style="text-align: center;">
                                <button type="submit" value="Editar">Editar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <a href="index.php">Listar</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>