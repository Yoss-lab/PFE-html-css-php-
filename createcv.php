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
 
 
if (isset($_POST['id'])&& isset($_POST['pseudo']) && isset($_POST['prenom']) && isset($_POST['datnaiss']) && isset($_POST['phone']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['code_post']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['siteWeb']) &&  isset($_POST['linkedIn']) && isset($_POST['education']) && isset($_POST['competence']) && isset($_POST['informatique'])&& isset($_POST['langue']) ) {
	
	$id=$_POST['id'];
	$pseudo=$_POST['pseudo'];
	$prenom=$_POST['prenom'];
	$datnaiss=$_POST['datnaiss'];
	$ville=$_POST['ville'];
	$code_post=$_POST['code_post'];
	$adresse=$_POST['adresse'];
	$phone=$_POST['phone'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$siteWeb=$_POST['siteWeb'];
	$linkedIn=$_POST['linkedIn'];
	$education=$_POST['education'];
	$competence=$_POST['competence'];
	$informatique=$_POST['informatique'];
	$langue=$_POST['langue'];
	
 
 //$query_check_user = "select * from user where id = '$id' ";
 //$result = mysqli_query($conn,$query_check_user);
 
 //if(mysqli_num_rows($result)>0){
	// $response['success']=false;}else{
	 
	 $query_result = "UPDATE user SET pseudo = '$pseudo',prenom = '$prenom',datnaiss = '$datnaiss' ,ville = '$ville',code_post = '$code_post',adresse = '$adresse',phone = '$phone',tel = '$tel',email = '$email',siteWeb = '$siteWeb',linkedIn = '$linkedIn',education = '$education',competence = '$competence',informatique = '$informatique',langue = '$langue'  WHERE id = '$id'";
	 
	 if(mysqli_query($conn,$query_result)){
		 
		 $sql="select * from user where email='$email'   ";
				$result=mysqli_query($conn,$sql);
					if($result){
						
						$row=mysqli_fetch_assoc($result);
						$response['id']=$row['id'];
						$response['pseudo']=$row['pseudo'];
						$response['prenom']=$row['prenom'];
						$response['email']=$row['email'];
						$response['phone']=$row['phone'];
						$response['tel']=$row['tel'];
						$response['grade']=$row['grade'];
						$response['ville']=$row['ville'];
						$response['datnaiss']=$row['datnaiss'];
						$response['code_post']=$row['code_post'];
						$response['adresse']=$row['adresse'];
						$response['siteWeb']=$row['siteWeb'];
						$response['linkedIn']=$row['linkedIn'];
						$response['education']=$row['education'];
						$response['competence']=$row['competence'];
						$response['informatique']=$row['informatique'];
						$response['langue']=$row['langue'];
						$response['password']=$row['password'];
						$response['adresse']=$row['adresse'];
					}
		 	 $response['success']=1;

	 }else{
		 	 $response['success']=0;

	 }
// }
  echo json_encode($response);
}

 ?>