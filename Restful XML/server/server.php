<?php
error_reporting(1);
header('Content-Type: text/xml; charset=UTF-8');
include "Database.php";
$abc = new Database();

function filter($data){
    $data = preg_replace('/[^a-zA-Z0-9]/', '',$data);
    return $data;
    unset($data);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = file_get_contents("php://input");
    $data = simplexml_load_string($input);
    $aksi = $data->barang->aksi;
    $id_barang = $data->barang->id_barang;
    $nama_barang = $data->barang->nama_barang;
    $stok_barang = $data->barang->stok_barang;
    $harga_satuan = $data->barang->harga_satuan;

    if($aksi == 'tambah'){
        $data2 = array('id_barang' => $id_barang,
                       'nama_barang' => $nama_barang,
                       'stok_barang' => $stok_barang,
                       'harga_satuan' => $harga_satuan);
        $abc->tambah_data($data2);               
    } elseif ($aksi == 'ubah'){
        $data2 = array('id_barang' => $id_barang,
                       'nama_barang' => $nama_barang,
                       'stok_barang' => $stok_barang,
                       'harga_satuan' => $harga_satuan);
        $abc->ubah_data($data2);   
    } elseif ($aksi == 'hapus'){
        $abc->hapus_data($id_barang);
    }
    unset($input,$data,$data2,$id_barang,$nama_barang,$stok_barang,$harga_satuan,$aksi,$abc);
} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(($_GET['aksi'] == 'tampil') and (isset($_GET['id_barang']))){
        $id_barang = filter($_GET['id_barang']);
        $data = $abc->tampil_data($id_barang);
        $xml = "<toko>";
            $xml .= "<barang>";
                $xml .= "<id_barang>".$data['id_barang']."</id_barang>";
                $xml .= "<nama_barang>".$data['nama_barang']."</nama_barang>";
                $xml .= "<stok_barang>".$data['stok_barang']."</stok_barang>";
                $xml .= "<harga_satuan>".$data['harga_satuan']."</harga_satuan>";
            $xml .= "</barang>";
        $xml .= "</toko>";
        echo $xml;
    } else {
        $data = $abc->tampil_semua_data();
        $xml = "<toko>";
        foreach($data as $a){
            $xml .= "<barang>";
            foreach($a as $kolom => $value){
                $xml .= "<$kolom>$value</$kolom>";
            }
            $xml .= "</barang>";
        }
        $xml .= "</toko>";
        echo $xml;
    }
    unset($id_barang,$data,$xml);
}
?>