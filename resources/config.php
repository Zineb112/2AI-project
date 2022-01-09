<?php 

ob_start();
session_start();

// session_destroy();

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); // Now DS will become / or \ depending on the system se use.


//__DIR__ gives you the whole path of the server
// __FILE__ gives you the whole path of the server in till the file it self

defined('TEMPLATE_FRONT') ? null : define('TEMPLATE_FRONT', __DIR__ . DS . "templates/front");
defined('TEMPLATE_BACK') ? null : define('TEMPLATE_BACK', __DIR__ . DS . "templates/back");

defined('DB_HOST') ? null : define('DB_HOST', 'localhost');
defined('DB_USER') ? null : define('DB_USER', 'root');
defined('DB_PASS') ? null : define('DB_PASS', '');
defined('DB_NAME') ? null : define('DB_NAME', '2ai_db'); 


// setting DSN Data source name
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME; 

// Create a PDO instance
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// Error Handling

try {
    global $pdo;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Failed' . $e->getMessage();
}

// Helper Functions

require_once __DIR__ . DS . '../vendor/autoload.php';
require_once('functions.php');
require_once 'sendemail.php';


?>