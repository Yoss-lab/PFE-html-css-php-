<?php
 // include db connect class
  
	//include 'db_connect.php';
 require_once __DIR__ . '/db_connect.php';

 if(isset($_POST['email'])){
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	 
	 $sql="select * from user where email='$email' and password='$password' and grade='admin' ";
	 
	 $result=mysqli_query($conn,$sql);
	 
	 if(mysqli_num_rows($result)==1){
		 echo"<br>";
		 echo"You have Successfully Logged in ";
		 //redirection vers autre page 
		  header('Location: acceuil.php');
		 
	 }else{
		 //echo"<br>";
		// header('Location: loginAdmin.html');
		 //window.prompt("You have Entred Incorrect Password ");
		 echo"You have Entred Incorrect Password "	; 
		
	 }
	 
	
 }
 
 ?>