
<?php
//test for Sourcetree and github July 27 2018 
$jsonData = array();
$filearr = array();
$filelist = array();  
  $path = "storiesVN"; 
  $dir_handle = @opendir($path) or die("Unable to open $path"); 
    while ($file = readdir($dir_handle)) { 

	if (strpos($file,'txt') !== false)  {
		$story  = str_replace(".txt", "", $file);
	//	echo "<a href=\"$file\">$file</a><br />";
		$filelist["storyname"]=$story;
		array_push($filearr,$filelist);
		
		//echo "$file <br />";
			}

    } 
    closedir($dir_handle); 
	
$jsonData['liststory'] = $filearr;	
$encoded = json_encode($jsonData);
echo $encoded;

mysql_close();
?>