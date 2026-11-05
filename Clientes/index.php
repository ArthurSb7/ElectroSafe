<?php
require_once __DIR__ . "/index.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe</title>
    <link rel="stylesheet" href="stylesClientes/styleIndex.css">
    <!-- Imagem da Logo é nessa linha, tem que por dps que criar a pasta de imagens -->
</head>
<body>

    <div class="menu">
    
        <aside class="barralateral">
            <div class="cabecabarra">
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
                <br>
                <br>    
                
                <h1 class="main-title">Praticidade e segurança na Palma da sua mão!</h1>
                <hr class="linha">
                
                <p class="texto-menor">
                    Adicione os locais que exigem melhorias em sua estrutura elétrica, de acordo com o ambiente selecionado.
                </p>
            </section>

            <section class="cards-section">
                <form action="local" method="POST" class="cards-container">
                    
                    <button type="submit" name="Edificios Residencias" value="edificios_residenciais" class="card-button">
                        <span>Edifícios residenciais e condomínios</span>
                        <i></i>
                    </button>

                    <button type="submit" name="Industrias e galpões" value="industrias_galpoes" class="card-button">
                        <span>Indústrias e galpões fabris</span>
                        <i></i>
                    </button>

                    <button type="submit" name="local" value="circulacao_publico" class="card-button">
                        <span>Locais de grande circulação de público</span>
                        <i></i>
                    </button>

                    <button type="submit" name="local" value="atmosferas_explosivas" class="card-button">
                        <span>Áreas classificadas com atmosferas explosivas</span>
                        <i></i>
                    </button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>