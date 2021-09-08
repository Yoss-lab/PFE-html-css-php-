<?php
 require_once __DIR__ . '/db_connect.php';
 
 var_dump($_FILES);
  
  /*$_POST['text_act']="premier test par php";
  $_POST['imageAct']="C:\Users\Asus\Desktop\conception PFE\use case diagram\UseCase admin.JPG";*/
 
 if(!empty($_FILES)){
	 $file_name=$_FILES['image_act']['text_act'];
	 
	 echo 'pub : '.$file_name.'<br/>';
 }
 
/*if ( isset($_POST['text_act']) && isset($_POST['image_act'])) {
	

    $text_act = $_POST['text_act'];
    $image_act = $_POST['image_act'];
  
 

	 $query_result = "INSERT INTO actualite(text_act,image_act) VALUES('$text_act','$image_act')";
	 
	 if(mysqli_query($conn,$query_result)){
		 	 //$response['success']=true;
			 //header("Location:http://localhost/leoni/afficheAllAct.php");
			 echo"publier avec succee";

	 }else{
		 	 //$response['success']=false;
			 echo"Echec d'ajout";

	 }
 
 // echo json_encode($response);
}
*/
 ?>