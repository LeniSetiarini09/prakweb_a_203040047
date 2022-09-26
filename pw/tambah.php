<?php
require 'functions.php';

//cek tombol data
if (isset($_POST['tambah'])) {
  if (Tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script> ";
  } else {
    echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Judul Buku :
          <input type="text" name="nama_buku" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Nama Pengarang :
          <input type="text" name="penulis" required>
        </label>
      </li>
      <li>
        Gambar :
        <input type="text" name="gambar" required>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>

  </form>
</body>

</html>