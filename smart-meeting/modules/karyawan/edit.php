<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM karyawan WHERE id_karyawan='$id'");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
</head>
<body>

<h2>Edit Karyawan</h2>

<form method="POST">

    NIK <br>
    <input type="text"
    name="nik"
    value="<?= $d['nik']; ?>">
    <br><br>

    Nama Karyawan <br>
    <input type="text"
    name="nama_karyawan"
    value="<?= $d['nama_karyawan']; ?>">
    <br><br>

    Divisi <br>
    <input type="text"
    name="divisi"
    value="<?= $d['divisi']; ?>">
    <br><br>

    <button type="submit" name="update">
        Update
    </button>

</form>

</body>
</html>

<?php

if(isset($_POST['update'])){

    $nik = $_POST['nik'];
    $nama = $_POST['nama_karyawan'];
    $divisi = $_POST['divisi'];

    mysqli_query($conn,
    "UPDATE karyawan SET

    nik='$nik',
    nama_karyawan='$nama',
    divisi='$divisi'

    WHERE id_karyawan='$id'
    ");

    header("Location:index.php");
}
?>