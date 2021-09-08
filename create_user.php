<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
 /* $_POST['pseudo']="hs";
  $_POST['email']="hs@hs";
  $_POST['password']="hs12";*/
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
 
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	//include 'db_connect.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO user(pseudo, email, password) VALUES('$pseudo', '$email', '$password')");
 
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