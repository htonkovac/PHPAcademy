<?php

header('Content-Type: text/plain');
$dns = 'mysql:host=localhost;dbname=academy';
$username = 'root';
$password = '';
try
{
    
    $conn = new PDO($dns, $username, $password);
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

$sql = 'SELECT * FROM `attendee` WHERE id = '.$_GET['id'];
echo 'SQL: '.$sql.PHP_EOL.PHP_EOL;
$stmt = $conn->query($sql);

echo ' RESULT: ';
print_r($stmt->fetchAll());