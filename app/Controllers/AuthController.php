<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('TFA4/customers'));
        }

        return view('TFA4/login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'full_name'  => $user['full_name'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->to(base_url('TFA4/customers'));
            } else {
                return redirect()->back()->with('error', 'Invalid password.')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Username not found.')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('TFA4/login'))->with('success', 'Logged out successfully.');
    }
}