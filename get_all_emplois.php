<?php
 
/*
 * Following code will list all the hitoriques
 */
 
 
// include db connect class
require_once __DIR__ . '/db_connect.php';

$sql = "SELECT * from emplois";
$result = $conn->query($sql);
$emplois=[];
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($emplois,$row);
  }
}
echo json_encode($emplois);
$conn->close();

?>