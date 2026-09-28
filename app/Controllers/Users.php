<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User Accounts - POS System',
            'heading' => 'User Accounts',
            'users' => [
                ['username' => 'admin_john', 'full_name' => 'John Doe', 'role' => 'Administrator'],
                ['username' => 'cashier_sarah', 'full_name' => 'Sarah Connor', 'role' => 'Cashier'],
                ['username' => 'manager_mike', 'full_name' => 'Michael Scott', 'role' => 'Manager'],
                ['username' => 'staff_lisa', 'full_name' => 'Lisa Kudrow', 'role' => 'Staff'],
                ['username' => 'cashier_tom', 'full_name' => 'Tom Hanks', 'role' => 'Cashier'],
            ]
        ];

        return view('pages/users', $data);
    }
}