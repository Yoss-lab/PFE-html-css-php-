<?php
 require_once __DIR__ . '/db_connect.php';
 
 /* $_POST['idUser']="1234";
  $_POST['nomUser']="yosra";
  $_POST['prenomUser']="hassani";
  $_POST['typeConge']="sans solde";
  $_POST['dateDebut']="22/6/2020";
  $_POST['dateFin']="23/06/2020";*/
  $_POST['statut']="en cours de traitement";
 
 
if (isset($_POST['idUser'])&& isset($_POST['nomUser']) && isset($_POST['prenomUser']) && isset($_POST['typeConge']) && isset($_POST['dateDebut']) && isset($_POST['dateFin']) && isset($_POST['causeConge']) && isset($_POST['statut'])){
	
	$iduser=$_POST['idUser'];
	$nom=$_POST['nomUser'];
	$prenom=$_POST['prenomUser'];
	$typeConge=$_POST['typeConge'];
	$dateDebut=$_POST['dateDebut'];
	$dateFin=$_POST['dateFin'];
	$causeConge=$_POST['causeConge'];
	$statut=$_POST['statut'];
	
	
 
 $query_check_user = "select * from conge where idUser = '$iduser'  and statut='en cours de traitement'  ";
 $result = mysqli_query($conn,$query_check_user);
 
 if(mysqli_num_rows($result)>0){
	 $response['success']=false;
 }else{
	 $query_result = "insert into conge (idUser,nomUser,prenomUser,typeConge,dateDebut,dateFin,causeConge,statut) values('$iduser','$nom','$prenom','$typeConge','$dateDebut','$dateFin','$causeConge','$statut')";
	 
	 if(mysqli_query($conn,$query_result)){
		 	 $response['success']=true;

	 }else{
		 	 $response['success']=false;

	 }
 }
  echo json_encode($response);
}

 ?>