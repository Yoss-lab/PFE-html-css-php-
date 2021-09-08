<?php
 // include db connect class
    require_once __DIR__ . '/db_connect.php';
	
 
  $_POST['pseudo']="hs";
  $_POST['prenom']="hhsujh";
  $_POST['phone']="55545455";
  $_POST['adresse']="knais,jdhjh";
  $_POST['code_post']="4015";
  $_POST['ville']="sousse";
  $_POST['email']="hs@hs";
  $_POST['password']="hs12";
   $_POST['grade']="employe";
 
// array for JSON response
$response = array();
 
// check for required fields
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
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO user(pseudo,prenom,phone,adresse,code_post,ville, email, password,grade) VALUES('$pseudo','$prenom','$phone','$adresse','$code_post','$ville', '$email', '$password','$grade')");
 
 $response=[];
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response = true;
       // $response["message"] = "user successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response = false;
        //$response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response = false;
    //$response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>