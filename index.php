<?php

include 'layout/header.php';

$data_nama = select("SELECT * FROM nama");

?>

<img src="logo.png" alt="" height="110px">

<div class="container">
    <h1>DATA SAYUR</h1>
    <hr>
    <a href="tambah-data.php" class="btn btn-primary mb-2">Tambah</a>


    <table class="table table-bordered tmt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Sayur</th>
                <th>foto</th>
                <th>opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php $id = 1; ?>
            <?php foreach ($data_nama as $Nama) : ?>
                </tr>
                <td><?= $id++; ?></td>
                <td><?php echo $Nama['Nama']; ?></td>
                <td><?php echo $Nama['Sayur']; ?></td>
                <td><a href="assets/img/<?= $Nama['Foto']; ?>"><img src="assets/img/<?= $Nama['Foto']; ?>" style="width: 200px;"></a></td>
                <td width="50%" class="text-center">
                    <a href="hapus-data.php?id=<?= $Nama['id']; ?>" class="btn btn-danger" onclick="return confirm('Hapus?');">Hapus</a>
                </td>
                <tr>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-warning">Logout</a>
</div>
</body>

</html>