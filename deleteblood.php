<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($conn,"delete from user where id='$id'");
if($query1)
{
     //echo"user tfasa5 ";
	header("Location:http://localhost/leoni/blood.php");
	//exit();
}else{
     //echo"user matfasa5ech ";
    header("Location:http://localhost/leoni/blood.php");
   // exit();
}
}
?>
</body>
</html>