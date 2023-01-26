<?php 
//koneksi database
require '../config/connection.php';

//menangkap data id yang dikirim dari url
$id_data = $_GET['id_data'];

//menghapus data dari database
mysqli_query($selectdb, "delete from alternatif where id='$id_data'");

//mengalihkan halaman kembali ke index.php
header("location:index.php");
