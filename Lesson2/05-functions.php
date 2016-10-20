<?php
header('Content-Type: text/plain');


function test()
{
    echo "Test is executed\n";
       
}

function test2($a, $b =2,$c)
{
    return ($a**$b*$c);//ako nije setan $b on ga stavlja na 2//dvije zvijezdice je potenciranje
}

$c=  test2($a, null, $b);
var_dump($c);


//samo u php7
//function test3(array $a,int $b): int {}

/* anonymus function
 * 
 * 
 */
$test = function(){
    echo "Test is executed\n";
}

$a=[1,2,3];

function pomnoziSaDva($value) {
    return $value *2;
}//nekoristimo
$b = array_map('pomnoziSaDva');
$b =array_map(function($values)) { // nisam uspio prepisat provjeri
    //anonymus funkcija (closure) je objekt
    return $value *2;
}, $a);

var_dump($b);
