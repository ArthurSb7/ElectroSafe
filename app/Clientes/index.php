<?php

//Conexão com o servidor
declare(strict_types=1);

$databaseStatus = 'Conectado';

try {
    require_once __DIR__ . '/init.php';
    $pdo->query('SELECT 1');
} catch (Throwable $exception) {
    $databaseStatus = 'Indisponível';
}

// Mensagem de status pós-envio
$mensagem = '';
$sucesso = false;

// 1. Processa e salva os dados do formulário (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'salvar_local') {
    $ambiente    = filter_input(INPUT_POST, 'ambiente', FILTER_SANITIZE_SPECIAL_CHARS);
    $responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato     = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao   = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($ambiente) && !empty($responsavel) && !empty($contato)) {
        
          $stmt = $pdo->prepare("INSERT INTO chamados (ambiente, responsavel, contato, descricao) VALUES (?, ?, ?, ?)");
          $stmt->execute([$ambiente, $responsavel, $contato, $descricao]);
        
        $mensagem = "Informações registradas com sucesso para: " . htmlspecialchars($ambiente);
        $sucesso = true;
    } else {
        $mensagem = "Preencha todos os campos obrigatórios.";
    }
}

// 2. Leitura da URL (GET) para saber qual ambiente foi clicado
$ambiente_selecionado = filter_input(INPUT_GET, 'abrir_form', FILTER_SANITIZE_SPECIAL_CHARS);
$exibir_formulario = !empty($ambiente_selecionado);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesClientes/styleIndex.css">
</head>
<body>

    <!-- CAMADA 1: vídeo de fundo -->
    <div class="fundo-video" aria-hidden="true">
        <video autoplay muted loop playsinline preload="metadata" poster="imagens/video.mp4">
            <source src="imagens/video.mp4" type="video/webm">
            <source src="imagens/video.mp4" type="video/mp4">
        </video>
        <div class="fundo-overlay"></div>
    </div>

    <!-- CAMADA 2: site -->
    <div class="layout-principal">

        <aside class="barra-menu">
            <a href="index.php" class="logo.png" title="Ir para a página inicial">
            <img src="imagens/logo.png" alt="Logo ElectroSafe">
             </a>
            <div class="barra-menu-cabeca">
                <i></i>
                <div class="logo">
                    <span><span class="corElectro">Electro</span><strong><span class="corSafe">Safe</span></strong></span>
                </div>
            </div>

            <nav class="nav" aria-label="Navegação principal">
                <a href="index.php" class="nav-item active" aria-current="page">
                    <i></i>
                    <span>Início</span>
                </a>
                <a href="registro.php" class="nav-item">
                    <i></i>
                    <span>Registro de não conformidades</span>
                </a>
                <a href="analise.php" class="nav-item">
                    <i></i>
                    <span>Análise técnica e inspeção</span>
                </a>
                <a href="checklist.php" class="nav-item">
                    <i></i>
                    <span>Checklist</span>
                </a>
                <a href="acompanhamento.php" class="nav-item">
                    <i></i>
                    <span>Acompanhamento</span>
                </a>
                <a href="indicacao.php" class="nav-item">
                    <i></i>
                    <span>Indicação</span>
                </a>
            </nav>
        </aside>

        <main class="content">
            <section class="info-section">
                <h1 class="main-title">Praticidade e segurança na palma da sua mão!</h1>
<br>
                <p class="info-lead">
                    Através dos recursos de fácil acesso e usabilidade, sua segurança é tratada com
                    cuidados especiais pela nossa equipe, garantindo o bom lazer e conforto aos consumidores.
                </p>

                <hr class="linha">

                <p class="texto-menor">
                    Adicione os locais que exigem melhorias em sua estrutura elétrica, de acordo com os ambientes abaixo.
                </p>

                <?php if (!empty($mensagem)): ?>
                    <div class="mensagem-status <?= $sucesso ? 'sucesso' : 'erro' ?>" role="status">
                        <?= $mensagem ?>
                    </div>
                <?php endif; ?>
            </section>

            <section class="cards-section">
                <div class="cards-container">

                    <a href="index.php?abrir_form=Edifícios+residenciais+e+condomínios" class="card-button">
                        <span>Edifícios residenciais e condomínios</span>
                        <i class="seta-inferior"></i>
                    </a>

                    <a href="index.php?abrir_form=Indústrias+e+galpões+fabris" class="card-button">
                        <span>Indústrias e galpões fabris</span>
                        <i class="seta-inferior"></i>
                    </a>

                    <a href="index.php?abrir_form=Locais+de+grande+circulação+de+público" class="card-button">
                        <span>Locais de grande circulação de público</span>
                        <i class="seta-inferior"></i>
                    </a>

                    <a href="index.php?abrir_form=Áreas+classificadas+com+atmosferas+explosivas" class="card-button">
                        <span>Áreas classificadas com atmosferas explosivas</span>
                        <i class="seta-inferior"></i>
                    </a>

                </div>
            </section>
        </main>
    </div>

    <!-- 3. Formulário -->
    <?php if ($exibir_formulario): ?>

        <a href="index.php" class="overlay" aria-label="Fechar formulário"></a>

        <div class="form-drawer" role="dialog" aria-modal="true" aria-labelledby="form-titulo">
            <div class="form-drawer-content">
                <a href="index.php" class="btn-fechar" aria-label="Fechar">&times;</a>

                <div class="form-cabecalho">
                    <h3 id="form-titulo">Novo registro: <?= htmlspecialchars($ambiente_selecionado) ?></h3>
                    <p>Preencha os detalhes da estrutura elétrica abaixo:</p>
                </div>

                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="salvar_local">
                    <input type="hidden" name="ambiente" value="<?= htmlspecialchars($ambiente_selecionado) ?>">

                    <div class="campo-grupo">
                        <label for="responsavel">Nome do solicitante / responsável</label>
                        <input type="text" id="responsavel" name="responsavel" placeholder="Ex: Thiago Navarro" required autofocus>
                    </div>

                    <div class="campo-grupo">
                        <label for="contato">Telefone / WhatsApp</label>
                        <input type="text" id="contato" name="contato" placeholder="(11) 12345-6789" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="descricao">Descrição da necessidade de melhoria</label>
                        <textarea id="descricao" name="descricao" rows="3" placeholder="Descreva o problema ou ajuste elétrico necessário..." required></textarea>
                    </div>

                    <button type="submit" class="btn-enviar">Salvar informações</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>