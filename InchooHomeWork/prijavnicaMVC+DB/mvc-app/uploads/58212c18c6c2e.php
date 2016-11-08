<?php
header("Content-Type:text/plain");
/**
 * Class Session
 */
class Session
{
    private static $instance;

    private function __construct()
    {
        session_start();
    }

    /**
     * Logs user in
     */
    public function login()
    {
      $_SESSION['logedin']="Yes, the admin is logged in";
    }

    /**
     * Logs user out
     */
    public function logout()
    {
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }

    /**
     * Checks if user is logged in or not
     */
    public function isLoggedIn()
    {
        return !empty($_SESSION);
    }
    
    public static function getInstance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}

?>