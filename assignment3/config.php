<?php
    define('DBHOST', '');
    define('DBNAME', 'travel');
    define('DBUSER', 'jtelan');
    define('DBPASS', '');
    define('DBCONNSTRING','mysql:dbname=travel;charset=utf8mb4;');
    
    // auto load all classes so we don't have to explicitly include them
    spl_autoload_register(function ($class) {
        $file = 'classes/' . $class . '.class.php';
        
        if(file_exists($file)) {
            include $file;
        }
    });
    
    $connection = DatabaseHelp::connectionInfo(array(DBCONNSTRING, DBUSER, DBPASS));
?>