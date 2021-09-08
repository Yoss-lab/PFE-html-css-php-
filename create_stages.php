<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
  $_POST['title_stage']="title test";
  $_POST['desc_stage']="test test stages ";
  $_POST['annonce_de']="LEONI";
  
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['title_stage']) && isset($_POST['desc_stage']) && isset($_POST['annonce_de']) ) {
 
    $title_stage = $_POST['title_stage'];
    $desc_stage = $_POST['desc_stage'];
    $annonce_de = $_POST['annonce_de'];
    
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	//include 'db_connect.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO stage(title_stage, desc_stage,annonce_de) VALUES('$title_stage', '$desc_stage', '$annonce_de')");
 
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