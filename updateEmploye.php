<?php
require_once __DIR__ . '/db_connect.php';

$_POST['pseudo']="user3";
$_POST['prenom']="user2";
$_POST['phone']="phone123";
$_POST['adresse']="msaken";
$_POST['code_post']="4070";
$_POST['ville']="sousse";
$_POST['password']="pass123";

$_POST['email']="employe@leoni.tn";

	$pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $code_post = $_POST['code_post'];
    $ville = $_POST['ville'];
	$password = $_POST['password'];
	
    $email = $_POST['email'];
	
	
	$update_profile = "UPDATE user SET pseudo = '$pseudo',prenom = '$prenom', phone = '$phone', adresse = '$adresse', code_post = '$code_post', ville = '$ville', password = '$password' WHERE email = '$email'";
	
	if( mysqli_query($conn,$update_profile)){
		 	 $response['success']=true;

	 }else{
		 	 $response['success']=false;

	 }
	 echo json_encode($response);
	
?>