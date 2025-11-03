<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/stylesheet/pesquisar.css">
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
    <div class="c-container">
        <h1>Pesquisar Cadastro</h1>
        <nav class="navbar navbar-light bg-light">

            <form class="form d-flex" action="pesquisar.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="button-pesquisar" type="submit">Pesquisar</button>
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
                                <a href='cadastro_edit.php?id=$id' class='button btn-sm'>Editar</a>

                                <a href='#' class='button btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onClick = " . '"' . "pegar_dados($id, '$nome')" . '"' . ">Excluir</a>
                            </td>
                        </tr>";
                }
                ?>

                <!-- onClick = "pegar_dados($id, '$nome')" / Para o onClick do botão Excluir funcionar, é necessário concatenar as variáveis PHP dentro da string JavaScript -->

            </tbody>
        </table>

        <!-- Botão de voltar -->
        <a href="index.php" class="button-voltar">Voltar</a>

    </div>

    <!-- Modal - Aviso de Confirmação de Exclusão -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="POST">
                        <p>Deseja realmente excluir seu cadastro, <b id="nome_pessoa">Nome da pessoa</b>?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa1" value="">
                    <input type="hidden" name="id" id="id_pessoa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="c-footer">
            <h3>Siga-nos:</h3>
            <li><a href="https://www.youtube.com/@lojalingeoficial" target="_blank" rel="noopener noreferrer" alt="Link de acesso ao YouTube da Linge">
                    <i class="fab fa-youtube"></i>
                </a></li>

            <li><a href="https://www.instagram.com/lojalinge?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" alt="Link de acesso ao Instagram da Linge">
                    <i class="fab fa-instagram"></i>
                </a></li>

            <li><a href="https://www.lojalinge.com.br/?srsltid=AfmBOorKUYf4u_KXHx9wZnvNjnFLFXuNgWOJLKhw5qxoG_-Nmgtu5DLK" target="_blank" rel="noopener noreferrer" alt="Link de acesso ao site oficial da Linge">
                    <i class="fas fa-globe"></i>
                </a></li>
        </div>

        <div class="copy">
            <p>&copy; 2025 Loja Linge. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Script para passar os dados para o modal/notificação de exclusão -->
    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('id_pessoa').value = id;
            document.getElementById('nome_pessoa1').value = nome;
        }
    </script>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>