<?
require_once '../classes/Membership.php';
$membership = New Membership();

$membership->confirm_Member();

?>
<?php

if($_POST["create"]){ 
$show=$_POST["show"];
$group=$_POST["group"];
$display=$_POST["display"];
$res=$_POST["res"];
$size=$_POST["size"];
$filename=$_POST["filename"];

$file= '../' . $show . '/record.txt';

$fh = fopen($file, 'a') or die("can't open file");
$stringData = $display . "|" . $group . "|" . $filename . "|" . $size . "|" . $res . "|" . $display . "\r\n";
fwrite($fh, $stringData);
fclose($fh);

$uploaddir = '../' . $show . '/' . $display;
mkdir($uploaddir,0777);
print "created";


}

$nofiles=0;
if ($handle = opendir('..')) {
    $blacklist = array('.', '..', 'classes', 'index.php', 'php_errorlog','css','title2.png','.ftpquota', 'home.png','up.png','.htaccess','about.php','admin','compare.php','js','showlist.php','blog','update.php','archive');
    while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $blacklist)) {
            			$files[$nofiles]=$file;   
						$nofiles++;
        }
    }
closedir($handle);
}
sort($files);
$size = sizeof($files);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<select name="show">
<?php

for ($i = 0; $i < ($size);){
	echo ('<option value="' . $files[$i] . '">' . $files[$i] . '</option>');
	$i++;
}
echo ('</select><br />Display:<input type="text" id="display" name="display"><br /><br />Groupname:<input type="text" id="group" name="group"><br /><br />Filename:<input type="text" id="filename" name="filename"><br /><br />Size:<input type="text" id="size" name="size"><br /><br />Resolution:<input type="text" id="res" name="res"><br /><input type="submit" name="create" value="create"/></form>');
?>
</body>
</html>