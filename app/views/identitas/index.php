<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Identitas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .list-group-item {
            border-color: rgba(0, 0, 0, 0.125);
        }
        .btn-primary {
            background-color: #3167eb;
            border-color: #3167eb;
        }
        .btn-primary:hover {
            background-color: #2459d2;
            border-color: #2459d2;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Daftar Identitas</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                    Tambah Data Identitas
                </button>
            </div>
            <div class="card-body">
                <!-- Flash message -->
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong> Data berhasil disimpan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form Pencarian -->
                <form action="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/cari" method="post" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari identitas.." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                        </div>
                    </div>
                </form>

                <!-- Daftar identitas -->
                <ul class="list-group">
                    <?php foreach ($data['identitas'] as $identitas) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($identitas['nama'], ENT_QUOTES, 'UTF-8'); ?>
                            <div>
                                <a href="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/hapus/<?= htmlspecialchars($identitas['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger mr-1" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                                <a href="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/edit/<?= htmlspecialchars($identitas['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning mr-1">Ubah</a>
                                <a href="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/detail/<?= htmlspecialchars($identitas['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-info">Detail</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tambah identitas Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Identitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/tambah" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="lokasi" required>
                                <?php foreach ($data['lokasi'] as $lokasi) : ?>
                                    <option value="<?= htmlspecialchars($lokasi['id'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($lokasi['lokasi'], ENT_QUOTES, 'UTF-8'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                <?php foreach ($data['pekerjaan'] as $pekerjaan) : ?>
                                    <option value="<?= htmlspecialchars($pekerjaan['id'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($pekerjaan['pekerjaan'], ENT_QUOTES, 'UTF-8'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
