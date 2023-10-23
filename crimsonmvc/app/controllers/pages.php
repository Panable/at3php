<?php
class pages extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('menumodel');
    }

    public function index()
    {
        $posts = $this->postModel->getMenu();
        $data = [
            'title' => 'Welcome',
            'menu' => $posts
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    //temporary function to access login page
    public function login()
    {
        $data = ['title' => 'Login'];
        $this->view('pages/login', $data);
    }
}
