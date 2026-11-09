<?php
// Lógica PHP para salvar os dados sem recarregar a página
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'salvar_local') {
    header('Content-Type: application/json; charset=utf-8');
    
    $ambiente    = filter_input(INPUT_POST, 'ambiente', FILTER_SANITIZE_SPECIAL_CHARS);
    $responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato     = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao   = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($ambiente) && !empty($responsavel)) {

        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Informações registradas com sucesso!'
        ]);
    } else {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Preencha os campos obrigatórios.'
        ]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe</title>
    <link rel="stylesheet" href="stylesClientes/styleIndex.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="layout-principal">
    
        <aside class="barra-menu">
            <div class="barra-menu-cabeça">
                <i></i>
                <div class="logo">
                    <span>Electro<strong>Safe</strong></span>
                </div>
            </div>

            <nav class="nav">
                <a href="index.php" class="nav-item active">
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
                <p>
                    Através dos recursos de fácil acesso e usabilidade, sua segurança é tratada com cuidados especiais pela nossa equipe, garantindo o bom lazer e conforto aos consumidores.
                </p>
                <br><br>    
                
                <h1 class="main-title">Praticidade e segurança na Palma da sua mão!</h1>
                <br>
                <hr class="linha">
                
                <p class="texto-menor">
                    Adicione os locais que exigem melhorias em sua estrutura elétrica, de acordo com o ambiente selecionado.
                </p>
            </section>

            <!-- Quadros de Seleção de Ambiente -->
            <section class="cards-section">
                <div class="cards-container">
                    
                    <button type="button" class="card-button" data-ambiente="Edifícios residenciais e condomínios">
                        <span>Edifícios residenciais e condomínios</span>
                        <i class="seta-inferior"></i>
                    </button>

                    <button type="button" class="card-button" data-ambiente="Indústrias e galpões fabris">
                        <span>Indústrias e galpões fabris</span>
                        <i class="seta-inferior"></i>
                    </button>

                    <button type="button" class="card-button" data-ambiente="Locais de grande circulação de público">
                        <span>Locais de grande circulação de público</span>
                        <i class="seta-inferior"></i>
                    </button>

                    <button type="button" class="card-button" data-ambiente="Áreas classificadas com atmosferas explosivas">
                        <span>Áreas classificadas com atmosferas explosivas</span>
                        <i class="seta-inferior"></i>
                    </button>
                </div>
            </section>

        </main>
    </div>
    <div class="overlay" id="overlay"></div>
    <div class="form-drawer" id="formDrawer">
        <div class="form-drawer-content">
            <button type="button" class="btn-fechar" id="btnFechar">&times;</button>

            <div class="form-cabecalho">
                <h3 id="tituloAmbiente">Novo Registro</h3>
                <p>Preencha os detalhes da estrutura elétrica abaixo:</p>
            </div>

            <form id="formSalvarLocal">
                <input type="hidden" name="action" value="salvar_local">
                <input type="hidden" name="ambiente" id="inputAmbiente">

                <div class="campo-grupo">
                    <label for="responsavel">Nome do Solicitante / Responsável:</label>
                    <input type="text" id="responsavel" name="responsavel" placeholder="Ex: João da Silva" required>
                </div>

                <div class="campo-grupo">
                    <label for="contato">Telefone / WhatsApp:</label>
                    <input type="text" id="contato" name="contato" placeholder="(00) 00000-0000" required>
                </div>

                <div class="campo-grupo">
                    <label for="descricao">Descrição da necessidade de melhoria:</label>
                    <textarea id="descricao" name="descricao" rows="3" placeholder="Descreva o problema ou ajuste elétrico necessário..." required></textarea>
                </div>

                <button type="submit" class="btn-enviar">Salvar Informações</button>

                <div id="mensagemFeedback" class="mensagem-feedback"></div>
            </form>
        </div>
    </div>
</body>
</html>