<?php

require_once __DIR__ . '/../core/Database.php';

class Pekerjaan_model extends Database
{
    protected $table = 'pekerjaan';
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPekerjaan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPekerjaanById($id)
    {
        $id = intval($id);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addPekerjaan($data)
    {
        $query = "INSERT INTO " . $this->table . " (pekerjaan) VALUES (:pekerjaan)";
        $this->db->query($query);
        $this->db->bind(':pekerjaan', $data['pekerjaan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePekerjaan($data)
    {
        $query = "UPDATE " . $this->table . " SET pekerjaan = :pekerjaan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':pekerjaan', $data['pekerjaan']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePekerjaan($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}