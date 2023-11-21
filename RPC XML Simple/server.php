<?php
header("Content-Type:text/xml;charset=UTF-8");

// request dari Client ke Server
if (($_SERVER['REQUEST_METHOD']=='POST') and ($_GET['user']=='ajib') and ($_GET['password']=='hanani'))
{	$input = file_get_contents("php://input");
	$data = xmlrpc_decode($input);		
} else
{	$data = array("one"=>"satu","two"=>"dua","three"=>"tiga");
	//$data = array("one","two","three");
}

// response dari Server ke Client
$response = xmlrpc_encode($data);
echo ($response);	
?>