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
$result=mysqli_query($conn,"delete from user where id='$id'");
if($result)
{
     //echo"user tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllUser.php");
	//exit();
}else{
     //echo"user matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllUser.php");
    //exit();
}
}
?>
</body>
</html>