
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $this->renderSection('title') ?></title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f7f5;
        }

        header {
            background: #198754;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }

        main {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #198754;
            color: white;
        }
    </style>
</head>
<body>

    <header>
        <h2>Aplikasi Data Siswa</h2>
        <p>Project Jobsheet 4 - CodeIgniter 4</p>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->renderSection('scripts') ?>

</body>
</html>
