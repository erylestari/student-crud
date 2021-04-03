<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM tb_siswa WHERE id = '".$_GET['id']."'");
    if ($delete) {
        header('location:tampildata.php');
    } else {
        echo 'Hapus data gagal';
    }
