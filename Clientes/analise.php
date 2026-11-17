<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSafe</title>
    <link rel="stylesheet" href="stylesClientes/styleAnalise.css">
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
                <a href="index.php" class="nav-item ">
                    <i></i>
                    <span>Início</span>
                </a>
                <a href="registro.php" class="nav-item">
                    <i></i>
                    <span>Registro de não conformidades</span>
                </a>
                <a href="analise.php" class="nav-item active">
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
    

    <main>
        <div id="formulario">
            <form action="">
                    <!-- PASSO UM DO FORMULARIO-->
                <h2 class="passo">PASSO 1: <br>
                O SEU PROBLEMA E CONTATO</h2>
                <label for="nome">Nome:</label>
                <input type="text"
                id="nome"
                name="nome"
                required>
                <br>
                <label for="servicos">Serviços:</label>
                <select id="servicos" name="servicos">
                    <option value="conserto">Conserto / Reparo</option>
                    <option value="montagem">Montagem / Instalção</option>
                    <option value="avalicacao">Avaliação / Diagnóstico</option>
                    <option value="manutencao">Manutenção Preventiva</option>
                    <option value="modificacao">Modificação / Upgrade</option>
                </select>
                <br>
                <label for="problema">Relate seu Problema:</label>
                <textarea
                id="problema"
                name="problema"
                rows="5"
                cols="40"
                ></textarea>
                <br>
                    <!-- PASSO DOIS DO FORMULARIO-->
                <h2 class="passos">PASSO 2 
                <br> CHECAGEM RÁPIDA DE SEGURANÇA</h2>
                <h3 class="perguntas">Você tem acesso livre ao disjuntor / chave geral para desligar a energia?</h3>
                <input type="radio" id="confirmacao"
                name="#" value="confirmacao" class="escolha">
                <label for="confirmacao" class="resp">Sim, consigo desligar o local com segurança</label>
                <br>
                <input type="radio" id="negacao"
                name="#" value="negacao" class="escolha">
                <label for="negacao" class="resp">Não sei onde fica / Não tenho acesso</label>

                <h3 class="perguntas">Existe fumo, faíscas visíveis ou água em contacto com a fiação no local?</h3>
                <input type="radio" id="#"
                name="#" value="#" class="escolha">
                <label for="#" class="resp">Sim, há fumo, faíscas ou humidade/água no local</label>
                <br>
                <input type="radio" id="#"
                name="#" value="#" class="escolha">
                <label for="#" class="resp">Não, o local está seco e sem sinais de fogo/faíscas</label>

                <h3 class="perguntas">Tens ferramentas básicas ou equipamento de proteção?</h3>
                <input type="radio" id="#"
                name="#" value="#" class="escolha">
                <label for="#" class="resp">Chaves manuais ou de teste</label>
                <br>
                <input type="radio" id="#"
                name="#" value="#" class="escolha">
                <label for="#" class="resp">Calçado de borracha e luvas</label> 
                <br>
                <input type="radio" id="#"
                name="#" value="#" class="escolha">
                <label for="#" class="resp">Nenhuma ferramenta</label>
                <br>
                <button type="submit">Enviar</button>




            </form>
        </div>
        
    </main>
</div>
</body>
</html>