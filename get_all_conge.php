<?php
 // include db connect class
require_once __DIR__ . '/db_connect.php';
/*
 * Following code will list all the hitoriques
 */
 //$_POST['idUser']="7915";
// $idUser=$_POST['id'];
 
//if (isset($_POST['idUser']){

//$iduser=$_POST['idUser'];

$sql = "select * from conge where idUser = '7915' ";
$result = $conn->query($sql);
$conges=[];
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_unshift($conges,$row);
  }
//}

echo json_encode($conges);
 }
$conn->close();
 
?>