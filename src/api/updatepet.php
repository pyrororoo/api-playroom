<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Only POST is allowed'
    ));
    exit();
}

include_once(__DIR__ . '/../core/initialize.php');

$payload = $_POST;
if (empty($payload)) {
    $raw = file_get_contents('php://input');
    if (!empty($raw)) {
        $decoded = json_decode($raw, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            $payload = $decoded;
        }
    }
}

$petId = isset($payload['pet_id']) ? (int)$payload['pet_id'] : 0;
$petName = isset($payload['pet_name']) ? trim((string)$payload['pet_name']) : null;
$petType = isset($payload['pet_type']) ? trim((string)$payload['pet_type']) : null;

if ($petId <= 0) {
    http_response_code(400);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'pet_id is required'
    ));
    exit();
}

$setClauses = array();
$params = array(':id' => $petId);

if ($petName !== null && $petName !== '') {
    $setClauses[] = 'pet_name = :pet_name';
    $params[':pet_name'] = $petName;
}

if ($petType !== null && $petType !== '') {
    $setClauses[] = 'pet_type = :pet_type';
    $params[':pet_type'] = $petType;
}

if (empty($setClauses)) {
    http_response_code(400);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'At least one field is required: pet_name or pet_type'
    ));
    exit();
}

try {
    $query = 'UPDATE pets SET ' . implode(', ', $setClauses) . ' WHERE id = :id';
    $stmt = $db->prepare($query);
    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
        echo json_encode(array(
            'status' => 'success',
            'message' => 'Pet updated successfully'
        ));
    } else {
        echo json_encode(array(
            'status' => 'warning',
            'message' => 'No pet found or no changes made'
        ));
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Update failed'
    ));
}

?>
