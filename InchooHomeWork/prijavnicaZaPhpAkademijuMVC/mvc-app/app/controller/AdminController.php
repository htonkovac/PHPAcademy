<?php

class AdminController 
{
    
    public function index()
    {
        
        if(!Session::getInstance()->isLoggedIn()){
        $view = new View();
        $view->render('adminLogin');
        } else {
            $view = new View();
            $view->render('admin');
        }
            
    }
    
    public function login()
    {
        $applicants=FileReader::readStudents();
        if(Session::getInstance()->isLoggedIn()) { //the user is logged in, render the admin page 
            $view =new View();
             $view->render('admin',['applicants' =>  "$applicants"]);
            return;
        } elseif(!Session::getInstance()->login()) {   //the user failed to login,render the login screen with a message 
            $view = new View();
            $view->render('adminLogin',['message'=>'Wrong password or username!']);
        } else {    //everything went OK, render the admin page
            $view =new View();
            $view->render('admin',['applicants' =>  "$applicants"]);
        }
     
        
    }
    
    public function logout()
    {
     
        Session::getInstance()->logout();
        $view =new View();
        $view->render('index');
        
    }
}