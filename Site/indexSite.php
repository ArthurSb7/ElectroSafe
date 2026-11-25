<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleSite.css">
    <title>ElectroSafe - Home</title>
</head>
<body>
    <header>
        <h2><span class="corElectro">Electro</span><span class="corSafe">Safe</span></h2>
        <!-- Cada link leva para a seção que tem o mesmo id (#home, #servicos...) -->
        <nav class="navegacao">
            <a href="#home">Home</a>
            <a href="#servicos">Serviços</a>
            <a href="#quem-somos">Quem Somos?</a>
            <a href="#por-que-nos">Por Que Nós</a>
            <a href="#faq">FAQ</a>
            <a href="../app/Clientes/login.php" class="botao-entrar">Entrar</a>
        </nav>
    </header>

    <main>
        <!-- Início do site com vídeo de fundo e um botão para redirecionar para a parte de login ou cadastro -->
        <section class="home" id="home">
            <div class="fundo-video" aria-hidden="true">
                <video autoplay muted loop playsinline preload="metadata">
                    <source src="imagens/fundo-Index-Site.mp4" type="video/mp4">
                </video>
                <div class="fundo-overlay"></div>
            </div>
            <div class="home-conteudo">
                <h1>Praticidade e segurança na palma da sua mão!</h1>
                <p class="texto-grande">Através dos recursos de fácil acesso e usabilidade, sua segurança é tratada com cuidados especiais pela nossa equipe, garantindo o bom lazer e conforto aos consumidores.</p>
                <div class="linha"></div>
                <p>Registre os locais que precisam de melhorias na estrutura elétrica e acompanhe tudo em um só lugar.</p>
                <a href="../app/Clientes/login.php" class="botao">Fazer login</a>
                <a href="../app/Clientes/cadastro.php" class="botao-contorno">Criar conta</a>
            </div>
        </section>

        <div>
            
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>