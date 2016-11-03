<?php

class FileReader 
{
    public static function readStudents(){    
    $fileContents = file_get_contents(BP."public/studneti.txt"); /*or die("fuck");exit;*/  //var_dump($fileContents);exit;
    $rows = explode(PHP_EOL,$fileContents);
    array_pop($rows);
    $csValuesMatrix= array_map(function($string) { return explode(",", $string);},$rows);

     ob_start();

    foreach ($csValuesMatrix as $key=>$value) { 
        echo "<tr>";
        foreach($value as $theKey=>$theValue) {
     
        
        echo "<td>".$theValue."</td>";
    }
    echo "</tr>";
    }
    
    
    
    return ob_get_clean();
    }
    
}
