<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id_stage']))
{
$id=$_GET['id_stage'];
$result=mysqli_query($conn,"delete from stage where id_stage='$id'");
if($result)
{
     //echo"act tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllStage.php");
	//exit();
}else{
     //echo"act matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllStage.php");
    //exit();
}
}
?>
</body>
</html>