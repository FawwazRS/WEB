  href="ubah-data.php?id=<?= $Nama['id']; ?>" class="btn btn-success" type="hidden">Ubah</href=>

  <?php

    include 'layout/header.php';

    //mengambil id dari url
    $id = (int)$_GET['id'];

    $nama = select("SELECT * FROM Nama WHERE id = $id")[0];

    //check tombol ubah
    if (isset($_POST['Ubah'])) {
        if (update_data($_POST) > 0) {
            echo "<script>
    alert('Data Berhasil Diubah');
    document.location.href = 'index.php';
    </script>";
        } else {
            echo "<script>
    alert('Data Gagal Diubah');
    document.location.href = 'index.php';
    </script>";
        }
    }

    ?>

  <img src="logo.png" alt="" height="110px">

  <div class="container">
      <h1>Input Data</h1>
      <hr>

      <form action="" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?= $nama['id']; ?>">

          <div class="mb-3">
              <label for="Nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="Nama" value="<?= $nama['Nama'] ?>" placeholder="masukan nama..." required>
          </div>

          <div class="mb-3">
              <label for="Sayur" class="form-label">Sayur</label>
              <input type="text" class="form-control" id="Sayur" name="Sayur" value="<?= $nama['Sayur'] ?>" placeholder="masukan sayur..." required>
          </div>

          <div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02"> <button class="btn btn-primary">Upload</button>
          </div>

          <button type="submit" name="Ubah" class="btn btn-primary" style="float: right;">Ubah</button>

      </form>
  </div>

  <?php //include 'layout/footer.php';