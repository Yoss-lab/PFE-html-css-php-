<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id_prix']))
{
$id=$_GET['id_prix'];
$result=mysqli_query($conn,"delete from prix where id_prix='$id'");
if($result)
{
     //echo"act tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllPrix.php");
	//exit();
}else{
     //echo"act matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllPrix.php");
    //exit();
}
}
?>
</body>
</html>