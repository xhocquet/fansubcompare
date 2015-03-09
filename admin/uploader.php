<?php

$name=$_POST["destination"];
$uploaddir = '../' . str_replace(' ','_',$name);
echo($uploaddir);
mkdir($uploaddir,0777);
echo ('created');

$asciifile = fopen($uploaddir . '/record.txt', "w");
fclose($asciifile);

$compare = '../compare.php';
$comparecopy = $uploaddir . '/compare.php';

if (!copy($compare, $comparecopy)) {
    echo "failed to copy $file...\n";
}

$target_path = $uploaddir . '/title.jpg';
echo ($target_path);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>