<?php
class crudmodel extends model
{
    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }
}
