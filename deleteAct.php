<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id_act']))
{
$id=$_GET['id_act'];
$result=mysqli_query($conn,"delete from actualite where id_act='$id'");
if($result)
{
     //echo"act tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllAct.php");
	//exit();
}else{
     //echo"act matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllAct.php");
    //exit();
}
}
?>
</body>
</html>