<?php

if(!($sock = socket_create(AF_INET,SOCK_STREAM,0))){
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
echo "Socket created \n-------------------\n";

$address = gethostbyname('www.google.com');
// address = '127.0.0.1';

if(!socket_connect($sock,$address,80)){
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Could not connect: [$errorcode] $errormsg \n");
}
echo "Connection established \n----------------------\n";

$message = "GET / HTTP/1.1\r\n\r\n";
if(!socket_send($sock,$message,strlen($message),0)){
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Could not send data: [$errorcode] $errormsg \n");
}
echo "Message send succesfully \n----------------------\n";

if(!socket_recv($sock,$buf,2045,MSG_WAITALL) === FALSE){
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Could not receive data: [$errorcode] $errormsg \n");
}
echo $buf."\n----------------------\n";

socket_close($sock);
?>