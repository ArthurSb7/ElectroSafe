<?php
require_once __DIR__ . '/init.php';

$idUsuario = $_SESSION['idUsuario'] ?? null;

// Nome do usuário logado
$nomeUsuario = '';
if ($idUsuario) {
    $stmt = $pdo->prepare("SELECT nome FROM usuarios WHERE id = ?");
    $stmt->execute([(int)$idUsuario]);
    $nomeUsuario = (string)($stmt->fetchColumn() ?: '');
}

// Listas dos selects (somente leitura)
$departamentos = $pdo->query("SELECT id, nome FROM departamentos ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);

$funcionarios = $pdo->query(
    "SELECT f.idUsuario AS id, u.nome
     FROM funcionarios f
     INNER JOIN usuarios u ON u.id = f.idUsuario
     ORDER BY u.nome"
)->fetchAll(PDO::FETCH_ASSOC);

$administradores = $pdo->query(
    "SELECT a.idUsuario AS id, u.nome
     FROM administrador a
     INNER JOIN usuarios u ON u.id = a.idUsuario
     ORDER BY u.nome"
)->fetchAll(PDO::FETCH_ASSOC);

// Modo de teste: registro.php?teste=1 (preenche os selects com opções falsas
// e o processaRegistro.php só mostra os dados na tela, sem gravar no banco)
$modoTeste = isset($_GET['teste']);
if ($modoTeste) {
    $departamentos   = $departamentos   ?: [['id' => 1, 'nome' => 'Departamento (teste)']];
    $funcionarios    = $funcionarios    ?: [['id' => 1, 'nome' => 'Funcionário (teste)']];
    $administradores = $administradores ?: [['id' => 1, 'nome' => 'Administrador (teste)']];
}

$idSucesso = isset($_GET['sucesso']) ? (int)$_GET['sucesso'] : 0;
$statusEmail = $_GET['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de não conformidade | ELECTROSAFE</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Saira:wght@400;500;600;700&family=Saira+Condensed:wght@600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="stylesClientes/styleRegistro.css">
</head>
<body>

<aside class="barralateral">
  <div class="cabecabarra">
    <div class="logo"><span>Electro<strong>Safe</strong></span></div>
  </div>

  <nav class="nav">
    <a href="index.php" class="nav-item"><i></i><span>Início</span></a>
    <a href="registro.php" class="nav-item active"><i></i><span>Registro de não conformidades</span></a>
    <a href="analise.php" class="nav-item"><i></i><span>Análise técnica e inspeção</span></a>
    <a href="checklist.html" class="nav-item"><i></i><span>Checklist</span></a>
    <a href="acompanhamento.php" class="nav-item"><i></i><span>Acompanhamento</span></a>
    <a href="indicacao.php" class="nav-item"><i></i><span>Indicação</span></a>
  </nav>
</aside>

<header class="topo">
  <div class="topo__marca">
    <h1 class="logo">ELECTROSAFE</h1>
    <p class="topo__sub">Sistema de inspeção elétrica</p>
  </div>
  <div class="topo__registro">
    <span class="topo__registro-rotulo">Registro nº</span>
    <span class="topo__registro-valor"><?= $idSucesso ?: 'Gerado ao salvar' ?></span>
  </div>
</header>

<main class="conteudo">

<?php if ($idSucesso): ?>
  <div class="mensagem mensagem--sucesso">
    <p>Registro salvo. Número do registro: <strong><?= $idSucesso ?></strong></p>
    <div class="mensagem__acoes">
      <a href="gerarPDF.php?id=<?= $idSucesso ?>" class="botao botao--primario" target="_blank" rel="noopener">Baixar relatório em PDF</a>

      <form action="enviarPDF.php" method="post">
        <input type="hidden" name="id" value="<?= $idSucesso ?>">
        <button type="submit" class="botao botao--secundario">Enviar relatório por e-mail</button>
      </form>
    </div>
  </div>
<?php endif; ?>

<?php if ($statusEmail === 'ok'): ?>
  <div class="mensagem mensagem--sucesso"><p>Relatório enviado para o seu e-mail.</p></div>
<?php elseif ($statusEmail === 'erro'): ?>
  <div class="mensagem mensagem--erro"><p>Não foi possível enviar o e-mail. Tente de novo ou baixe o PDF.</p></div>
<?php endif; ?>

<?php if (isset($_GET['erro'])): ?>
  <div class="mensagem mensagem--erro">
    <p>
      Não foi possível salvar o registro.
      <?php if ($_GET['erro'] !== 'banco'): ?>
        <?= htmlspecialchars($_GET['erro']) ?>
      <?php endif; ?>
    </p>
  </div>
<?php endif; ?>

<?php if ($modoTeste): ?>
  <div class="mensagem mensagem--aviso">
    <p>Modo de teste ligado: nada será gravado no banco.</p>
  </div>
<?php endif; ?>

  <section class="titulo-pagina">
    <h2>Registro de não conformidade</h2>
    <p>Preencha os dados da ocorrência. Os campos com <span class="obrigatorio" aria-hidden="true">*</span> são obrigatórios.</p>
  </section>

  <form class="formulario" action="processaRegistro.php" method="post">

    <?php if ($modoTeste): ?>
      <input type="hidden" name="modo_teste" value="1">
    <?php endif; ?>

    <!-- Identificação -->
    <fieldset class="bloco">
      <legend>Identificação</legend>

      <div class="campo">
        <label for="data_ocorrencia">Data da ocorrência <span class="obrigatorio" aria-hidden="true">*</span></label>
        <input type="date" id="data_ocorrencia" name="data_ocorrencia" max="<?= date('Y-m-d') ?>" required>
      </div>

      <div class="campo">
        <label for="hora_ocorrencia">Hora aproximada</label>
        <input type="time" id="hora_ocorrencia" name="hora_ocorrencia">
      </div>

      <div class="campo">
        <label for="idDepartamento">Departamento</label>
        <select id="idDepartamento" name="idDepartamento">
          <option value=""><?= $departamentos ? 'Selecione' : 'Nenhum departamento cadastrado' ?></option>
          <?php foreach ($departamentos as $d): ?>
            <option value="<?= (int)$d['id'] ?>"><?= htmlspecialchars($d['nome']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="campo">
        <label for="responsavel_registro">Responsável pelo registro</label>
        <input type="text" id="responsavel_registro"
               value="<?= htmlspecialchars($nomeUsuario ?: 'Usuário não identificado') ?>" disabled>
      </div>
    </fieldset>

    <!-- Local -->
    <fieldset class="bloco">
      <legend>Local e equipamento</legend>

      <div class="campo">
        <label for="local">Local da ocorrência <span class="obrigatorio" aria-hidden="true">*</span></label>
        <input type="text" id="local" name="local" maxlength="100"
               placeholder="Ex.: Sala de máquinas, 2º andar" required>
      </div>

      <div class="campo">
        <label for="equipamento">Equipamento ou instalação <span class="obrigatorio" aria-hidden="true">*</span></label>
        <input type="text" id="equipamento" name="equipamento" maxlength="95"
               placeholder="Ex.: Quadro elétrico QD-03" required>
      </div>
    </fieldset>

    <!-- Classificação -->
    <fieldset class="bloco">
      <legend>Classificação</legend>

      <div class="campo">
        <label for="norma_violada">Norma ou requisito violado</label>
        <input type="text" id="norma_violada" name="norma_violada" maxlength="200"
               placeholder="Ex.: ABNT NBR 5410, NR-10">
      </div>

      <div class="campo">
        <label for="status_registro">Status inicial</label>
        <select id="status_registro" name="status_registro" required>
          <option value="AGUARDANDO">Aguardando</option>
          <option value="ANDAMENTO">Em andamento</option>
          <option value="FINALIZADO">Finalizado</option>
          <option value="CANCELADO">Cancelado</option>
        </select>
      </div>

      <fieldset class="campo campo--cheio grupo-risco">
        <legend>Nível de risco <span class="obrigatorio" aria-hidden="true">*</span></legend>
        <div class="opcoes-risco">
          <input type="radio" id="risco_leve" name="impacto_erro" value="LEVE" required>
          <label for="risco_leve" class="chip chip--baixo">Leve</label>

          <input type="radio" id="risco_moderado" name="impacto_erro" value="MODERADO">
          <label for="risco_moderado" class="chip chip--medio">Moderado</label>

          <input type="radio" id="risco_critico" name="impacto_erro" value="CRITICO">
          <label for="risco_critico" class="chip chip--critico">Crítico</label>
        </div>
      </fieldset>
    </fieldset>

    <!-- Descrição -->
    <fieldset class="bloco">
      <legend>Descrição</legend>

      <div class="campo campo--cheio">
        <label for="descricao">Descrição da ocorrência <span class="obrigatorio" aria-hidden="true">*</span></label>
        <textarea id="descricao" name="descricao" rows="5"
                  placeholder="Descreva o que foi encontrado, onde e em que condição." required></textarea>
      </div>
    </fieldset>

    <!-- Tratativa -->
    <fieldset class="bloco">
      <legend>Tratativa</legend>

      <div class="campo campo--cheio">
        <label for="acao_imediata">Ação imediata de contenção</label>
        <textarea id="acao_imediata" name="acao_imediata" rows="3"
                  placeholder="Ex.: circuito desenergizado e sinalizado."></textarea>
      </div>

      <div class="campo">
        <label for="responsavel_Imediato">Responsável pela ação imediata <span class="obrigatorio" aria-hidden="true">*</span></label>
        <select id="responsavel_Imediato" name="responsavel_Imediato" >
          <option value=""><?= $funcionarios ? 'Selecione' : 'Nenhum funcionário cadastrado' ?></option>
          <?php foreach ($funcionarios as $f): ?>
            <option value="<?= (int)$f['id'] ?>"><?= htmlspecialchars($f['nome']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="campo">
        <label for="prazo">Prazo para correção</label>
        <input type="date" id="prazo" name="prazo">
      </div>

      <div class="campo campo--cheio">
        <label for="analise_erro">Análise e ação recomendada</label>
        <textarea id="analise_erro" name="analise_erro" rows="4"
                  placeholder="Informe a análise da causa e as ações recomendadas."></textarea>
      </div>

      <div class="campo">
        <label for="responsavel_acaoFinal">Responsável pela ação final <span class="obrigatorio" aria-hidden="true">*</span></label>
        <select id="responsavel_acaoFinal" name="responsavel_acaoFinal" >
          <option value=""><?= $administradores ? 'Selecione' : 'Nenhum administrador cadastrado' ?></option>
          <?php foreach ($administradores as $a): ?>
            <option value="<?= (int)$a['id'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="campo">
        <label for="prazo_limite">Prazo limite da ação final</label>
        <input type="date" id="prazo_limite" name="prazo_limite">
      </div>
    </fieldset>

    <div class="acoes">
      <button type="reset" class="botao botao--secundario">Limpar formulário</button>
      <button type="submit" class="botao botao--primario">Registrar ocorrência</button>
    </div>

  </form>
</main>

<footer class="rodape">
  <p>ELECTROSAFE &copy; 2026 &ndash; Segurança e confiabilidade</p>
</footer>

</body>
</html>