<?php

class FileWriter
{
    public static function write()
    {
        /* 
         * if we have a file being uploaded, first handle that
         */
        if(Request::fileUploaded()) {    
        $fileid = uniqid().".".pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
        $target_file =BP."uploads/".$fileid;

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
       } else {
           $fileid="none";
       }
       /*
        * write applicants info in a single line of the csv file 
        * NOTICE: the user could use a comma or new line character in the two textareas which WILL break this app
        * TODO: fix this with strtr
        */
        extract(Request::postArray());
        
       $myfile=fopen("public/studneti.txt","a");
       
       fwrite($myfile, $name.",".$email.",".$course.",".$year.",".$motivation.",".$foreknowledge.",".$languages.",".$fileid.PHP_EOL);
    
      
    }
    
    
    
}