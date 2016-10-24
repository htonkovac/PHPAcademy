<?php
header('Content-Type: text/plain');
/**
 * a) Parse csv file 08-tasks/postanski-uredi.csv to array as shown below
 * b) Group postal offices by region (second array)
 * c) Create function getRegionName($area) that resolves region name for 
 * specific area
 * d) Sort region, city and areas alphabetically
 

$postalOfficesByRegion = [
    'Osječko-baranjska' => [                
        [
            'name' => 'Osijek', 
            'zip' => '31000', 
            'area' => [
                'Brijest',
                'Briješće',
                //..
            ]
        ],
        //..
    ],
    //..id,brojPu,redBroj,nazivPu,naselje,zupanija
   
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
*Questions: 
*if the server had been running on another OS, would i potentally need to use a diffirent first parameter?
*What if the file had been created on one OS, but the server is running another, what then?
*/



/*
*these functions remove the first and the last element of the array 
*the first element is the header of the csv file
*the last element is removed because the csv file ends with a \r\n and upon using the explode funtion the last element of the created array is an empty string
*/
array_shift($rows);
array_pop($rows);



/*
*using the explode function recursively over the $rows array to create a 2D array 
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
*$counter was supposed to count the number of elements in the array  
*TODO: replace with the count() function if possible
*
*this approach makes many many unnecessary checks, and doesn't really make sense but it does work since we use isset()
*the problem is that the csv file is sorted by zip code, but sorting by zip codes do not necessarily sort by region, there are certan zips belonging to ZAGREBAČKA region in the middle of  GRAD ZAGREB region zips
*/
$counter=0;

//looping through the parsed file
foreach($csValuesMatrix as $value) {
    $flag=false;    //each cycle of the for loop resets the flag, the flag tells us have we found a matching name and region for the specified area
    for($i=0;$i<$counter;$i++) {

//this IF statement checks whether the given area belongs to a region already assinged to the array, but also do the name and zip match (the city of Zagreb has sereval zip codes)
if(isset($postalOfficesByRegion[$value['region']][$i]) && $postalOfficesByRegion[$value['region']][$i]['name']==$value['name'] && $postalOfficesByRegion[$value['region']][$i]['zip']==$value['zip'] ) {
//if true we assign the area to the region, raise the flag, and break out of the loop since one area can be assigned to only one region
$postalOfficesByRegion[$value['region']][$i]['area'][]=$value['area'];
$flag =true;
break;
//if the flag had not been raised it means that this area does not belong to any of the existing regions or names within the existing regions, anyway, we need a new array element
} }if($flag==false) {

 $postalOfficesByRegion[$value['region']][]=['name'=>$value['name'],'zip'=>$value['zip'],'area'=>[$value['area']]];
 $counter++;


}

}


/*
*   DISCLAMER: the following three sorts put croatian characters čćžšđ at the end
*              I have tried to fix this with little success
*              google searches recommend using the Collator class but it requires installation of something special to the server
*   TODO: fix this 
*/


/*
*   sorting the array by region
*/
ksort($postalOfficesByRegion);

/*
*   sorting by area
*   the ampersand denotes that we access the value by reference and not by value
*/
foreach ($postalOfficesByRegion as &$value) {
    foreach ($value as &$theValue) {
       asort($theValue['area']);
    }
}

/*
*   sorting by city name, we define a function to be passed as a parameter for the usort() function using a closure
*
*/
foreach( $postalOfficesByRegion as $key=>&$value) {
usort($value, function ($a,$b) {
    return strcmp($a['name'],$b['name']); 
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
var_dump($postalOfficesByRegion);