<?php
require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query buku berdasarkan id
$bk = query("SELECT * FROM buku WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Buku</title>
</head>

<body>
  <h3>Detail Buku</h3>
  <ul>
    <li><img src="assets/<?= $bk['gambar']; ?>"></li>
    <li>Nama Buku : <?= $bk['nama_buku']; ?></li>
    <li>Nama Pengarang : <?= $bk['penulis']; ?></li>
    <li><a href="update.php?id=<?= $bk['id']; ?>">ubah</a> | <a href="delete.php?id=<?= $bk['id']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke daftar buku</a></li>
  </ul>
</body>

</html>