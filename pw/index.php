<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
    <title>Daftar Buku</title>

</head>

<body>
    <div class="search">
        <div class="container">
            <form action="" method="POST">
                <input type="text" name="keyword" placeholder="Search" autocomplete="off" autofocus id="keyword">
                <input type="submit" name="cari" id="tombol-cari"></button>
            </form>
        </div>
    </div>
    <div class="container ">
        <div class="card mt-5 bg-dark bg-secondary text-light">
            <div class="card-body text-light">
                <h1 class="display-3 text-center fw-bold ">Daftar Jenis Buku</h1>
                <a href="tambah.php">Tambah Data Buku</a>
                <br><br>
                <table class="table table-bordered table-striped table-hover text-center bg-info" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Nama Penerbit</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1;
                    foreach ($buku as $bk) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $bk['nama_buku']; ?></td>
                            <td><?= $bk['penulis']; ?></td>
                            <td><img src=" assets/<?= $bk['gambar'] ?>" width="100">
                            </td>
                            <td>
                                <a href="detail.php?id=<?= $bk['id']; ?>">Lihat detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>