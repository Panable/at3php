<?php
class menumodel extends model
{
    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        if ($this->db->rowCount() > 0)
        {
            return false;
        }
        return $this->db->resultSet();
    }
}
