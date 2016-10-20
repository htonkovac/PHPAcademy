<?php
header('Content-Type: text/plain');
$n=1;
$f=2.55;

var_dump($n + $f);

$b = true;

var_dump($n + $f +$b);//true je = 1
$n +=10;
$n*=10;
$n++;
$n--;

var_dump($n);

$s = ' PHP Akademija';
$s= $s.' je u Osijeku';
$s.='u Osijeku';
var_dump($s);

$n=1;
$s=$n+$n;
var_dump($s);


//arrayevi se mogu spajat //+ se rijetko koristi

$a= [
    1,
    2,
    'one' => 'a1',
    'two'=>'a2'
];
$b = [
    2,
    3,
    'two'=>'b2',
    'three'=>'b3'
];

var_dump($a+$b);//samo appenda ono sto ovaj nema
var_dump(array_merge($a,$b));//neki hibrid replaca strignove a numericke appenda
var_dump(array_replace($a, $b));//zgazi sve 
exit;