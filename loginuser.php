<?php
 require_once __DIR__ . '/db_connect.php';

  
  /*$_POST['email']="employe45@leoni.tn";
  $_POST['password']="faycel123";*/
 
if (isset($_POST['email']) && isset($_POST['password'])) {
	
$email=$_POST['email'];
$password=$_POST['password'];

$sql="select * from user where email='$email' and password='$password' and grade='visitor' ";
$result=mysqli_query($conn,$sql);

$sql2="select * from user where email='$email' and password='$password' and grade='employe' ";
$result2=mysqli_query($conn,$sql2);


	
if(mysqli_num_rows($result)>0){
	
	$row=mysqli_fetch_assoc($result);
	
	$response['success']=1;//true
	
	$response['id']=$row['id'];
	$response['email']=$row['email'];
	$response['pseudo']=$row['pseudo'];
	$response['prenom']=$row['prenom'];
	$response['phone']=$row['phone'];
	$response['grade']=$row['grade'];
	$response['password']=$row['password'];
	
}else if(mysqli_num_rows($result2)==1){
	
	$row=mysqli_fetch_assoc($result2);
	
	$response['success']=2;//true
	
	$response['id']=$row['id'];
	$response['email']=$row['email'];
	$response['pseudo']=$row['pseudo'];
	$response['prenom']=$row['prenom'];
	$response['phone']=$row['phone'];
	$response['grade']=$row['grade'];
	$response['password']=$row['password'];
	
}else{
	$response['success']=0;//false
}

 echo json_encode($response);


}
//mysqli_close($conn);
?>