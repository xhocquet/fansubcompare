<?php
$info = file('./record.txt');
for ($i = 0; $i < count($info); $i++) {
$tmp = explode('|', $info[$i]);
$info[$i] = array('display' => $tmp[0], 'group' => $tmp[1], 'filename' => $tmp[2], 'size' => $tmp[3], 'res' => $tmp[4], 'dir' => $tmp[5]);}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../js/dragtable.js"></script>
<script src="../js/hidecolumn2.js?25"></script>
<script src="../js/tracking.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>subcompare</title>
<link href="../css/compare.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

$nogroups=0;
if ($handle = opendir('.')) {
    $blacklist = array('.', '..', 'compare.php','title.jpg','record.txt');
    while (false !== ($group = readdir($handle))) {
        if (!in_array($group, $blacklist)) {
            			$groups[$nogroups]=$group;   
						$nogroups++;
		}
}
closedir($handle);
}

sort($groups);
$sizegroups = sizeof($groups);
$groupnames = str_replace('_',' ',$groups);

$noimages=0;

if ($handle = opendir($groups[0])) {
    $blacklist = array('.', '..');
    while (false !== ($image = readdir($handle))) {
        if (!in_array($image, $blacklist)) {
            			$images[$noimages]=$image;   
						$noimages++;
        }
    }
closedir($handle);
}

sort($images);
$sizeimages = sizeof($images);
$sizeimages = ($sizeimages/2);

echo('<div id="nav"><form id="groups" name="tcol" onsubmit="return false">Show columns:');
for ($p = 0; $p < $sizegroups;)
	{
	echo('<input type="checkbox" name="col' . ($p +1) . '" id="col' . ($p + 1) . '" checked="checked" value="' . $info[$p]['display'] . '"><label for="col' . ($p + 1) . '">' . $info[$p]['display'] . '</label>');
	$p++;
	}
echo('</form><div id="up"><a href="#top"><img src="../up.png" width="28" height="28" /></a></div><div id="home"><a href="../"><img src="../home.png" width="28" height="28" /></a></div></div><a name="#tops"></a>');

echo('<table id="previews" class="draggable"><tr>');

for ($j = 0; $j < $sizegroups;)
	{
	echo('<th class="tcol' . ($j + 1) . '">' . $info[$j]['group'] . '<br />' . $info[$j]['filename'] . '<br />Filesize: ' . $info[$j]['size'] . ' MiB<br />Resolution: ' . $info[$j]['res'] . '</th>');
	$j++;
	}

echo('</tr>');

for ($i = 1; $i < ($sizeimages + 1);)
	{
	echo("<tr>");
		for ($k = 1; $k < $sizegroups+1;)
		{
				$number = $k - 1;
				echo('<td class="tcol' . $k . '"><a href="' . $info[$number]['dir'] . '/' . $i . '.png"><img src="' . $info[$number]['dir'] . '/' . $i . '.jpg" width="640" height="360" /></a></td>');
				$k++;
		}
		echo('<tr/>');
		$i++;
}
echo("</table>");

?>
</body>
</html>
