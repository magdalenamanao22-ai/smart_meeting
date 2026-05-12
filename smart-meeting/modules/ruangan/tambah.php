<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Ruangan</title>
</head>
<body>

<h2>Tambah Ruangan</h2>

<form method="POST">

    Nama Ruangan <br>
    <input type="text" name="nama_ruangan"><br><br>

    Kapasitas <br>
    <input type="number" name="kapasitas"><br><br>

    Fasilitas <br>
    <textarea name="fasilitas"></textarea><br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

</body>
</html>

<?php

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $fasilitas = $_POST['fasilitas'];

    mysqli_query($conn,
    "INSERT INTO ruangan
    (nama_ruangan, kapasitas, fasilitas)

    VALUES
    ('$nama','$kapasitas','$fasilitas')");

    header("Location:index.php");
}
?>