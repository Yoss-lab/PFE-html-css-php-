<?php
ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id_emploi']))
{
$id=$_GET['id_emploi'];
$result=mysqli_query($conn,"delete from emplois where id_emploi='$id'");
if($result)
{
     //echo"act tfasa5 ";
	header("Location:http://localhost/leoni/afficheAllEmploi.php");
	//exit();
}else{
     //echo"act matfasa5ech ";
    header("Location:http://localhost/leoni/afficheAllEmploi.php");
    //exit();
}
}
?>
</body>
</html>