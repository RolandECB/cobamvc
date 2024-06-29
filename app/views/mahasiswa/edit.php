<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3><?= $data['judul']; ?></h3>
            <form action="<?= BASEURL; ?>/mahasiswa/ubah" method="post">
                <input type="hidden" name="id" value="<?= $data['mhs']['id']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['mhs']['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nrp" class="form-label">NRP</label>
                    <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $data['mhs']['nrp']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $data['mhs']['email']; ?>">
                </div>
                <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Pangan">Teknik Pangan</option>
                            <option value="Teknik Planologi">Teknik Planologi</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
