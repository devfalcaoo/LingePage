<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Linge - Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/stylesheet/style.css">
    <link rel="stylesheet" href="./src/stylesheet/mediaquere.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>

    <!-- PHP - Cadastro no Banco de Dados -->
<?php

    include 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO cadastro (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    if (mysqli_query($conn, $sql)) {
        mensagem("$nome cadastrado com sucesso!", "success");
    } else {
        mensagem("$nome NÃO foi cadastrado!", "danger");
    }

?>

    <a href="index.php" type="button" class="btn btn-primary">Voltar para a página inicial</a>

<!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>