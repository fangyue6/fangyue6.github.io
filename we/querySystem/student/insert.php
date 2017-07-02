<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}
	else{
	mysql_select_db("test02", $con);

	$sql="INSERT INTO student (stuNumber, name,birth,gender,other) VALUES ('$_POST[stuNumber]','$_POST[name]','$_POST[birth]','$_POST[gender]','$_POST[other]')";

	if (!mysql_query($sql,$con))
  	{
  		die('Error: ' . mysql_error());
  	}
	echo "1 record added";
	mysql_close($con);
	}
?>
