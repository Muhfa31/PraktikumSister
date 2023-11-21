<?php
error_reporting(1);//erorditampilkan
include "Database.php";

$uri = 'http://192.168.56.6';

//set url server
$options = array ('uri' => $uri);

//buat objek baru dari class soap server
$server = new SoapServer(NULL,$options);

//masukkan class Database ke objek SOAP server
$server->setClass('Database');

//jalankan SOAP server
$server->handle();
?>