<?php

class user extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('usermodel');
    }

    private function hasCredentialErrors($data)
    {
        if (!empty($data['email_err']) || !empty($data['password_err']))
            return true;
        return false;
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitize
            $_POST = array_map("htmlspecialchars", $_POST);
            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if ($this->hasCredentialErrors($data)) {
                $this->view('user/login', $data);
            }

            $user = $this->postModel->login($data['email'], $data['password']);

            if ($user) {
                //SUCCESS
                $this->createUserSession($user);
            } else {
                $data['password_err'] = 'Incorrect Credentials';
                $this->view('user/login', $data);
            }
        }

        $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
        ];
        $this->view('user/login');
    }

    public function createUserSession($user)
    {
        setSession('user_id', $user->ID);
        setSession('user_email', $user->Email);
        setSession('user_name', $user->Name);
        setSession('user_position', $user->Position);
        redirect('pages/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
