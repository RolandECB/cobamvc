<?php

require_once __DIR__ . '/../core/Database.php';

class Lokasi_model extends Database
{
    protected $table = 'lokasi';
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllLokasi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getLokasiById($id)
    {
        $id = intval($id);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addLokasi($data)
    {
        $query = "INSERT INTO " . $this->table . " (lokasi) VALUES (:lokasi)";
        $this->db->query($query);
        $this->db->bind(':lokasi', $data['lokasi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateLokasi($data)
    {
        $query = "UPDATE " . $this->table . " SET lokasi = :lokasi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':lokasi', $data['lokasi']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteLokasi($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}