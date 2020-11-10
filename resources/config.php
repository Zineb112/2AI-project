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

//helper db functions
function is_table_empty() {
    global $pdo;
    $result = $pdo->query("SELECT id FROM token");
    if($result->rowCount()) {
        return false;
    } 
    return true;
}
function get_access_token() {
    global $pdo;
    $sql = $pdo->query("SELECT access_token FROM token");
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return json_decode($result['access_token']);
}

function get_refersh_token() {
    $result = get_access_token();
    return $result->{'refresh_token'};
}

function update_access_token($token) {
    global $pdo;
    if(is_table_empty()) {
        $pdo->query("INSERT INTO token(access_token) VALUES('$token')");
    } else {
        $pdo->query("UPDATE `token` SET `access_token` = '$token' WHERE 1");
        // $stmt->execute([$token]);
    }
}

// Helper Functions
require_once __DIR__ . DS . '../vendor/autoload.php';
require_once 'functions.php';
require_once 'sendemail.php';
require_once 'google_analytics.php';

?>