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
<a href="addshow.php">Add Show</a><br />
<a href="addgroup.php">Add Group</a>

<br /><br /><br /><br />
<a href="login.php?status=loggedout">Log Out</a>
</body>
</html>