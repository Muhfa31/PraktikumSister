<?php
error_reporting(1);

class RPCClient{
    private $url;

    public function __construct($url){
        $this->url = $url;
        unset($url);
    }

    function filter($data){
        $data = preg_replace('/[^a-zA-Z0-9_]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data(){
        $context = stream_context_create(array('http' => array(
        'method' => "GET",
        'header' => "Content-Type:text/xml;charset=UTF-8"
    )));
    }
}