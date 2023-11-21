<?php
error_reporting(1);
include "Client.php";

if($_POST['aksi'] == 'tambah'){
    $data = array("id_artis"=>$_POST['id_artis'],
                  "nama_artis"=>$_POST['nama_artis'],
                  "genre_lagu"=>$_POST['genre_lagu'], 
                  "production"=>$_POST['production'],
                  "popularitas"=>$_POST['popularitas'],
                  "aksi"=>$_POST['aksi']);
    $artis -> tambah_data($data);
    header('location:index.php?page=daftar-data');              
} else if ($_POST['aksi']=='ubah'){
    $data = array("id_artis"=>$_POST['id_artis'],
                  "nama_artis"=>$_POST['nama_artis'],
                  "genre_lagu"=>$_POST['genre_lagu'], 
                  "production"=>$_POST['production'],
                  "popularitas"=>$_POST['popularitas'],
                  "aksi"=>$_POST['aksi']);
    $artis -> ubah_data($data);
    header('location:index.php?page=daftar-data');               
} else if ($_GET['aksi']=='hapus'){
    $artis->hapus_data($_GET['id_artis']);
    header('location:index.php?page=daftar-data');
}  
unset($artis,$data);
?>
