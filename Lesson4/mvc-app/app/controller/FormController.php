<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {
        $view = new View();
        $view->render('form', ['lol' => 2]);
    }

    /**
     * Form submit
     */
    public function submit()
    {
        // var_dump(\Request::post("name"));
        $view = new View();
        $view->render('form',['']);
    }

    /**
     * Thank you page
     */
    public function thankyou()
    {
        $view = new View();
        $view->render('form',['']);  
    }

}