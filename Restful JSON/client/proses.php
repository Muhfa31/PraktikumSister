<?php
error_reporting(1);
include "Client.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("id_barang"=>$_POST['id_barang'],
                  "nama_barang"=>$_POST['nama_barang'],
                  "stok_barang"=>$_POST['stok_barang'], 
                  "harga_satuan"=>$_POST['harga_satuan'],
                  "aksi"=>$_POST['aksi']);
    $abc -> tambah_data($data);
    header('location:index.php?page=daftar-data');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("id_barang"=>$_POST['id_barang'],
                  "nama_barang"=>$_POST['nama_barang'],
                  "stok_barang"=>$_POST['stok_barang'], 
                  "harga_satuan"=>$_POST['harga_satuan'],
                  "aksi"=>$_POST['aksi']);
    $abc -> ubah_data($data);
    header('location:index.php?page=daftar-data');               
} else if ($_GET['aksi']=='hapus'){
    $data = array("id_barang"=>$_GET['id_barang'],
                  "aksi"=>$_GET['aksi']);
    $abc -> hapus_data($data);         
    header('location:index.php?page=daftar-data');
}  
unset($abc,$data);
?>
