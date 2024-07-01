<?php 

class Identitas_model {
    private $table = 'identitas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllIdentitas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getIdentitasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataIdentitas($data)
    {
        $query = "INSERT INTO identitas (nama, pekerjaan, lokasi)
        VALUES (:nama, :pekerjaan, :lokasi)";

        $this->db->query($query);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':pekerjaan', $data['pekerjaan']);
        $this->db->bind(':lokasi', $data['lokasi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataIdentitas($id)
    {
        $query = "DELETE FROM identitas WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataIdentitas($data)
    {
        $query = "UPDATE identitas SET
                    nama = :nama,
                    pekerjaan = :pekerjaan,
                    lokasi = :lokasi
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('id', $data['id']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function cariDataIdentitas()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM identitas WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getLokasiById($id) {
        // Example logic to fetch location data from the database
        $query = "SELECT * FROM lokasi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPekerjaanById($id) {
        // Example logic to fetch location data from the database
        $query = "SELECT * FROM pekerjaan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    

    // public function getMataKuliahByNim($nim)
    // {
    //     $this->db->query('
    //         SELECT m.KODE_MATKUL, m.NAMA_MATKUL, m.SKS, n.NILAI 
    //         FROM nilai n 
    //         JOIN matakuliah m ON n.KODE_MATKUL = m.KODE_MATKUL 
    //         WHERE n.NIM = :nim
    //     ');
    //     $this->db->bind('nim', $nim);
    //     return $this->db->resultSet();
    // }
}
