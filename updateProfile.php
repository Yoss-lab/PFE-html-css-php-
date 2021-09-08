<?php
 require_once __DIR__ . '/db_connect.php';
 /*
  $_POST['iduser']="1234";
  $_POST['nom']="yosra";
  $_POST['prenom']="hassani";
  $_POST['datnaiss']="1997/20/08";
  $_POST['code_post']="4014";
  $_POST['adresse']="knais 340,msaken";
  $_POST['tel2']="785423254";
  $_POST['email']="jdjdsjd@ks.com";
  $_POST['siteWeb']="dk,kd,";
  $_POST['linkedIn']="yosrahas";
  $_POST['education']="licence fonda info";
  $_POST['competence']="java bla bla";
  $_POST['informatique']="la la la";
  $_POST['langue']="fr,angl";
  $_POST['ville']="sousse";
  $_POST['tel']="20706307";*/
 
 
if (isset($_POST['id'])&& isset($_POST['password']) && isset($_POST['pseudo'])&& isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['phone']) ) {
	
	$id=$_POST['id'];
	$pseudo=$_POST['pseudo'];
	$prenom=$_POST['prenom'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
 
 //$query_check_user = "select * from user where id = '$id' ";
 //$result = mysqli_query($conn,$query_check_user);
 
 //if(mysqli_num_rows($result)>0){
	// $response['success']=false;}else{
	 
	 $query_result = "UPDATE user SET pseudo = '$pseudo',prenom = '$prenom', password = '$password',phone = '$phone' WHERE id = '$id'";
	 
	 if(mysqli_query($conn,$query_result)){
		 
				$sql="select * from user where email='$email' and password='$password'  ";
				$result=mysqli_query($conn,$sql);
					if($result){
						
						$row=mysqli_fetch_assoc($result);
						$response['id']=$row['id'];
						$response['email']=$row['email'];
						$response['pseudo']=$row['pseudo'];
						$response['prenom']=$row['prenom'];
						$response['phone']=$row['phone'];
						$response['grade']=$row['grade'];
						$response['password']=$row['password'];
					}
		 	 $response['success']=1;
			 		

	 }else{
		 	 $response['success']=0;

	 }
// }
  echo json_encode($response);
  //echo json_encode($response);
}

 ?>