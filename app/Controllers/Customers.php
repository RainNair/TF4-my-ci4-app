<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Customer Accounts - POS System',
            'heading' => 'Customer Accounts',
            'customers' => [
                ['full_name' => 'Alice Johnson', 'email' => 'alice.j2026@gmail.com', 'phone' => '555-0101'],
                ['full_name' => 'Bob Smith', 'email' => 'bsmith_outlook@outlook.com', 'phone' => '555-0102'],
                ['full_name' => 'Charlie Brown', 'email' => 'charlie.b.99@gmail.com', 'phone' => '555-0103'],
                ['full_name' => 'Diana Prince', 'email' => 'diana_themyscira@outlook.com', 'phone' => '555-0104'],
                ['full_name' => 'Evan Wright', 'email' => 'evan.wright.dev@gmail.com', 'phone' => '555-0105'],
            ]
        ];

        return view('pages/customer', $data);
    }
}