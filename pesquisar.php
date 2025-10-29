<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Linge - Pesquisar</title>

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

    include "conexao.php";

    // Recebe o termo de pesquisa (se existir) e protege contra SQL injection
    $pesquisa = $_POST['busca'] ?? '';
    $pesquisa_esc = mysqli_real_escape_string($conn, $pesquisa);

    $dados = null;
    if ($pesquisa_esc !== '') {
        $sql = "SELECT * FROM cadastro WHERE nome LIKE '%$pesquisa_esc%'";

        $dados = mysqli_query($conn, $sql);
        if ($dados === false) {
            // Em caso de erro na query, exibe mensagem simples
            echo "<div class='alert alert-danger' role='alert'>Erro na consulta: " . mysqli_error($conn) . "</div>";
        }
    }

    ?>

    <!-- Pesquisar Cadastro -->
    <div>
        <h1>Pesquisar cadastro</h1>
        <nav class="navbar navbar-light bg-light">

            <form class="d-flex" action="pesquisar.php" method="POST">
                <input class="form-control me-2" type="search" name="busca" value="<?php echo htmlspecialchars($pesquisa); ?>" placeholder="Nome" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>

        </nav>

        <!-- Tabela de Dados da Pesquisa -->
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th class="col">Funções</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exibe os resultados da pesquisa - PHP BD -->
                <?php
                if ($pesquisa === '') {
                    echo '<tr><td colspan="3">Digite um nome e clique em Pesquisar.</td></tr>';
                } else if ($dados && mysqli_num_rows($dados) > 0) {
                    while ($row = mysqli_fetch_assoc($dados)) {
                        echo '<tr>';
                        echo '<th scope="row">' . htmlspecialchars($row['nome']) . '</th>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['telefone']) . '</td>';
                        echo <td width=150px>
                        <a href='#' class='btn btn-success'>Editar</a>
                        <a href='#' class='btn btn-danger'>Excluir</a>
                        </td>

                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">Nenhum resultado encontrado para "' . htmlspecialchars($pesquisa) . '".</td></tr>';
                }
                ?>

            </tbody>
        </table>

        <!-- Botão de voltar -->
        <a href="index.php" class="btn btn-info">Voltar</a>

    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>