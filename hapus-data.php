<?php

include 'config/app.php';

//menerima id yg dipilih user
$id = (int)$_GET['id'];

if (delete_data($id) > 0) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}