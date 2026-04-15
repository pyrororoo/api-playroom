<?php

//headers
header('Access-Control-Allow-Origin: *'); //lets any domain access this api without auth
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Only GET is allowed'
    ));
    exit();
}

//initializing our api
include_once(__DIR__ . '/../core/initialize.php');

//instantiate user object
$user = new User($db);

$userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($userId <= 0) {
    http_response_code(400);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'id is required and must be a positive integer'
    ));
    exit();
}

$user->id = $userId;

try {
    if (!$user->getUser()) {
        http_response_code(404);
        echo json_encode(array(
            'status' => 'error',
            'message' => 'User not found'
        ));
        exit();
    }

    $post_arr = array(
        'id' => $user->id,
        'username' => $user->username,
        'display_name' => $user->display_name,
        'created_at' => $user->created_at
    );

    //make json
    echo json_encode($post_arr);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(array(
        'status' => 'error',
        'message' => 'Failed to fetch user'
    ));
}

