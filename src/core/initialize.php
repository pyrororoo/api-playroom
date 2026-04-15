<?php

# DEFINES ALL NEEDED DIRECTORIES AND LOADS ALL CORE CLASSES AND DB CONFIG

    //defines DS as directory separator...essentially \ on windows and / on linux, so that the code can be used on both systems without modification
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    //resolve the app root where api/, core/, and include/ directories live
    defined('ROOT') ? null : define('ROOT', dirname(__DIR__) . DS);
    
    //defines include and core paths from the resolved root
    defined('INC_PATH') ? null : define('INC_PATH', ROOT . 'include' . DS);
    defined('CORE_PATH') ? null : define('CORE_PATH', ROOT . 'core' . DS);

    //load db config 
    require_once(INC_PATH . 'db.php');

    //core classes 
    require_once(CORE_PATH . 'users.php');
    require_once(CORE_PATH . 'pets.php');

?>
