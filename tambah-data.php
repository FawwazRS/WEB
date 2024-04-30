<?php

include 'layout/header.php';

// check tombol tambah ditekan
if (isset($_POST['Tambah'])) {
    if (create_data($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>";
    }
}

?>

<img src="logo.png" alt="" height="110px">

<div class="container mt-5">
    <h1>Input Data</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="Nama" placeholder="masukan nama..." required>
        </div>

        <div class="mb-3">
            <label for="Sayur" class="form-label">Sayur</label>
            <input type="text" class="form-control" id="Sayur" name="Sayur" placeholder="masukan sayur..." required>
        </div>

        <div class="mb-3">
            <label class="input-label" for="foto">Foto</label>
            <input type="file" step="any" class="form-control mb-2" id="gambar" name="file_gambar" placeholder="masukan file Gambar Max 5 MB" required>
        </div>

        <button type="submit" name="Tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>
<?php //include 'layout/footer.php'; 
?>