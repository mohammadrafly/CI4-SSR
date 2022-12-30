<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\UsersModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UsersModel();
        $data['content'] = $model->findAll();
        return view('users', $data);
    }

    public function deleteUser($id)
    {
        $model = new UsersModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'isConfirm' => true,
        ]);
    }

    public function editUser($id)
    {
        $model = new UsersModel();
        return $this->response->setJSON([
            'data' => $model->where('id', $id)->first(),
        ]);
    }

    public function updateUser()
    {
        $model = new UsersModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'id' => $this->request->getPost('id'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $model->update($data['id'], $data);
        return $this->response->setJSON([
            'isUpdated' => true
        ]);
    }
}