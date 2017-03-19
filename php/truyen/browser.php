<?php
$path = $_REQUEST['path'];

$db = new PDO('mysql:host=localhost;dbname=truyen;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$jsonData = array();
$storyarr = array();
$storybias = array();
if (!ctype_digit($path)) {
		$sql="SELECT * FROM `truyentb` WHERE `language`='$path'";
		foreach($db->query($sql) as $data) {
			$storybias["storyid"]=$data['truyenid'];
			$storybias["storyname"]=$data['truyentitle'];
			$storybias["storyten"]=$data['truyendaude'];
			$storybias["storycontent"]= mb_convert_encoding(substr($data['truyennd'], 0, 60),'HTML-ENTITIES', "UTF-8"); 
			array_push($storyarr,$storybias);
			}
	}else{
		$sql="SELECT * FROM `truyentb` WHERE `truyenid`='$path'";
		foreach($db->query($sql) as $data) {
			$storybias["storyid"]=$data['truyenid'];
			if (strpos($data['language'],'VN') !== false)
			{
			$storybias["storyname"]=mb_convert_encoding($data['truyendaude'],'HTML-ENTITIES', "UTF-8");
			}else{
				$storybias["storyname"]=$data['truyentitle'];
				}
			
			$storybias["storycontent"]= mb_convert_encoding($data['truyennd'],'HTML-ENTITIES', "UTF-8"); 
			array_push($storyarr,$storybias);
		}
	}

//echo iconv( "UTF-8", "UTF-8",  mb_convert_encoding(substr($data['truyennd'], 0, 20),'HTML-ENTITIES', "UTF-8") ). '<br>';

$jsonData['liststory'] = $storyarr;	
$encoded = json_encode($jsonData);
echo $encoded;
?>
