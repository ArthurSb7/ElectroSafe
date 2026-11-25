<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe - Checklist</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesClientes/styleChecklist.css">
</head>

<body>

    <div class="fundo-video" aria-hidden="true">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="imagens/video.mp4" type="video/mp4">
        </video>
        <div class="fundo-overlay"></div>
    </div>

    <div class="layout-principal">

        <!-- MENU LATERAL IDÊNTICO AO INDEX E REGISTRO -->
        <aside class="barra-menu">
            <a href="index.php" class="logo-link" title="Ir para a página inicial">
                <img src="imagens/logo.png" alt="Logo ElectroSafe">
            </a>
            <div class="barra-menu-cabeca">
                <i></i>
                <div class="logo">
                    <span><span class="corElectro">Electro</span><strong><span class="corSafe">Safe</span></strong></span>
                </div>
            </div>

            <nav class="nav" aria-label="Navegação principal">
                <a href="index.php" class="nav-item"><i></i><span>Início</span></a>
                <a href="registro.php" class="nav-item"><i></i><span>Registro de não conformidades</span></a>
                <a href="analise.php" class="nav-item"><i></i><span>Análise técnica e inspeção</span></a>
                <a href="checklist.php" class="nav-item active" aria-current="page"><i></i><span>Checklist</span></a>
                <a href="acompanhamento.php" class="nav-item"><i></i><span>Acompanhamento</span></a>
                <a href="indicacao.php" class="nav-item"><i></i><span>Indicação</span></a>
            </nav>
        </aside>

        <!-- ÁREA DIREITA -->
        <div class="area-direita">

            <header class="topo">
                <div class="topo__marca">
                    <h1 class="logo">ELECTROSAFE</h1>
                    <p class="topo__sub">Sistema de Inspeção e Segurança Elétrica</p>
                </div>
            </header>

            <main class="content">
                <div class="painel-checklist">
                    <div class="painel-header">
                        <h1>CHECKLIST DE MATERIAIS</h1>
                        <p>Marque os equipamentos que já foram conferidos e acompanhe o progresso da inspeção.</p>
                    </div>

                    <div class="painel-body">
                        <div class="progresso">
                            <div class="progresso-topo">
                                <h3>PROGRESSO DA INSPEÇÃO</h3>
                                <span class="contador" id="contador">0 de 7 materiais conferidos</span>
                            </div>

                            <div class="barra-progresso">
                                <div class="barra-preenchida" id="barraPreenchida"></div>
                            </div>
                        </div>

                        <div class="lista">
                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Alicate Universal</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Chave Phillips</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Multímetro</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Alicate Amperímetro</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Fita Isolante</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Óculos de Proteção</span>
                            </label>

                            <label class="item">
                                <input type="checkbox" class="material">
                                <span>Luvas de Proteção</span>
                            </label>
                        </div>

                        <button type="button" class="btn-finalizar" onclick="finalizarChecklist()">
                            FINALIZAR CHECKLIST
                        </button>

                        <div id="mensagem" class="mensagem-status" role="status"></div>
                    </div>
                </div>
            </main>

            <footer class="rodape">
                <p>ELECTROSAFE © 2026 - SEGURANÇA E CONFIABILIDADE</p>
            </footer>

        </div>
    </div>

    <script>
        const materiais = document.querySelectorAll(".material");
        const barra = document.getElementById("barraPreenchida");
        const contador = document.getElementById("contador");
        const mensagem = document.getElementById("mensagem");

        function atualizarProgresso() {
            let marcados = document.querySelectorAll(".material:checked").length;
            let total = materiais.length;
            let porcentagem = (marcados / total) * 100;

            barra.style.width = porcentagem + "%";
            contador.textContent = marcados + " de " + total + " materiais conferidos";

            mensagem.textContent = "";
            mensagem.className = "mensagem-status";
        }

        materiais.forEach(function (item) {
            item.addEventListener("change", atualizarProgresso);
        });

        function finalizarChecklist() {
            let marcados = document.querySelectorAll(".material:checked").length;

            if (marcados === materiais.length) {
                mensagem.textContent = "Checklist concluída com sucesso!";
                mensagem.className = "mensagem-status sucesso";
            } else {
                mensagem.textContent = "Ainda existem materiais que precisam ser conferidos!";
                mensagem.className = "mensagem-status erro";
            }
        }
    </script>

</body>
</html>