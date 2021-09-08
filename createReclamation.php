<?php
 require_once __DIR__ . '/db_connect.php';
 
  $_POST['statut']="non lu ";
 
 
if ( isset($_POST['commentaire']) ) {
	
	$commentaire=$_POST['commentaire'];
	$statut=$_POST['statut'];
	
 
 //$query_check_user = "select * from reclamation where iduser = '$iduser' ";
 //$result = mysqli_query($conn,$query_check_user);
 

	 $query_result = "insert into reclamation (commentaire,statut) values('$commentaire','$statut')";
	 
	 if(mysqli_query($conn,$query_result)){
		 	 $response['success']=true;

	 }else{
		 	 $response['success']=false;

	 }
 
  echo json_encode($response);
}

 ?>