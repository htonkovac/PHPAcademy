<?php

class IndexController
{
    public function test()
    {
        $view = new View();
        $view->render('test',['message'=>'BP']);
    }

    public function index()
    {
        $view = new View();
        $view->render('index', [
            'message' => 'This is message passed from controller.'
        ]);
    }

}