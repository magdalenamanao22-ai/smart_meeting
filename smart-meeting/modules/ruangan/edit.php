<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM ruangan WHERE id_ruangan='$id'");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Ruangan</title>
</head>
<body>

<h2>Edit Ruangan</h2>

<form method="POST">

    Nama Ruangan <br>
    <input type="text"
    name="nama_ruangan"
    value="<?= $d['nama_ruangan']; ?>">
    <br><br>

    Kapasitas <br>
    <input type="number"
    name="kapasitas"
    value="<?= $d['kapasitas']; ?>">
    <br><br>

    Fasilitas <br>
    <textarea name="fasilitas"><?= $d['fasilitas']; ?></textarea>
    <br><br>

    <button type="submit" name="update">
        Update
    </button>

</form>

</body>
</html>

<?php

if(isset($_POST['update'])){

    $nama = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $fasilitas = $_POST['fasilitas'];

    mysqli_query($conn,
    "UPDATE ruangan SET

    nama_ruangan='$nama',
    kapasitas='$kapasitas',
    fasilitas='$fasilitas'

    WHERE id_ruangan='$id'
    ");

    header("Location:index.php");
}
?>