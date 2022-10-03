<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_a_203040047_pw');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama_buku = htmlspecialchars($data['nama_buku']);
  $penulis = htmlspecialchars($data['penulis']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              buku
            VALUES
            (null, '$nama_buku', '$penulis', '$gambar');
          ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function update($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $penulis = htmlspecialchars($data['penulis']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE buku SET
              nama_buku = '$nama_buku',
              penulis = '$penulis',
              gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{

  $conn = koneksi();

  $query = "SELECT * FROM buku
    WHERE 
    nama_buku LIKE '%$keyword%' OR
    penulis LIKE '%$keyword%' 
    ";


  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
