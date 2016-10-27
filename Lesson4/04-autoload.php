<?php
header('Content-Type: text/plain');
/*include 'classes/Inchoo/Developer.php';
//class is in classes/Inchoo/Developer.php
$developer = new \Inchoo\Developer();
var_dump($developer);
exit;*/


////////////


spl_autoload_register(function($className) {//autoloader je memory efficient

    echo "PHP is including class: $className \n";

    // Ferit\Student => Ferit/Student for linux and mac
    $classNameToPath = strtr($className, '\\', DIRECTORY_SEPARATOR);//strtr je brzi *zaboravio sam*

    //include needed class
    include "classes/$classNameToPath.php";
});


$student = new \Ferit\Student();
var_dump($student);
