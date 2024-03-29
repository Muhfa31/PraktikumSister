<?php
error_reporting(1);

$url = "http://192.168.56.6/musikku/server/server.php";
$artis = new clientArtis($url);
$lagu = new clientLagu($url);
$album = new clientAlbum($url);

class clientArtis{
    private $url;

    public function __construct($url){
        $this->url=$url;
        unset($url);
    }
    public function filter($dataArtis){
        $dataArtis = preg_replace('/[^a-zA-Z0-9]/','',$dataArtis);
        return $dataArtis;
        unset($dataArtis);
    }
    public function tampil_semua_data(){
        $client = curl_init($this->url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $dataArtis = simplexml_load_string($response);
        return $dataArtis;
        unset($dataArtis,$client,$response);
    }
    public function tampil_data($id_artis){
        $id_artis = $this->filter($id_artis);
        $client = curl_init($this->url."?aksi=tampil&id_artis=".$id_artis);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $dataArtis = simplexml_load_string($response);
        return $dataArtis;
        unset($id_artis,$client,$response,$dataArtis);
    }
    public function tambah_data($dataArtis){
        $dataArtis="<musikku>
                <artis>
                  <id_artis>".$dataArtis['id_artis']."</id_artis>
                  <nama_artis>".$dataArtis['nama_artis']."</nama_artis>
                  <genre_lagu>".$dataArtis['genre_lagu']."</genre_lagu>
                  <production>".$dataArtis['production']."</production>
                  <popularitas>".$dataArtis['popularitas']."</popularitas>
                  <aksi>".$dataArtis['aksi']."</aksi>
                </artis>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$dataArtis);
        $response = curl_exec($c);
        curl_close($c);
        unset($dataArtis,$c,$response);       
    }
    public function ubah_data($dataArtis){
        $dataArtis="<musikku>
                <artis>
                  <id_artis>".$dataArtis['id_artis']."</id_artis>
                  <nama_artis>".$dataArtis['nama_artis']."</nama_artis>
                  <genre_lagu>".$dataArtis['genre_lagu']."</genre_lagu>
                  <production>".$dataArtis['production']."</production>
                  <popularitas>".$dataArtis['popularitas']."</popularitas>
                  <aksi>".$dataArtis['aksi']."</aksi>
                </artis>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$dataArtis);
        $response = curl_exec($c);
        curl_close($c);
        unset($dataArtis,$c,$response); 
    }
    public function hapus_data($id_artis){
       $id_artis = $this->filter($id_artis);
       $dataArtis="<musikku>
                <artis>
                  <id_artis>".$id_artis."</id_artis>
                  <aksi>hapus</aksi>
                </artis>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$dataArtis);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_artis,$dataArtis,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }
}

class clientLagu{
    private $url;

    public function __construct($url){
        $this->url=$url;
        unset($url);
    }
    public function filter($data){
        $data = preg_replace('/[^a-zA-Z0-9]/','',$data);
        return $data;
        unset($data);
    }
    public function tampil_semua_data(){
        $client = curl_init($this->url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = simplexml_load_string($response);
        return $data;
        unset($data,$client,$response);
    }
    public function tampil_data($id_lagu){
        $id_lagu = $this->filter($id_lagu);
        $client = curl_init($this->url."?aksi=tampil&id_lagu=".$id_lagu);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = simplexml_load_string($response);
        return $data;
        unset($id_lagu,$client,$response,$data);
    }
    public function tambah_data($data){
        $data="<musikku>
                <lagu>
                  <id_lagu>".$data['id_lagu']."</id_lagu>
                  <id_artis>".$data['id_artis']."</id_artis>
                  <id_album>".$data['id_album']."</id_album>
                  <nama_lagu>".$data['nama_lagu']."</nama_lagu>
                  <tahun_rilis>".$data['tahun_rilis']."</tahun_rilis>
                  <aksi>".$data['aksi']."</aksi>
                </lagu>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);       
    }
    public function ubah_data($data){
        $data="<musikku>
                <lagu>
                  <id_lagu>".$data['id_lagu']."</id_lagu>
                  <id_artis>".$data['id_artis']."</id_artis>
                  <id_album>".$data['id_album']."</id_album>
                  <nama_lagu>".$data['nama_lagu']."</nama_lagu>
                  <tahun_rilis>".$data['tahun_rilis']."</tahun_rilis>
                  <aksi>".$data['aksi']."</aksi>
                </lagu>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response); 
    }
    public function hapus_data($id_lagu){
       $id_lagu = $this->filter($id_lagu);
       $data="<musikku>
                <lagu>
                  <id_lagu>".$id_lagu."</id_lagu>
                  <aksi>hapus</aksi>
                </lagu>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_lagu,$data,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }
}

class clientAlbum{
    private $url;

    public function __construct($url){
        $this->url=$url;
        unset($url);
    }
    public function filter($data){
        $data = preg_replace('/[^a-zA-Z0-9]/','',$data);
        return $data;
        unset($data);
    }
    public function tampil_semua_data(){
        $client = curl_init($this->url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = simplexml_load_string($response);
        return $data;
        unset($data,$client,$response);
    }
    public function tampil_data($id_album){
        $id_album = $this->filter($id_album);
        $client = curl_init($this->url."?aksi=tampil&id_album=".$id_album);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($client);
        curl_close($client);
        $data = simplexml_load_string($response);
        return $data;
        unset($id_album,$client,$response,$data);
    }
    public function tambah_data($data){
        $data="<musikku>
                <album>
                  <id_album>".$data['id_album']."</id_album>
                  <id_artis>".$data['id_artis']."</id_artis>
                  <nama_album>".$data['nama_album']."</nama_album>
                  <tanggal_rilis>".$data['tanggal_rilis']."</tanggal_rilis>
                  <deskripsi>".$data['deskripsi']."</deskripsi>
                  <aksi>".$data['aksi']."</aksi>
                </album>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response);       
    }
    public function ubah_data($data){
        $data="<musikku>
                <album>
                  <id_album>".$data['id_album']."</id_album>
                  <id_artis>".$data['id_artis']."</id_artis>
                  <nama_album>".$data['nama_album']."</nama_album>
                  <tanggal_rilis>".$data['tanggal_rilis']."</tanggal_rilis>
                  <deskripsi>".$data['deskripsi']."</deskripsi>
                  <aksi>".$data['aksi']."</aksi>
                </album>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data,$c,$response); 
    }
    public function hapus_data($id_album){
       $id_album = $this->filter($id_album);
       $data="<musikku>
                <album>
                  <id_album>".$id_album."</id_album>
                  <aksi>hapus</aksi>
                </album>
               </musikku>";
        $c = curl_init();
        curl_setopt($c,CURLOPT_URL,$this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POST,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_album,$data,$c,$response); 
    }
    public function __destruct(){
        unset($this->options,$this->api);
    }
}


?>