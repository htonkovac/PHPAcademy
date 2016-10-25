<?php
header('Content-Type: text/plain');

/**
 * a) Parse csv file 08-tasks/postanski-uredi.csv to array as shown below
 * b) Group postal offices by region (second array)
 * c) Create function getRegionName($area) that resolves region name for 
 * specific area
 * d) Sort region, city and areas alphabetically
 
*/

/*
*parsing the whole file into a really long string
*/
$fileContents = file_get_contents(__DIR__."\postanski-uredi.csv");


/*
*exploding the really long $fileContents string into a more managable array
*/
$rows = explode("\r\n",$fileContents);




/*
*these functions remove the first and the last element of the array 
*the first element is the header of the csv file
*the last element is removed because the csv file ends with a \r\n and upon using the explode function the last element of the created array is an empty string
*/
array_shift($rows);
array_pop($rows);



/*
*using the explode function recursively over the $rows array to create a 2D array(matrix)
*/
$csValuesMatrix= array_map(function($string) { return explode(",", $string);},$rows);

/*
*making the matrix asociative for ease of use
*/
$csValuesMatrix = array_map (function($csValuesMatrix) {    
return [
    'name'=>$csValuesMatrix[3],
    'zip'=>$csValuesMatrix[1],
    'area'=>$csValuesMatrix[4],
    'region'=>$csValuesMatrix[5]
    ];
},$csValuesMatrix); 

/*
*the csv file is sorted by zip code, but sorting by zip codes does not necessarily sort by region, there are certan zips belonging to ZAGREBAČKA region in the middle of  GRAD ZAGREB region zips
*furthermore there is a typo inside the file on line 187 "vrbovec" is not capitalised, this also causes this code to create a separate PU for "vrbovec" and "Vrbovec"
*/
//TODO: use more descriptive comments
foreach($csValuesMatrix as $value) {
    $flag =false; //resetting the flag in every iteration
    if(!isset($postalOfficesByRegion[$value['region']])) {  //if the region is not set
      $postalOfficesByRegion[$value['region']][]=['name'=>$value['name'],'zip'=>$value['zip'],'area'=>[$value['area']]];   
    } else {
    for($i=0;$i<count($postalOfficesByRegion[$value['region']]);$i++) {
//if we have found a suitable postal office within the region
if($postalOfficesByRegion[$value['region']][$i]['name']==$value['name'] && $postalOfficesByRegion[$value['region']][$i]['zip']==$value['zip'] ) {
$postalOfficesByRegion[$value['region']][$i]['area'][]=$value['area'];
$flag =true;
break;
}

}
if($flag==false) {
        $postalOfficesByRegion[$value['region']][]=['name'=>$value['name'],'zip'=>$value['zip'],'area'=>[$value['area']]];  
}
}
}

//initializing the collator
    $collator = collator_create('hr_HR');

/*
*user sort according to key
*/
uksort($postalOfficesByRegion, function ($a,$b) { 
       $collator = collator_create('hr_HR');
   return collator_compare ($collator ,$a,$b);
    }
    );



/*
*   sorting by area
*   the ampersand denotes that we access the value by reference and not by value
*/
foreach ($postalOfficesByRegion as &$value) {
    foreach ($value as &$theValue) {
        collator_asort($collator,$theValue['area']);
    }
}


/*
*   sorting by city name, we define a function to be passed as a parameter for the usort() function using a closure
*/
foreach( $postalOfficesByRegion as $key=>&$value) {
usort($value, function ($a,$b) {
     $collator1 = collator_create('hr_HR'); //we have to reinitialize the collator because we are not passing it as an argument to the function QUESTION:"How to avoid this ?"

   return collator_compare ($collator1 ,$a['name'],$b['name']);
    }
    );
}



/*
*   this function is used to find the region to which the area is mapped to 
*/
function findRegion($area,$csValuesMatrixs) {
foreach ($csValuesMatrixs as $value) {

    if($area==$value['area'])
    {
        echo $value['region'].' is the name of the region where '.$area.' is located!';
    }

}

return;}
/*
*   it is easier to find the region by using $csValuesMatrix, the matrix of exploded csv values
*   Is this a cheat? Where we supposed to use the array we created in the task ???
*/





/*
*outputting everything
*/
findRegion("Briješće",$csValuesMatrix);
echo "\n\n";
var_dump($postalOfficesByRegion);