<?php

header('Content-Type: text/plain');
        
        $isTrue = true;
//$isTrue=':]';     //oba su true

if($isTrue)
{
    echo "It's true\n";
    
}

$isFalse = false;//ovakvko imese zove camelcase// snake case $is_false
$isFalse = 0;
$isFalse = '';
//$isFalse;//prazan objekt je true;
// $isFalse = false;
if(!$isFalse)
{
    echo "is false";
    
}


var_dump(123 == "123abc");
var_dump((1 == 1.0)==(true == 'false'));
var_dump(1==='1');

////////

$a =5;
$b =6;

if($a>$b) {
    echo "a is bigger \n";
} else if ($a == $b) {
    echo " they are equal \n";
} else {
    echo "a is smaller \n";
    
}
   
$result = $isTrue ? 'one':'two';
var_dump($result);


$result =$isTrue ?: false;
//ekvivalent
if ($isTrue) {
    $result =$isTrue;
} else {
    $result=$false;
}

var_dump($result);

$day=2;

switch($day)
{
 case 1: echo "hey";
     break;   
}


var_dump(isSet($lol) && lol== 3);

//samo na php7
//$action = $_POST['action'] ?? 'defauilt';
