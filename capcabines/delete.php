<?php
session_start();
header('Content-Type: application/json');

// Lê o JSON recebido
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['fileName'], $data['pasta'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Parâmetros ausentes.']);
    exit;
}

define('INCLUDE_PATH', __DIR__ . '/'); // Defina isso corretamente se não estiver definido

$pasta = $data['pasta'];
$diretorio = rtrim(INCLUDE_PATH . $pasta, '/') . '/';
$fileName = basename(urldecode($data['fileName']));
$caminhoCompleto = $diretorio . $fileName;

// Debug em log de servidor
error_log('Dados recebidos > delete.php: ' . print_r($data, true));
error_log('Caminho completo: ' . $caminhoCompleto);

if (file_exists($caminhoCompleto)) {
    if (unlink($caminhoCompleto)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Arquivo excluído com sucesso.',
            'caminho' => $caminhoCompleto
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Erro ao excluir o arquivo.',
            'caminho' => $caminhoCompleto
        ]);
    }
} else {
    http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'message' => 'Arquivo não encontrado.',
        'caminho' => $caminhoCompleto
    ]);
}
?>
