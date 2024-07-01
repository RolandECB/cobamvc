<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['judul'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
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
                <h1 class="card-title">Detail Identitas</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td><?= htmlspecialchars($data['identitas']['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Lokasi</strong></td>
                            <td><?= htmlspecialchars($data['lokasi']['lokasi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan</strong></td>
                            <td><?= htmlspecialchars($data['pekerjaan']['pekerjaan'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/identitas" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <script src="<?= htmlspecialchars(BASEURL, ENT_QUOTES, 'UTF-8'); ?>/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
