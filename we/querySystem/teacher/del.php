<?php
$teaNumber=$_GET['teaNumber'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test02", $con);

mysql_query("DELETE FROM teacher WHERE teaNumber='$teaNumber'");
echo "1 record deleted";
mysql_close($con);
?>
<a href="query.php">显示全部</a>
