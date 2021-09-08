<?php
 require_once __DIR__ . '/db_connect.php';
 
 /* $_POST['pseudo']="samiha";
  $_POST['phone']="20706307";
  $_POST['email']="saaalah@gmail.com";
  $_POST['password']="samiha123";*/
  $_POST['grade']="visitor";
 
 
if (isset($_POST['pseudo']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['grade']) ) {
	
	$pseudo=$_POST['pseudo'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$grade=$_POST['grade'];
	
 
 $query_check_user = "select * from user where email = '$email' ";
 $result = mysqli_query($conn,$query_check_user);
 
 if(mysqli_num_rows($result)>0){
	 $response['success']=0;
 }else{
	 $query_result = "insert into user (pseudo,phone,email,password,grade) values('$pseudo','$phone','$email','$password','$grade')";
	 
	 if(mysqli_query($conn,$query_result)){
		 	 $response['success']=1;

	 }else{
		 	 $response['success']=0;

	 }
 }
  echo json_encode($response);
}

 ?>