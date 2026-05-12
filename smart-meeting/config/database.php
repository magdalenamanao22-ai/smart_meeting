<?php

$conn = mysqli_connect(
    "127.0.0.1",
    "root",
    "root",
    "db_office_smart"
);

if(!$conn){
    die("Koneksi gagal");
}

echo "Database terhubung!";
?>