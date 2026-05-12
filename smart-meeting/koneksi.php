<?php

$conn = mysqli_connect(
    "db",
    "root",
    "root",
    "db_office_smart"
);

if(!$conn){
    die("Koneksi gagal");
}

echo "Database berhasil terhubung";

?>