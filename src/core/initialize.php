<?php

# DEFINES ALL NEEDED DIRECTORIES AND LOADS ALL CORE CLASSES AND DB CONFIG

    //defines DS as directory separator...essentially \ on windows and / on linux, so that the code can be used on both systems without modification
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    //supply 'api-playroom' with the correct path to the site root, so that it can be used in the rest of the code
    defined('ROOT') ? null : define('ROOT', DS . 'htdocs' . DS . 'api-playroom' . DS);
    
    //defines \include and \core path as the site root
    defined('INC_PATH') ? null : define('INC_PATH', ROOT . 'src' . DS . 'include' . DS);
    defined('CORE_PATH') ? null : define('CORE_PATH', ROOT . 'src' . DS . 'core' . DS);

    //load db config file
    require_once(INC_PATH . 'db.php');

    //core classes 
    require_once(CORE_PATH . 'users.php');
    require_once(CORE_PATH . 'pets.php');

?>