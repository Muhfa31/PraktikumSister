<?php
error_reporting(1); // error ditampilkan
class Client
{
    private $options,$api;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct($uri,$location)
    {
        $this->options = array('location' => $location,'uri' => $uri);

        // buat objek baru dari classs SOAP Client
        $this->api = new SoapClient(NULL, $this->options);

        // menghapus variabel dari memory
        unset($uri,$location);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data()
    {
        $data = $this->api->tampil_semua_data();
        return $data;
        unset($data);
    }

    public function tampil_data($id_barang)
    {
        $id_barang = $this->filter($id_barang);
        $data = $this->api->tampil_data($id_barang);
        return $data;
        unset($id_barang,$data);
    }

    public function tambah_data($data)
    {
        $this->api->tambah_data($data);
        unset($data);
    }

    public function ubah_data($data)
    {
        $this->api->ubah_data($data);
        unset($data);
    }

    public function hapus_data($id_barang)
    {
        $this->api->hapus_data($id_barang);
        unset($id_barang);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    {
        unset($this->option,$this->api);
    }
}

// uri dan location server
$uri = 'http://192.168.56.6';
$location = $uri.'/soap-toko/soap-server/server.php';
// buat objek baru dari class Client
$abc = new Client($uri,$location);
?>