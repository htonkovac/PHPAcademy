<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {//*YOU ARE HERE*
        $view = new View();
      //  $view->render('imetemplejta',['message'=>Request::get('a'),'welcome'=>'jesus']); just an example
        $view->render('form');
    }

    /**
     * Form submit
     */
    public function submit()
    {
$fileWriter =new FileWriter();
$fileWriter->write();
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