<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/stylesheet/cadastro.css">
    <link rel="stylesheet" href="./src/stylesheet/mediaquere.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

</head>

<body>

    <!-- PHP - Seleção dos Dados para Edição -->
    <?php
    include "conexao.php";

    $id = intval($_GET['id'] ?? '');
    $sql = "SELECT id, nome, email, telefone FROM cadastro WHERE id = $id";

    $dados = mysqli_query($conn, $sql);

    if (!$dados) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $linha = mysqli_fetch_assoc($dados);

    if (!$linha) {
        die("Registro não encontrado!");
    }
    ?>

    <!-- Imagem principal -->

    <main class="c-main">

        <div class="c-banner1">
            <h1><img src="./assets/img/banner1.jpg" alt="Bazar da Linge edição de aniversário com peças de até 80% de desconto nos dias 28, 29 e 30 de março" class="banner1"></h1>
        </div>

        <!-- Formulário de Cadastro -->

        <div class="c-cadastro">
            <h1 class="titulo_principal">Cadastre-se e concorra!</h1>

            <form class="c-cadastro-formulario" action="edit_script.php" method="post">
                <div class="c-input">
                    <label for="nome"></label>
                    <input type="text" name="nome" placeholder="Nome de Usuário" required value="<?php echo htmlspecialchars($linha['nome'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="c-input">
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="E-mail" required value="<?php echo htmlspecialchars($linha['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="c-input">
                    <label for="telefone"></label>
                    <input type="text" name="telefone" placeholder="Telefone" required value="<?php echo htmlspecialchars($linha['telefone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="botao-cadastro">
                    <button type="submit" class="btn-cadastro" value="Salvar Alterações">Salvar Alterações</button>
                    <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                    <a href="index.php" class="btn btn-info">Voltar</a>
                </div>
            </form>

        </div>

    </main>

    <!-- Seção 1 - Banner 4 -->
    <section class="c-banner4">
        <div class="c-promo_banner4">
            <img src="./assets/img/banner4.jpg" alt="Parcelamento especial a partir de 2x de R$ 250 reais" class="banner4">
        </div>
    </section>

    <!-- Seção 2 - Promo 1 -->
    <section class="c-img1_3">

        <div class="c-promo1_3">
            <img src="./assets/img/img1.jpg" alt="Peças com 70% de desconto off" class="img1">
        </div>

        <div class="c-promo1_3">
            <img src="./assets/img/img2.jpg" alt="Parcelamento especial a partir de 2x de R$ 250, 3x de R$ 450, 4x de R$ 700 e 5x de R$ 1000" class="img2">
        </div>

        <div class="c-promo1_3">
            <img src="./assets/img/img3.jpg" alt="Peças com 60% de desconto off" class="img3">
        </div>
    </section>

    <!-- Seção 3 - Banner 2 -->
    <section class="c-banner2">
        <div class="c-promo_banner2">
            <img src="./assets/img/banner2.jpg" alt="Uma coleção toda produzida para o bazar da Linge com peças exclusivas" class="banner2">
        </div>
    </section>

    <!-- Seção 4 - Promo 2 -->
    <section class="c-img4_6">

        <div class="c-promo4_6">
            <img src="./assets/img/img4.jpg" alt="Peças com 50% de desconto off" class="img4">
        </div>

        <div class="c-promo4_6">
            <img src="./assets/img/img5.jpg" alt="Peças exclusivas para o bazar" class="img5">
        </div>

        <div class="c-promo4_6">
            <img src="./assets/img/img6.jpg" alt="Peças com 40% de desconto off" class="img6">
        </div>
    </section>

    <!-- Seção 5 - Banner 5 -->
    <section class="c-banner5">
        <div class="c-promo_banner5">
            <img src="./assets/img/banner5.jpg" alt="Valores para frete grátis: a partir de R$ 700 reais para Fortaleza e R$ 1000 reais para todo o Brasil" class="banner5">
        </div>
    </section>

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

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>