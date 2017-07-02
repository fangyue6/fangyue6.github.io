<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test02", $con);

$result = mysql_query("SELECT * FROM teacher");

echo "<table border='1'>
<tr>
<th>学号</th>
<th>姓名</th>
<th>生日</th>
<th>性别</th>
<th>其他</th>
<th>操作</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['teaNumber'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['birth'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['other'] . "</td>";
  echo "<td><a href='del.php?teaNumber=".$row['teaNumber']."'>删除</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
