<?php

header('Content-Type: text/plain');

$v = 42;

echo $v;

var_dump($v);


$n = 1;

var_dump($n);

$n = 2.55;

var_dump($n);

$b= false;
var_dump($b);

$s='PHP Akademija $n \n a'; 

echo $s;

$s="PHP Akademija $n \n a"; //ovo je  {$n[1]} za pristupati array elementima

echo $s;

var_dump($s);


$a1=[1,2,3];
$a2=array(1,2,3);
var_dump($a1);

echo $a1[2];

$a1[3]= 4;
$a1[]=5;
$a1[]=6;
print_r($a1); // inace ga ne koriste ali moze primit drugi paramerar (true) i onda ga mozes stavit u varijablu


$a3 = [1,1.2,"treci"];

var_dump($a3);

$a3 =
        [
            'key_1' => 1,
            'key_2' => 2.3,
            'key_3' => 'tri',
            
        ];

$a3[0]= '4'; // zast mi ovo neradi

            
        var_dump($a3);

        
        $o = new StdClass();
        $o ->x ='Just a property';
        
        var_dump($o);
        
        $o2 = new StdClass();
        $o2 ->x ='another property';
        
        var_dump($o2);
die();