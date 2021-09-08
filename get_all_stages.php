<?php
 
/*
 * Following code will list all the hitoriques
 */
 
 
// include db connect class
require_once __DIR__ . '/db_connect.php';

$sql = "SELECT * from stage ";
$result = $conn->query($sql);

$stages=array();
 //if (
 //$result->num_rows > 0
 //) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
	
	 array_push($stages, 
    array(
        'id_stage'        =>$row['id_stage'], 
        'title_stage'      =>$row['title_stage'], 
        'desc_stage'   =>$row['desc_stage'],
        'annonce_de'     =>$row['annonce_de'])
		
		
       /* 'gender'    =>$row['gender'],
        'birth'     =>date('d M Y', strtotime($row['birth'])),
        'picture'   =>"http://$server_name" . $row['picture'],
        'love'      =>$row['love']) */
		
    );
	
	
	//$response['success']=true;
	
	//$stages['id_stage']=$result['id_stage'];
	//$stages['title_stage']=$row['title_stage'];
	//$stages['desc_stage']=$row['desc_stage'];
	//$stages['annonce_de']=$row['annonce_de'];
	//$stages['image_stage']=$row['image_stage'];
	
	//array_push($stages,$row);

	
	//echo"<br>";
  }
  	echo json_encode($stages);
  
//}


$conn->close();

?>