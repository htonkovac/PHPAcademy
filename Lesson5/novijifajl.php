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
$id=2; //user input - laze
//$sql = 'SELECT * FROM `attendee` WHERE id = ?';   // jos jedan na cin je ispod 
$sql = 'SELECT * FROM `attendee` WHERE id = :id';// ovo je  key koji se zove id 

$stmt = $conn->prepare($sql);// ovo sanira user input kako netko nebi mogao pisati OR bla bla ,, 
$stmt->execute(['id'=>$id]);
echo ' RESULT: ';

foreach ($stmt as $row) {
    print $row['id']. "\t";
    print $row['name']."\t";
    print $row['email']."\n";
    
}

