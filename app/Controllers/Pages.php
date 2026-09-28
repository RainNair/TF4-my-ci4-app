<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home - POS System',
            'heading' => 'Welcome to Our POS System'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About - POS System',
            'heading' => 'About Us'
        ];

        return view('pages/about', $data);
    }
}