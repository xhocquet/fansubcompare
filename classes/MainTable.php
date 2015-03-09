<?php
$nofiles=0;
if ($handle = opendir('.')) {
    $blacklist = array('.', '..','.ftpquota', 'classes', 'js', 'login.php', 'admin', 'css','title2.png', 'home.png','up.png','.htaccess','addgroup.php', 'index.php','compare.php','blog','update.php','Blog','update.php','showlist.php', 'about.php','archive','error_log');
    while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $blacklist)) {
            			$files[$nofiles]=$file;   
						$nofiles++;
        }
    }

}
sort($files);
$size = sizeof($files);
$titles = str_replace('_',' ',$files);
echo('<table id="icons"><tr><th id="linkbox" colspan="3">Winter 2013</th></tr>');
for ($i = 0; $i < ($size);)
	{
	echo("<tr>");
		for ($k = 0; $k < 3;)
		{
			if (isset($files[$i]))
			{
				$nofiles2 = 0;
				unset($files2);
				if ($handle2 = opendir($files[$i])) 
				{
					$blacklist = array('.', '..', 'compare.php', 'title.jpg','record.txt');
					while (false !== ($file2 = readdir($handle2))) {
					if (!in_array($file2, $blacklist)) {
            		$files2[$nofiles2]=$file2;   
					$nofiles2++;
					}
    				}
					
				}
				$size2 = sizeof($files2);
				
				
				if ($size2 > 1)
				{
					echo('<td id="icons"><a href="' . $files[$i] . '">' . '<img src="' . $files[$i] . '/title.jpg" /></a></td>');
					$i++;
					$k++;
				}
				else
				{
					echo('<td id="icons">' . '<img src="' . $files[$i] . '/title.jpg" class="inactive" /></td>');
					$i++;
					$k++;
				}
			}
			else
			{
				echo('<td id="icons"></td>');
				$i++;
				$k++;
			}
		}
	echo("</tr><tr>");
	$i = $i - 3;
		for ($k = 0; $k < 3;)
		{
			if (isset($files[$i]))
			{
				$nofiles2 = 0;
				unset($files2);
				if ($handle2 = opendir($files[$i])) 
				{
					$blacklist = array('.', '..', 'compare.php', 'title.jpg','record.txt');
					while (false !== ($file2 = readdir($handle2))) 
					{
						if (!in_array($file2, $blacklist)) 
						{
							$files2[$nofiles2]=$file2;   
							$nofiles2++;
						}
    				}
				}
				
				$size2 = sizeof($files2);
				if ($size2 > 0)
				{
					$name = ucwords($titles[$i]);
					// Check name length
					if ((strlen($name)) > 25)
					{
						echo('<td id="linkbox"><a href="' . $files[$i] . '">' . substr($name, 0, 22) . '...</a></td>');
						$i++;
						$k++;
					}
					else
					{
						echo('<td id="linkbox"><a href="' . $files[$i] . '">' . $name . '</a></td>');
						$i++;
						$k++;
					}
				}
				else
				{
					$name = ucwords($titles[$i]);
					if ((strlen($name)) > 25)
					{
						echo('<td id="linkbox">' . substr($name, 0, 22) . '...</td>');
						$i++;
						$k++;
					}
					else
					{
						echo('<td id="linkbox">' . $name . '</td>');
						$i++;
						$k++;
					}
				}
			}
			else
			{
				echo('<td id="linkbox"></td>');
				$i++;
				$k++;
			}
		}
}
echo("</table>");
?>