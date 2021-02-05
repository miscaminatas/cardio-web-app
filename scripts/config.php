<?php 
// sesja
if(!isset($_SESSION)) {
session_start();
}
// informacje bazy
define('DB_HOST','mysql.cba.pl');
define('DB_USER','cardioapp');
define('DB_PASS','Inzynierka2020');
define('DB_NAME','cardioapp');
// połączenie z bazą
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>