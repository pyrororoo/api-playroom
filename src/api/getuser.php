<?php

//headers
header('Access-Control-Allow-Origin: *'); //lets any domain access this api without auth
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiate user object
$user = new User($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->getUser();

$post_arr = array(
    'id' => $user->id,
    'username' => $user->username,
    'display_name' => $user->display_name,
    'created_at' => $user->created_at
);

//make json
print_r(json_encode($post_arr));


