<?php

class IndexController
{
    public function test()
    {
        $view = new View();
        $view->render('imetemplejta',['message'=>Request::get('a')]);
    }

    public function index()
    {
        $view = new View();
        $view->render('index', [
            'message' => 'This is message passed from controller.'
        ]);
    }

}