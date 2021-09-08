<?php
 require_once __DIR__ . '/db_connect.php';
 
if (isset($_POST['idUser'])){
	$id=$_POST['idUser'];
	
$sql="select * from conge where idUser='$id'";
$result = $conn->query($sql);

$conges=[];
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_unshift($conges,$row);

  }
  
 echo json_encode($conges); 
 }


}
//mysqli_close($conn);
?>