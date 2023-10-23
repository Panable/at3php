<?php

class crud extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('crudmodel');
    }

    public function index()
    {
        echo "hi";
    }
}
