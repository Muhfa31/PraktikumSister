<?php
error_reporting(1);
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soap toko</title>
</head>

<body>
    <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
    <br><br>

    <fieldset>
        <?php if ($_GET['page'] == 'tambah') { ?>
            <legend>Tambah Data</legend>
            <form name="form" method="POST" action="proses.php">
                <input type="hidden" name="aksi" value="tambah" />

                <label>ID Barang</label>
                <input type="text" name="id_barang" />
                <br>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" />
                <br>
                <label>Stok Barang</label>
                <input type="text" name="stok_barang" />
                <br>
                <label>Harga Barang</label>
                <input type="text" name="harga_satuan" />
                <br>
                <button type="submit" name="simpan">Simpan</button>
            </form>

        <?php } else if ($_GET['page'] == 'ubah') {
            $r = $abc->tampil_data($_GET['id_barang']);
        ?>
            <legend>Ubah Data</legend>
            <form name="form" method="POST" action="proses.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="id_barang" value="<?= $r['id_barang'] ?>" />
                <label>ID Barang</label>
                <input type="text" name="id_barang" value="<?= $r['id_barang'] ?>" />
                <br>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= $r['nama_barang'] ?>" />
                <br>
                <label>Stok Barang</label>
                <input type="text" name="stok_barang" value="<?= $r['stok_barang'] ?>" />
                <br>
                <label>Harga Barang</label>
                <input type="text" name="harga_barang" value="<?= $r['harga_satuan'] ?>" />
                <br>
                <button type="submit" name="ubah">Ubah</button>

            <?php unset($r);
        } else if ($_GET['page'] == 'daftar-data') { ?>

                <legend>Daftar Data Server</legend>
                <table border="1">
                    <tr>
                        <th width='5%'>No</th>
                        <th width='10%'>ID Barang</th>
                        <th width='75%'>Nama</th>
                        <th width='10%'>Stok Barang</th>
                        <th width='10%'>Harga Barang</th>
                        <th width='5%' colspan="2">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    $data_array = $abc->tampil_semua_data();
                    foreach ($data_array as $r) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $r['id_barang'] ?></td>
                            <td><?= $r['nama_barang'] ?></td>
                            <td><?= $r['stok_barang'] ?></td>
                            <td><?= $r['harga_satuan'] ?></td>
                            <td>
                                <a href="?page=ubah&id_barang=<?= $r['id_barang'] ?>">Ubah</a> |
                                <a href="proses.php?aksi=hapus&id_barang=<?= $r['id_barang'] ?>" onclick="return confirm ('Apakah ANda Ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    }
                    unset($data_array, $r, $no);
                    ?>
                </table>
            <?php } else { ?>
                <legend>Home</legend>
                Aplikasi Sederhana ini menggunakan web service SOAP 
    </fieldset>
<?php } ?>
</body>

</html>