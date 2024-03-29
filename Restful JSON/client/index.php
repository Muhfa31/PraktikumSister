<?php
include "Client.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
    <br/><br/>

    <fieldset>
        <?php if ($_GET['page']=='tambah') { ?>
            <legend>Tambah Data</legend>
            <form name="form" method="POST" action="proses.php">
                <input type="hidden" name="aksi" value="tambah"/>
                <label>ID Barang</label>
                <input type="text" name="id_barang"/>
                <br/>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang"/>
                <br/>
                <label>Stok Barang</label>
                <input type="text" name="stok_barang"/>
                <br/>
                <label>Harga Satuan</label>
                <input type="text" name="harga_satuan"/>
                <br/>
                <button type="submit" name="simpan">Simpan</button>
            </form>

            <?php } elseif ($_GET['page']=='ubah'){
                $r = $abc->tampil_data($_GET['id_barang']);
                ?>
            <legend>Ubah Data</legend>
            <form name="form" method="post" action="proses.php">
                <input type="hidden" name="aksi" value="ubah"/>
                <input type="hidden" name="id_barang" value="<?=$r->id_barang?>"/>
                <label>ID Barang</label>
                <input type="text" value="<?=$r->id_barang?>" disabled>
                <br/>
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="<?=$r->nama_barang?>">
                <br/>
                <label>Stok Barang</label>
                <input type="text" name="stok_barang" value="<?=$r->stok_barang?>">
                <br/>
                <label>Harga Satuan</label>
                <input type="text" name="harga_satuan" value="<?=$r->harga_satuan?>">
                <br/>
                <button type="submit" name="ubah">Ubah</button>
            </form>

            <?php unset($r);
            } else if ($_GET['page']=='daftar-data') {
            ?>
            <legend>Daftar Data Server</legend>
            <table border="1">
                <tr><th Width='5%'>No</th>
                <th Width='10%'>ID Barang</th>
                <th Width='25%'>Nama</th>
                <th Width='25%'>Stok</th>
                <th Width='25%'>Harga</th>
                <th Width='5%' colspan="2">Aksi</th>
            </tr>
            <?php $no = 1;
               $data_array = $abc->tampil_semua_data();
               foreach ($data_array as $r){
                ?> <tr><td><?=$no?></td>
                    <td><?=$r->id_barang?></td>
                    <td><?=$r->nama_barang?></td>
                    <td><?=$r->stok_barang?></td>
                    <td><?=$r->harga_satuan?></td>
                    <td><a href="?page=ubah&id_barang=<?=$r->id_barang?>">Ubah</a></td>
                    <td><a href="proses.php?aksi=hapus&id_barang=<?=$r->id_barang?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Hapus</a></td>
                </tr>
                <?php $no++;
                    }
                    unset($data_array,$r,$no);
                    ?>
            </table>
            
            <?php } else { ?>
                <legend>Home</legend>
                    Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (Javascript Object Notation).
    </fieldset>
    <?php } ?>
</body>
</html>