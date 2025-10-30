<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/stylesheet/style.css">
    <link rel="stylesheet" href="./src/stylesheet/mediaquere.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

</head>

<body>

    <!-- Botão de Busca - PHP -->
    <?php

    // Recebe o termo de pesquisa (se existir) e protege contra SQL injection
    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM cadastro WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);

    ?>

    <!-- Pesquisar Cadastro -->
    <div>
        <h1>Pesquisar Cadastro</h1>
        <nav class="navbar navbar-light bg-light">

            <form class="d-flex" action="pesquisar.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>

        </nav>

        <!-- Tabela de Dados da Pesquisa -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Funções</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($linha = mysqli_fetch_assoc($dados)) {
                    $id = $linha['id'];
                    $nome = $linha['nome'];
                    $email = $linha['email'];
                    $telefone = $linha['telefone'];

                    echo "<tr>
                            <th scope='row'>$nome</th>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>
                                <a href='cadastro_edit.php?id=$id' class='btn btn-success'>Editar</a>
                                <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-target='#confirma'>Excluir</a>
                            </td>
                        </tr>";
                }
                ?>

            </tbody>
        </table>

        <!-- Botão de voltar -->
        <a href="index.php" class="btn btn-info">Voltar</a>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir seu cadastro?</p>
                    <p id="nome_pessoa">Nome da pessoa</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-danger">Sim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>