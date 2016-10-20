<?php
header('Content-Type: text/plain');

$a = [1, 'two', 'three', 4];

foreach($a as $value) {
   // echo $value;
}

foreach($a as $key=>$value){
    //echo $key.' '.$value;
}

for($i=0;$i<10;$i++)
{
    
    // break; break 2;//izlazi iz 2 loopa // continue;
    //while, do-while //http://php.net/manual/en/control-structures.continue.php

    //sta je continue
}


//provjeri sta su explode i implode

$list = [
    '<a> - anchor',
    '<p> - paragraph',
    '<ul> - unordered list',
    '<table> - table'
    
    
];

foreach($list as $values) {
    $explodedvalues = explode(' - ',$values);
    echo $explodedvalues[0]."\t".$explodedvalues[1]."\n";
  //$explodedvalues = explode(' - ',$item);
//echo $explodedvalues;
    
    //probaj ovo i s html i plaintextom
}
echo "&lt; &gt;";// ovdje nece radit jer je plain text ali to znaCI LESS than i greather than


//<pre> tag je super
//http://stackoverflow.com/questions/15433188/r-n-r-n-what-is-the-difference-between-them