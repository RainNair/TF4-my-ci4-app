<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('TFA4/users', $data);
    }

    public function create()
    {
        return view('TFA4/user_form', [
            'action' => base_url('TFA4/users/create'),
            'title'  => 'Add New User',
            'user'   => [],
            'isEdit' => false
        ]);
    }

    public function store()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]|min_length[3]|max_length[50]',
            'full_name' => 'required|min_length[2]|max_length[100]',
            'password'  => 'required|min_length[6]',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return view('TFA4/user_form', [
                'validation' => $this->validator,
                'action'     => base_url('TFA4/users/create'),
                'title'      => 'Add New User',
                'user'       => $this->request->getPost(),
                'isEdit'     => false
            ]);
        }

        $avatarName = $this->handleAvatarUpload();

        $this->userModel->save([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'avatar'     => $avatarName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('TFA4/users'))->with('success', 'User created successfully.');
    }

    public function edit($id = null)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('TFA4/users'))->with('error', 'User not found.');
        }

        return view('TFA4/user_form', [
            'action' => base_url('TFA4/users/update/' . $id),
            'title'  => 'Edit User',
            'user'   => $user,
            'isEdit' => true
        ]);
    }

    public function update($id = null)
    {
        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]|min_length[3]|max_length[50]",
            'full_name' => 'required|min_length[2]|max_length[100]',
            'password'  => 'permit_empty|min_length[6]',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return view('TFA4/user_form', [
                'validation' => $this->validator,
                'action'     => base_url('TFA4/users/update/' . $id),
                'title'      => 'Edit User',
                'user'       => array_merge($this->request->getPost(), ['id' => $id]),
                'isEdit'     => true
            ]);
        }

        $existingUser = $this->userModel->find($id);
        $avatarName = $this->handleAvatarUpload($existingUser['avatar'] ?? null);

        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to(base_url('TFA4/users'))->with('success', 'User updated successfully.');
    }

    private function handleAvatarUpload(?string $currentAvatar = null): ?string
    {
        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars';

            $file->move($uploadPath, $newName);

            Services::image()
                ->withFile($uploadPath . '/' . $newName)
                ->fit(150, 150, 'center')
                ->save($uploadPath . '/' . $newName);

            return $newName;
        }

        return $currentAvatar;
    }
}