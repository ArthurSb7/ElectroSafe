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
                <a href="index.php" class="nav-item active">
                    <i></i>
                    <span>Início</span>
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



        <main>
            


            <div id="formulario">
            <form action="" method="POST" id="formAnalise">
                    <!-- PASSO UM DO FORMULARIO-->
                <h2>PASSO 1: <br>
                O SEU PROBLEMA E CONTATO</h2>
                <br>
                <label for="servicos" class="passo-um">Serviços:</label>
                <select id="servicos" name="servicos">
                    <option value="conserto">Conserto / Reparo</option>
                    <option value="montagem">Montagem / Instalção</option>
                    <option value="avalicacao">Avaliação / Diagnóstico</option>
                    <option value="manutencao">Manutenção Preventiva</option>
                    <option value="modificacao">Modificação / Upgrade</option>
                </select>
                <br>
                <label for="problema" class="passo-um">Relate seu Problema:</label>
                <textarea
                id="problema"
                name="problema"
                rows="5"
                cols="40"
                ></textarea>
                <br>

                    <!-- PASSO DOIS DO FORMULARIO-->
                <h2>PASSO 2:<br> 
                CHECAGEM RÁPIDA DE SEGURANÇA</h2>
                <br>
                    <!-- PRIMEIRA PERGUNTA DO PASSO 2-->
                <h3 class="perguntas">Você tem acesso livre ao disjuntor / chave geral para desligar a energia?</h3>
                <div class="selecao">
                    <input type="radio"
                    id="disjuntor_sim"
                    name="acesso_disjuntor"
                    value="sim"
                    class="escolha" required>
                    <label for="disjuntor_sim" class="resp">Sim, consigo desligar o local com segurança</label>
                </div>
                <br>

                <div class="selecao">
                    <input type="radio"
                    id="disjuntor_nao"
                    name="acesso_disjuntor"
                    value="nao"
                    class="escolha" required>
                    <label for="disjuntor_nao" class="resp">Não sei onde fica / Não tenho acesso</label>
                </div>

                    <!-- SEGUNDA PERGUNTA DO PASSO 2-->

                <h3 class="perguntas">Existe fumo, faíscas visíveis ou água em contacto com a fiação no local?</h3>
                <div class="selecao">
                    <input type="radio"
                    id="fumo_sim"
                    name="fumo_agua"
                    value="sim"
                    class="escolha" required>
                    <label for="fumo_sim" class="resp">Sim, há fumo, faíscas ou humidade/água no local</label>
                </div>
                <br>

                <div class="selecao">
                    <input type="radio"
                    id="fumo_nao"
                    name="fumo_agua"
                    value="nao"
                    class="escolha" required>
                    <label for="fumo_nao" class="resp">Não, o local está seco e sem sinais de fogo/faíscas</label>
                </div>

                <!-- TERCEIRA PERGUNTA DO PASSO 2-->

                <h3 class="perguntas">Tens ferramentas básicas ou equipamento de proteção?</h3>
                <div class="selecao">
                    <input type="radio"
                    id="ferramenta_chaves"
                    name="ferramentas"
                    value="chaves"
                    class="escolha" required>
                    <label for="ferramenta_chaves" class="resp">Chaves manuais ou de teste</label>
                </div>
                <br>

                <div class="selecao">
                    <input type="radio"
                    id="ferramenta_epi"
                    name="ferramentas"
                    value="epi"
                    class="escolha" required>
                    <label for="ferramenta_epi" class="resp">Calçado de borracha e luvas</label>
                </div>
                <br>

                <div class="selecao">
                    <input type="radio"
                    id="ferramenta_nenhuma"
                    name="ferramentas"
                    value="nenhuma"
                    class="escolha" required>
                    <label for="ferramenta_nenhuma" class="resp">Nenhuma ferramenta</label>
                </div>
                <br>
                <!-- BOTAO-->
                <button type="submit">Enviar</button>
            </form>
        </main>
    </div>

</body>
</html>