<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
  $_POST['text_act']="test  gskhdshddnksnd dlsnqdbsqqb ldbshqbd lshqdbld ";
  //$_POST['image_act']="";
  //$_POST['date_act']="";
  
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['text_act'])  ) {
 
    $text_act = $_POST['text_act'];
    //$text_hist = $_POST['text_hist'];
    
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	//include 'db_connect.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO actualite(text_act) VALUES('$text_act')");
 
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