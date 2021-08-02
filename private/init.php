<?php
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('SHARED_PATH', PRIVATE_PATH . '/shared');
define('PUBLIC_PATH', PROJECT_PATH . '/public');
define('WEB_ROOT', '/saruna/public');

require_once('db_credentials.php');
require_once('functions.php');
require_once('validation_functions.php');

function myAutoload($class) {
    include('classes/' . $class . '.class.php');
}
spl_autoload_register('myAutoload');

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_errno) {
    $msg = 'Database connection failed: ';
    $msg .= $conn->connect_error;
    $msg .= ' (' . $conn->connect_errno . ')';
    exit($msg);
}
$db = $conn;
Db::setDb($conn);
$session = new Session;
?>