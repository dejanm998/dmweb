<?php

$server = '192.168.1.110';
$username = 'ccdb';
$password = 'Pa55w.rd';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
