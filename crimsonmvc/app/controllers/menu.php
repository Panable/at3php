<?php
class menu extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('menumodel');
    }

    public function index()
    {
        $menu = $this->postModel->getMenu();
        $data = [
            'title' => 'Menu: ',
            'menu' => $menu
        ];
        $this->view('menu/index', $data);
    }

    public function pickup()
    {
        $menu = $this->postModel->getMenu();
        $data = [
            'title' => 'Online Ordering:',
            'menu' => $menu
        ];
        $this->view('menu/pickup', $data);
    }

    public function admin()
    {
        $menu = $this->postModel->getMenu();
        $data = [
            'title' => 'Menu: ',
            'menu' => $menu
        ];
        $this->view('menu/admin', $data);
    }
}
