<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('TFA3/customers', $data);
    }

    public function create()
    {
        return view('TFA3/customer_form', [
            'action' => base_url('tfa3/customers/create'),
            'title'  => 'Add New Customer',
            'customer' => []
        ]);
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('TFA3/customer_form', [
                'validation' => $this->validator,
                'action'     => base_url('tfa3/customers/create'),
                'title'      => 'Add New Customer',
                'customer'   => $this->request->getPost()
            ]);
        }

        $this->customerModel->save([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('tfa3/customers'))->with('success', 'Customer created successfully.');
    }

    public function edit($id = null)
    {
        $customer = $this->customerModel->find($id);
        if (!$customer) {
            return redirect()->to(base_url('tfa3/customers'))->with('error', 'Customer not found.');
        }

        return view('TFA3/customer_form', [
            'action'   => base_url('tfa3/customers/update/' . $id),
            'title'    => 'Edit Customer',
            'customer' => $customer
        ]);
    }

    public function update($id = null)
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('TFA3/customer_form', [
                'validation' => $this->validator,
                'action'     => base_url('tfa3/customers/update/' . $id),
                'title'      => 'Edit Customer',
                'customer'   => array_merge($this->request->getPost(), ['id' => $id])
            ]);
        }

        $this->customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to(base_url('tfa3/customers'))->with('success', 'Customer updated successfully.');
    }
}