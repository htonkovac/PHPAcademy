<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {
        $view = new View();
        $view->render('form');
    }

    /**
     * Form submit
     */
    public function submit()
    {
        Db::connect()->insertData();
        self::thankyou();       
    }

    /**
     * Thank you page
     */
    public function thankyou()
    {
      $view = new View();
      $view->render('thankyou');    
    }

}