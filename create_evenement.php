<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
  $_POST['title_event']="title test";
  $_POST['text_event']="test test test test test test test test test test test test test test test ";
  
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['title_event']) && isset($_POST['text_event']) ) {
 
    $title_event = $_POST['title_event'];
    $text_event = $_POST['text_event'];
    
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	//include 'db_connect.php';
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO evenement(title_event, text_event) VALUES('$title_event', '$text_event')");
 
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