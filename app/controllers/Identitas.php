<?php 

class identitas extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Identitas';
        $data['identitas'] = $this->model('Identitas_model')->getAllIdentitas();
        $data['pekerjaan'] = $this->model('Pekerjaan_model')->getAllPekerjaan();
        $data['lokasi'] = $this->model('Lokasi_model')->getAllLokasi();
        $this->view('templates/header', $data);
        $this->view('identitas/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Identitas';
        $data['identitas'] = $this->model('Identitas_model')->getIdentitasById($id);

        // Pastikan mengambil data pekerjaan dan lokasi berdasarkan ID dari identitas
        $data['lokasi'] = $this->model('Identitas_model')->getLokasiById($data['identitas']['lokasi']);
        $data['pekerjaan'] = $this->model('Identitas_model')->getPekerjaanById($data['identitas']['pekerjaan']);
        
        $this->view('templates/header', $data);
        $this->view('identitas/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Identitas_model')->tambahDataIdentitas($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Identitas_model')->hapusDataIdentitas($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        }
    }
    
    public function edit($id)
    {
        $data['judul'] = 'Edit Data Identitas';
        $data['identitas'] = $this->model('Identitas_model')->getIdentitasById($id);
        $data['pekerjaan'] = $this->model('Pekerjaan_model')->getAllPekerjaan();
        $data['lokasi'] = $this->model('Lokasi_model')->getAllLokasi();
        $data['identitas_pekerjaan'] = $data['identitas']['pekerjaan'];
        $data['identitas_lokasi'] = $data['identitas']['lokasi'];
        $this->view('templates/header', $data);
        $this->view('identitas/edit', $data);
        $this->view('templates/footer');
    }

    public function ubah()
    {
        if( $this->model('Identitas_model')->ubahDataIdentitas($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/identitas');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Identitas';
        $data['identitas'] = $this->model('Identitas_model')->cariDataIdentitas();
        $data['pekerjaan'] = $this->model('Pekerjaan_model')->getAllPekerjaan();
        $data['lokasi'] = $this->model('Lokasi_model')->getAllLokasi();
        $this->view('templates/header', $data);
        $this->view('identitas/index', $data);
        $this->view('templates/footer');
    }
}
