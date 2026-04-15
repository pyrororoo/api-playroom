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

try {
    //instantiate user object
    $users = new User($db);

    //users query
    $results = $users->getUsers();
    $num = $results->rowCount();

    if($num > 0) {
        //users array
        $users_arr = array();
        $users_arr['data'] = array();

        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
            $user_item = array(
                'id' => (int)$row['id'],
                'username' => $row['username'],
                'display_name' => $row['display_name'],
                'created_at' => $row['created_at']
            );

            //push to "data"
            array_push($users_arr['data'], $user_item);
        }

        //turn to json and output
        echo json_encode($users_arr);

    } else {
        //no users
        echo json_encode(
            array('message' => 'No users found')
        );
    }

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(
        array(
            'status' => 'error',
            'message' => 'Failed to fetch users'
        )
    );
}

?>
