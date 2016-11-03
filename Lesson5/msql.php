<?php

header('Content-Type: text/plain');
/*
 * @notes:
 *  - mysql_is deprecated; use PDO, msqli_
 * mysql-connect NERADI vise u php
 * mysqli_ je bolaj verzija
 * PDO je treca stvaer
 */
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

$sql = 'SELECT * FROM `attendee`';

$stmt = $conn->query($sql);

while($row = $stmt->fetch()) {
    print $row['id']. "\t";
    print $row['name']."\t";
    print $row['email']."\n";
    
}
foreach($stmt -> fetchAll() as $row) {
    print $row['id']. "\t";
    print $row['name']."\t";
    print $row['email']."\n";
}
foreach($stmt as $row) {
    print $row['id']. "\t";
    print $row['name']."\t";
    print $row['email']."\n";
}