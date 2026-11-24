<?php

// Cadastrar novos funcionarios e ver suas avaliações

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe - Dashboard</title>
    <link rel="stylesheet" href="styleIndicacaoAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="layout-principal">
        <aside class="barra-menu">
            <a href="index.php" class="logo.png" title="Ir para a página inicial">
                <img src="../app/Clientes/imagens/logo.png" alt="Logo ElectroSafe">
            </a>
            <div class="barra-menu-cabeça">
                <i></i>
                <div class="logo">
                    <span><span class="corElectro">Electro</span><strong><span class="corSafe">Safe</span></strong></span>
                </div>
            </div>

            <nav class="nav">
                <a href="index.php" class="nav-item ">
                    <i></i>
                    <span>Início</span>
                </a>
                <a href="acompanhamento.php" class="nav-item">
                    <i></i>
                    <span>Acompanhamento</span>
                </a>
                <a href="indicacao.php" class="nav-item active">
                    <i></i>
                    <span>Indicação</span>
                </a>
                <a href="infoEle.php" class="nav-item">
                    <i></i>
                    <span>Informações dos Eletricistas</span>
                </a>
            </nav>
        </aside>



        <main>
            


            <div id="formulario">
            <form action="" method="POST" id="formAnalise">
                    <!-- PASSO UM DO FORMULARIO-->
                <h2>Cadastro de Eletricista</h2>
                <br>
                <div class="campo-grupo">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                    <br>
                <div class="campo-grupo">
                    <label for="idade">Idade:</label>
                    <input type="number" name="idade" id="idade" required>
                </div>
                    <br>
                <div class="campo-grupo">
                    <label for="especialização">Especialização:</label>
                    <input type="text" name="especialização" id="especialização" required>
                </div>
                    <br>
                <button type="submit">Criar</button>
            </form>
        </main>
    </div>

</body>
</html>
