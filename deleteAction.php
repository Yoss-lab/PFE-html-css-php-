<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id_event']))
{
$id=$_GET['id_event'];
$result=mysqli_query($conn,"delete from evenement where id_event='$id'");
if($result)
{
     //echo"act tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllAction.php");
	//exit();
}else{
     //echo"act matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllAction.php");
    //exit();
}
}
?>
</body>
</html>