<?php

function select($query)
{
    // panggil koneksi db
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data
function create_data($post)
{
    global $db;

    if (isset($_POST)) {
        $Nama = $post['Nama'];
        $Sayur = $post['Sayur'];
        $file = upload_file();
        if (!$file) {
            return false;
        }
        $query = "INSERT INTO nama VALUES(null,'$Nama', '$Sayur', '$file')";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    // query tambah data
}

// fungsi mengubah data
function update_data($post)
{
    global $db;

    $id = $post['id'];
    $Nama = $post['Nama'];
    $Sayur = $post['Sayur'];

    //querry ubah data
    $query = "UPDATE nama SET Nama = '$Nama', Sayur = '$Sayur' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data
function delete_data($id)
{
    global $db;

    //query hapus data
    $query = "DELETE FROM nama WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengupload foto
function upload_file()
{
    $namaFile   = $_FILES['file_gambar']['name'];
    $ukuranFile = $_FILES['file_gambar']['size'];
    $error      = $_FILES['file_gambar']['error'];
    $tmpName    = $_FILES['file_gambar']['tmp_name'];

    //check file yang di upload
    $extensiFileValid = ['jpg', 'jpeg', 'png'];
    $extensiFile      = explode('.', $namaFile);
    $extensiFile      = strtolower(end($extensiFile));

    //check format file
    if (!in_array($extensiFile, $extensiFileValid)) {
        echo "<script>
        alert('format file tidak valid');
        document.location.href = 'tambah_data_buah.php';
      </script>";
        die();
    }

    //check ukuran file 5 MB
    if ($ukuranFile > 5120000) {
        echo "<script>
        alert('ukuran file lebih dari 5 MB');
        document.location.href = 'tambah_data_buah.php';
      </script>";
        die();
    }

    //generate nama file baru 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiFile;

    // pindah ke folder local 
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}
