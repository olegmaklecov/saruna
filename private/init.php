<?php
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('SHARED_PATH', PRIVATE_PATH . '/shared');
define('PUBLIC_PATH', PROJECT_PATH . '/public');
define('WEB_ROOT', '/saruna/public');

function myAutoload($class) {
    include('classes/' . $class . '.class.php');
}
spl_autoload_register('myAutoload');
?>