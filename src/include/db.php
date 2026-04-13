<?php

    # Database connection details

    $db_user = 'root';
    $db_pass = '';
    $db_name = 'user_system';

    //pdo instead of mysqli, because it is more secure and easier to use
    $db = new PDO('mysqli:host=127.0.0.1;dbname='.$db_name.';charset=utf8', $db_user, $db_pass);

    //set some db attributes
    //supposedly makes db connection faster
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRORMODE, PDO::ERRMODE_EXCEPTION);
    
    //if there is an error, catch it and display it
    try {
        $db->connect();
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }

    define('APP_NAME', 'API PLAYROOM');

?>
