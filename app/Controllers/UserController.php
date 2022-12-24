<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
}