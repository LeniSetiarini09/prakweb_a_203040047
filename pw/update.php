<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query buku berdasarkan id
$bk = query("SELECT * FROM buku WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['update'])) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Buku</title>
</head>

<body>
  <h3>Form Ubah Data Buku</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $bk['id']; ?>">
    <ul>
      <li>
        <label>
          Nama Buku:
          <input type="text" name="nama_buku" autofocus required value="<?= $bk['nama_buku']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nama Pengarang :
          <input type="text" name=" penulis" required value="<?= $bk['penulis']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $bk['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="update">Ubah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>