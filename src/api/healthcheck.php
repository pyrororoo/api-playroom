<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

try {
    require_once(__DIR__ . '/../core/initialize.php');

    $stmt = $db->query('SELECT 1');
    $db_ok = $stmt !== false;

    http_response_code(200);
    echo json_encode(array(
        'status' => 'ok',
        'app' => APP_NAME,
        'db' => $db_ok ? 'up' : 'down',
        'timestamp' => gmdate('c')
    ));
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(array(
        'status' => 'error',
        'app' => 'API PLAYROOM',
        'db' => 'down',
        'error' => $e->getMessage(),
        'timestamp' => gmdate('c')
    ));
}

?>
