<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    private function setUserSession($user)
    {
        session()->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'WesLogin' => true,
            'created_at' => $user['created_at'],
            'updated_at' => $user['updated_at'],
        ]);
        return true;
    }

    public function SignIn()
    {
        $model = new UsersModel();
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $checkpointData = $model->where('email', $email)->first();
            if (!empty($checkpointData)) {
                if (password_verify($password, $checkpointData['password'])) {
                    $this->setUserSession($checkpointData);
                    return $this->response->setJSON([
                        'status' => true,
                        'icon' => 'success',
                        'title' => 'Login Success!',
                        'text' => 'You will be redirected in 3 seconds.'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => false,
                        'icon' => 'error',
                        'title' => 'Oops....',
                        'text' => 'Password is wrong!'
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Oops....',
                    'text' => 'Email doenst exist!'
                ]);
            }
        }
        return view('auth/signin');
    }

    public function SignUp()
    {
        $model = new UsersModel();
        if ($this->request->isAJAX()) {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            if ($model->where('email', $data['email'])->first()) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Oops...',
                    'text' => 'Email already used! try another one.'
                ]);
            } else {
                $model->save($data);
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Register Success!',
                    'text' => 'You can login now!'
                ]);
            }
        }
        return view('auth/signup');
    }

    public function SignOut()
    {
        session()->destroy();
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Logout Success!',
            'text' => 'You will be redirected in 3 seconds.'
        ]);
    }
}
