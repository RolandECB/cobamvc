<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Identitas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fe;
        }
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border: none;
            border-radius: 8px;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            border-radius: 4px;
            border-color: #e3e7f3;
        }
        .btn-primary {
            background-color: #3167eb;
            border-color: #3167eb;
            width: 100%;
            padding: 10px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #2459d2;
            border-color: #2459d2;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4"><?= htmlspecialchars($data['judul'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <form action="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas/ubah" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($data['identitas']['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['identitas']['nama'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select class="form-control" id="pekerjaan" name="pekerjaan">
                            <?php foreach ($data['pekerjaan'] as $pekerjaan) : ?>
                                <option value="<?= htmlspecialchars($pekerjaan['id'], ENT_QUOTES, 'UTF-8'); ?>" <?= ($pekerjaan['id'] == $data['identitas_pekerjaan']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($pekerjaan['pekerjaan'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <select class="form-control" id="lokasi" name="lokasi">
                            <?php foreach ($data['lokasi'] as $lokasi) : ?>
                                <option value="<?= htmlspecialchars($lokasi['id'], ENT_QUOTES, 'UTF-8'); ?>" <?= ($lokasi['id'] == $data['identitas_lokasi']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($lokasi['lokasi'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
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
