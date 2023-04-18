<?php
session_start();
ob_start();

$db_user 	= "root";
$db_passw 	= "";

try {
    $veritabani = new PDO('mysql:host=localhost;dbname=veritabani', $db_user, $db_passw);
} catch (PDOException $e) {
    print "Veritabani Hatasi!: " . $e->getMessage() . "<br/>";
    die();
}
?>