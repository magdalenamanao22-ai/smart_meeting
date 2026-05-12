<?php
// Tentukan path root berdasarkan kedalaman file
$depth = substr_count(str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', realpath($_SERVER['SCRIPT_FILENAME'])), DIRECTORY_SEPARATOR) - 1;
$root = str_repeat('../', $depth);

// Deteksi halaman aktif
$current = basename(dirname($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart-Meeting System</title>
    <link rel="stylesheet" href="<?= $root ?>assets/css/style.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏢</text></svg>">
</head>
<body>

<nav class="navbar">
    <a href="<?= $root ?>index.php" class="navbar-brand">
        <span class="icon">🏢</span>
        <span>Smart-Meeting</span>
    </a>
    <ul class="navbar-nav">
        <li><a href="<?= $root ?>modules/booking/index.php"   class="<?= $current==='booking'  ?'active':'' ?>">📋 Peminjaman</a></li>
        <li><a href="<?= $root ?>modules/ruangan/index.php"   class="<?= $current==='ruangan'  ?'active':'' ?>">🚪 Ruangan</a></li>
        <li><a href="<?= $root ?>modules/karyawan/index.php"  class="<?= $current==='karyawan' ?'active':'' ?>">👤 Karyawan</a></li>
        <li><a href="<?= $root ?>logs.php"                    class="<?= basename($_SERVER['PHP_SELF'])==='logs.php'?'active':'' ?>">📜 Log Aktivitas</a></li>
    </ul>
</nav>