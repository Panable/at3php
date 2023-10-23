<?php

class model
{
    protected $db;

    public function __construct() {
        $this->db = new database;
    }

}
