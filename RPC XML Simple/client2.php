<?php
//request dari client ke server
$request = xmlrpc_encode_request("method",array("nim"=>"200605110068","nama"=>"Faza Abdillah"));
$context = stream_context_create(array('http'=>array(
    'method'=>"POST",
    'header'=>"Content-Type:text/xml;charset=UTF-8",
    'content'=>$request
)));

//ambil data dari server
$file = file_get_contents("http://192.168.56.68/rpc-xml-simple/server.php?user=faza&password=faza",false,$context);

//response dari server ke client
$response = xmlrpc_decode($file);
if($response && xmlrpc_is_fault($response)){
    trigger_error("xmlrpc : $response[faultString] ($response[faultCode])");
}
else{
    echo "<pre>";
    print_r($response);
    echo "</pre>";
    echo "---------------------------------------";
    echo "<br/>nim : ".$response['nim'];
    echo "<br/>nama : ".$response['nama'];
}
?>