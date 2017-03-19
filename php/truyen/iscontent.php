<?php

$path = $_REQUEST['path'];
$path1=str_replace(' ','%20',$path);

$jsonData = array();

$txt = array();  

$str = file_get_contents($path1,'r');

$json = '{"foo-bar": d3331}';

$obj = json_decode($json);
print $obj->{'foo-bar'}; // 12345

//echo $encoded;

/* $jsonData = array();
  
  if ($stream = fopen(str_replace(' ','%20',$path), 'r')) {
    // print all the page starting at the offset 10
	echo stream_get_contents($stream, -1, 10);
	$jsonData['storycontent'] = stream_get_contents($stream, -1, 10);	
	
    fclose($stream);
}

$encoded = json_encode($jsonData);
echo $encoded; */

?>