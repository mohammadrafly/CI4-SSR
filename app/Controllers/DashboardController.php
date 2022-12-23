<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('layout/app');
    }

    public function Users()
    {
        $model = new UsersModel();
        $data['content'] = $model->findAll();
        return view('users', $data);
    }
}
