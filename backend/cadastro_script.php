<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Linge</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/stylesheet/style.css">
    <link rel="stylesheet" href="./src/stylesheet/mediaquere.css">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>

    <!-- Imagem principal -->

    <main class="c-main">

    <div class="c-banner1">
        <h1><img src="./assets/img/banner1.jpg" alt="Bazar da Linge edição de aniversário com peças de até 80% de desconto nos dias 28, 29 e 30 de março" class="banner1"></h1>
    </div>

    <!-- Formulário de Cadastro -->
    
    <?php 

        include "conexao.php";

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO cadastro (nome, email, telefone) VALUES ('$nome','$email','$telefone')";

        if (mysqli_query($conn, $sql)) {
            echo "$nome cadastrado com sucesso!";
        }
        else echo "$nome NÃO foi cadastrado!";

    ?>

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
</body>
</html>