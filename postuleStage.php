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
  $_POST['langue']="fr,angl";*/
  $_POST['idUser']="5555";
  $_POST['idStage']="12";
 
 
if (isset($_POST['idStage']) && isset($_POST['idUser'])) {
	
	$idStage=$_POST['idStage'];
	$idUser=$_POST['idUser'];
	
 
 //$query_check_user = "select * from user where id = '$id' ";
 //$result = mysqli_query($conn,$query_check_user);
 
 //if(mysqli_num_rows($result)>0){
	// $response['success']=false;}else{
	 
	 $result = "INSERT INTO postulationstage (idUser,idStage) VALUES('$idUser','$idStage') ";
	 $r1=mysqli_query($conn,$result);
    // check if row inserted or not
    if ($r1 ) {
        // successfully inserted into database
        $response['success'] = true;
       // $response["message"] = "user successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response['success'] = false;
        //$response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response['success'] = false;
    //$response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>