<?
require_once '../classes/Membership.php';
$membership = New Membership();

$membership->confirm_Member();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="text" id="destination" name="destination" />
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>