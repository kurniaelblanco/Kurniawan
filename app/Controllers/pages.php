<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | webnovel'
        ];
        return view('pages/home', $data);
    }


    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        return view('pages/contact', $data);
    }
}
