<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
</head>
<body>

<h2>Tambah Karyawan</h2>

<form method="POST">

    NIK <br>
    <input type="text" name="nik"><br><br>

    Nama Karyawan <br>
    <input type="text" name="nama_karyawan"><br><br>

    Divisi <br>
    <input type="text" name="divisi"><br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

</body>
</html>

<?php

if(isset($_POST['simpan'])){

    $nik = $_POST['nik'];
    $nama = $_POST['nama_karyawan'];
    $divisi = $_POST['divisi'];

    mysqli_query($conn,
    "INSERT INTO karyawan
    (nik, nama_karyawan, divisi)

    VALUES
    ('$nik','$nama','$divisi')");

    header("Location:index.php");
}
?>