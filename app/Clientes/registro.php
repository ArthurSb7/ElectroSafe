<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ElectroSafe - Registro</title>

    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="registro.css">

</head>

<body>

    <aside class="barralateral">

        <div class="cabecabarra">
            <div class="logo">
                <span>Electro<strong>Safe</strong></span>
            </div>
        </div>

        <nav class="nav">

            <a href="index.php" class="nav-item">
                <i></i>
                <span>Início</span>
            </a>

            <a href="registro.php" class="nav-item active">
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


    <div class="conteudo">

        <header>
            <h1>ELECTROSAFE</h1>
            <p>SISTEMA DE INSPEÇÃO ELÉTRICA</p>
        </header>


        <main>

            <h2>REGISTRO DE NÃO CONFORMIDADE</h2>

            <p class="descricao">
                Preencha as informações abaixo para registrar uma ocorrência.
            </p>

            <?php if ($mensagem != "") { ?>

                <div class="mensagem <?php echo $tipoMensagem; ?>">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>

            <?php } ?>


            <form method="POST" action="registro.php">

                <div class="campo">
                    <label>Data da ocorrência</label>
                    <input type="date" name="data" required>
                </div>

                <div class="campo">
                    <label>Responsável pelo registro</label>
                    <input type="text" name="responsavel" placeholder="Nome do responsável" required>
                </div>

                <div class="campo">
                    <label>Local da ocorrência</label>
                    <input type="text" name="local" placeholder="Ex: Sala de máquinas" required>
                </div>

                <div class="campo">
                    <label>Equipamento ou instalação</label>
                    <input type="text" name="equipamento" placeholder="Ex: Quadro elétrico" required>
                </div>

                <div class="campo">
                    <label>Tipo de não conformidade</label>

                    <select name="tipo" required>
                        <option value="">Selecione uma opção</option>
                        <option value="Instalação elétrica">Instalação elétrica</option>
                        <option value="Equipamento danificado">Equipamento danificado</option>
                        <option value="Falta de proteção">Falta de proteção</option>
                        <option value="Fiação exposta">Fiação exposta</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Descrição da ocorrência</label>
                    <textarea name="descricao" rows="4" placeholder="Descreva o problema encontrado..." required></textarea>
                </div>

                <div class="campo">
                    <label>Nível de risco</label>

                    <select name="risco" required>
                        <option value="">Selecione o nível</option>
                        <option value="Baixo">Baixo</option>
                        <option value="Médio">Médio</option>
                        <option value="Alto">Alto</option>
                        <option value="Crítico">Crítico</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Status inicial</label>

                    <select name="status" required>
                        <option value="">Selecione o status</option>
                        <option value="Aberta">Aberta</option>
                        <option value="Em análise">Em análise</option>
                        <option value="Resolvida">Resolvida</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Ação recomendada / Observações</label>
                    <textarea name="acao" rows="4" placeholder="Informe as ações recomendadas..."></textarea>
                </div>

                <button type="submit">
                    REGISTRAR OCORRÊNCIA
                </button>

            </form>

        </main>


        <footer>
            ELECTROSAFE © 2026 - SEGURANÇA E CONFIABILIDADE
        </footer>

    </div>

        
    

</body>
</html>