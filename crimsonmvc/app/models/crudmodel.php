<?php
class crudmodel extends model
{
    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }

    public function readTable($table)
    {
        $this->db->query("SELECT * FROM $table");

        $result = '';

        try {
            $result = $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }

        return $this->db->resultSet();
    }

    public function readRow($table, $id)
    {
        try {
            $this->db->query("SELECT * FROM $table WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: " . "No row was found. Row with ID $id may not exist in $table");
            }
            return $this->db->single();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function editRow($table, $data)
    {
        // Generate a list of columns and values to update
        $updateData = [];
        foreach ($data as $column => $value) {
            $updateData[] = "$column = :$column";
        }

        // Construct the SQL query
        $updateColumns = implode(', ', $updateData);
        $sql = "UPDATE $table SET $updateColumns WHERE id = :id";

        try {
            $this->db->query($sql);

            // Bind the ID
            $this->db->bind(':id', $data['id']);

            // Bind other data values
            foreach ($data as $column => $value) {
                $this->db->bind(":$column", $value);
            }

            // Execute the query
            $this->db->execute();

            // Check if any rows were affected (success)
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: No rows were updated.");
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function deleteRow($table, $id)
    {
        try {
            $this->db->query("DELETE FROM $table WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: " . "No rows were deleted. Row with ID $id may not exist in $table");
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
