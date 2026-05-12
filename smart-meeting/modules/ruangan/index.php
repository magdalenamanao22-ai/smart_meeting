<?php
include '../koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM ruangan");
?>

<h2>Data Ruangan</h2>

<a href="tambah.php">Tambah Data</a>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama Ruangan</th>
    <th>Kapasitas</th>
    <th>Fasilitas</th>
</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>
    <td><?= $d['id_ruangan']; ?></td>
    <td><?= $d['nama_ruangan']; ?></td>
    <td><?= $d['kapasitas']; ?></td>
    <td><?= $d['fasilitas']; ?></td>
</tr>

<?php } ?>

</table>