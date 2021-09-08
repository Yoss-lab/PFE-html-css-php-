<?php
 
/*
 * Following code will list all the hitoriques
 */
 
 
// include db connect class
require_once __DIR__ . '/db_connect.php';

$sql = "SELECT * from evenement";
$result = $conn->query($sql);
$events=[];
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($events,$row);
  }
}
echo json_encode($events);
$conn->close();

?>