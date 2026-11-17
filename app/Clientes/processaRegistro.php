
<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/banco/crud.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: registro.php');
    exit;
}

// Usuário que está logado
$idUsuario = $_SESSION['idUsuario'] ?? null;

// Dados do formulário
$descricao = trim($_POST['descricao'] ?? '');
$status = $_POST['status_registro'] ?? 'AGUARDANDO';

$data = $_POST['data_ocorrencia'] ?? '';
$hora = $_POST['hora_ocorrencia'] ?? '00:00';

$idDepartamento = $_POST['idDepartamento'] ?? null;

$impacto = $_POST['impacto_erro'] ?? '';
$norma = trim($_POST['norma_violada'] ?? '');
$origem = trim($_POST['origem_desvio'] ?? '');

$acaoImediata = trim($_POST['acao_imediata'] ?? '');
$responsavelImediato = $_POST['responsavel_Imediato'] ?? null;
$prazo = $_POST['prazo'] ?? '';

$analise = trim($_POST['analise_erro'] ?? '');
$acaoCorretiva = trim($_POST['acao_corretiva'] ?? '');
$responsavelFinal = $_POST['responsavel_acaoFinal'] ?? null;
$prazoLimite = $_POST['prazo_limite'] ?? '';

try {

    // Verifica os campos obrigatórios
    if (
        empty($idUsuario) ||
        empty($descricao) ||
        empty($data) ||
        empty($impacto) ||
        empty($responsavelImediato) ||
        empty($responsavelFinal)
    ) {
        throw new Exception("Preencha todos os campos obrigatórios.");
    }

    // Confere os valores permitidos pelo banco
    $impactosPermitidos = ['LEVE', 'MODERADO', 'CRITICO'];

    $statusPermitidos = [
        'ANDAMENTO',
        'AGUARDANDO',
        'FINALIZADO',
        'CANCELADO'
    ];

    if (!in_array($impacto, $impactosPermitidos)) {
        throw new Exception("Nível de risco inválido.");
    }

    if (!in_array($status, $statusPermitidos)) {
        throw new Exception("Status inválido.");
    }

    // Junta data e hora
    $dataOcorrencia = $data . ' ' . $hora . ':00';

    // Converte os prazos para DATETIME
    $prazoBanco = !empty($prazo)
        ? $prazo . ' 00:00:00'
        : null;

    $prazoLimiteBanco = !empty($prazoLimite)
        ? $prazoLimite . ' 00:00:00'
        : null;

    // Dados que serão salvos
    $dadosRegistro = [
        'idUsuario' => $idUsuario,
        'descricao' => $descricao,
        'status_registro' => $status,
        'data_ocorrencia' => $dataOcorrencia,
        'idDepartamento' => $idDepartamento ?: null,
        'impacto_erro' => $impacto,
        'norma_violada' => $norma ?: null,
        'origem_desvio' => $origem ?: null,
        'acao_imediata' => $acaoImediata ?: null,
        'responsavel_Imediato' => $responsavelImediato,
        'prazo' => $prazoBanco,
        'analise_erro' => $analise ?: null,
        'acao_corretiva' => $acaoCorretiva ?: null,
        'responsavel_acaoFinal' => $responsavelFinal,
        'prazo_limite' => $prazoLimiteBanco
    ];

    // Salva no banco
    $idRegistro = create($pdo, 'registros', $dadosRegistro);

    header('Location: registro.php?sucesso=' . $idRegistro);
    exit;

} catch (PDOException $e) {

    error_log($e->getMessage());

    header('Location: registro.php?erro=banco');
    exit;

} catch (Exception $e) {

    header('Location: registro.php?erro=' . urlencode($e->getMessage()));
    exit;
}
?>
