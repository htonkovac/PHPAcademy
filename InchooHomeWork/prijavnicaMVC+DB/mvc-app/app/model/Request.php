<?php

/**
 * Class Request
 *
 * Handles everything request related
 */
class Request
{
    /**
     * Resolves path info from $_SERVER to use with mod rewrite
     *
     * @return string
     */
    public static function pathInfo()
    {
        if(isset($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        } elseif(isset($_SERVER['REDIRECT_PATH_INFO'])) {
            return $_SERVER['REDIRECT_PATH_INFO'];
        } else {
            return '';
        }
    }

    /**
     * @param $key string
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default='')
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    /**
     * @param $key string
     * @param mixed $default
     * @return mixed
     */
    public static function post($key, $default='')
    {
    
        return isset($_POST[$key]) ? $_POST[$key] : $default;
 
   
      
    }
    public static function postArray()
    {
        $name=self::post('name');
        $email=self::post('email');
        $course=self::post('course');
        $year=self::post('year');
        $motivation=self::post('motivation');
        $foreknowledge=self::post('foreknowledge');
        $languages=(is_array(self::post('languages'))?implode(',',self::post('languages')):"");
        
        return compact('name','email','course','year','motivation','foreknowledge','languages');
    }
    public static function fileUploaded()
    {
        
    return (isset($_FILES['fileToUpload']['error']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK)?true:false;
        
    }
}