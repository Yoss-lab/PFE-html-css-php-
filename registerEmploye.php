<?php
 require_once __DIR__ . '/db_connect.php';
 
  /*$_POST['pseudo']="samiha";
  $_POST['prenom']="ben fraj";
  $_POST['phone']="20706307";
  $_POST['adresse']="reu bla bla bla";
  $_POST['code_post']="5412";
  $_POST['ville']="sousse";
  $_POST['email']="saaalah@gmail.com";
  $_POST['password']="samiha123";*/
  $_POST['grade']="employe";
 
 
if (isset($_POST['pseudo']) && isset($_POST['prenom']) && isset($_POST['phone']) && isset($_POST['adresse']) && isset($_POST['code_post']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['grade'])) {
	
	$pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $code_post = $_POST['code_post'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$grade=$_POST['grade'];
	
 
 $query_check_user = "select * from user where email = '$email' ";
 $result = mysqli_query($conn,$query_check_user);
 
 
 if(mysqli_num_rows($result)>0){
	 $response['success']=false;
 }else{
	 $query_result = "INSERT INTO user(pseudo,prenom,phone,adresse,code_post,ville, email, password,grade) VALUES('$pseudo','$prenom','$phone','$adresse','$code_post','$ville', '$email', '$password','$grade')";
	 
	 if(mysqli_query($conn,$query_result)){
		 	 //$response['success']=true;
			 header("Location:http://localhost/leoni/afficheAllUser.php");
			 echo"alert('Employé ajouté avec succe')";

	 }else{
		 	 //$response['success']=false;
			 echo"alert('Echec d'ajout ')";

	 }
 }
  echo json_encode($response);
}

 ?>