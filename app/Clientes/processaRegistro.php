<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/banco/crud.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: registro.php');
    exit;
}

$idUsuario = $_SESSION['idUsuario'] ?? null;

$descricao = trim($_POST['descricao'] ?? '');
$status    = $_POST['status_registro'] ?? 'AGUARDANDO';

$data = $_POST['data_ocorrencia'] ?? '';
$hora = ($_POST['hora_ocorrencia'] ?? '') ?: '00:00';  // corrigido: vazio vira 00:00

$idDepartamento = $_POST['idDepartamento'] ?? null;

$impacto = $_POST['impacto_erro'] ?? '';
$norma   = trim($_POST['norma_violada'] ?? '');

// local + equipamento vão juntos na coluna origem_desvio
$local       = trim($_POST['local'] ?? '');
$equipamento = trim($_POST['equipamento'] ?? '');
$origem      = trim($local . ($equipamento !== '' ? ' - ' . $equipamento : ''));

$acaoImediata        = trim($_POST['acao_imediata'] ?? '');
$responsavelImediato = $_POST['responsavel_Imediato'] ?? null;
$prazo               = $_POST['prazo'] ?? '';

$analise          = trim($_POST['analise_erro'] ?? '');
$responsavelFinal = $_POST['responsavel_acaoFinal'] ?? null;
$prazoLimite      = $_POST['prazo_limite'] ?? '';

try {

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

    $impactosPermitidos = ['LEVE', 'MODERADO', 'CRITICO'];
    $statusPermitidos   = ['ANDAMENTO', 'AGUARDANDO', 'FINALIZADO', 'CANCELADO'];

    if (!in_array($impacto, $impactosPermitidos, true)) {
        throw new Exception("Nível de risco inválido.");
    }

    if (!in_array($status, $statusPermitidos, true)) {
        throw new Exception("Status inválido.");
    }

    $dataOcorrencia = $data . ' ' . $hora . ':00';

    $prazoBanco       = !empty($prazo)       ? $prazo . ' 00:00:00'       : null;
    $prazoLimiteBanco = !empty($prazoLimite) ? $prazoLimite . ' 00:00:00' : null;

    // Somente colunas que já existem na tabela registros
    $dadosRegistro = [
        'idUsuario'             => $idUsuario,
        'descricao'             => $descricao,
        'status_registro'       => $status,
        'data_ocorrencia'       => $dataOcorrencia,
        'idDepartamento'        => $idDepartamento ?: null,
        'impacto_erro'          => $impacto,
        'norma_violada'         => $norma ?: null,
        'origem_desvio'         => $origem ?: null,
        'acao_imediata'         => $acaoImediata ?: null,
        'responsavel_Imediato'  => $responsavelImediato,
        'prazo'                 => $prazoBanco,
        'analise_erro'          => $analise ?: null,
        'responsavel_acaoFinal' => $responsavelFinal,
        'prazo_limite'          => $prazoLimiteBanco
    ];

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