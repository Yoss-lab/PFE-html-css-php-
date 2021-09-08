<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
  $_POST['title_prix']="2020";
  $_POST['subtitle_prix']="test test test test test ";
  $_POST['text_prix']="test test test test test ";
  
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['title_prix']) && isset($_POST['subtitle_prix']) && isset($_POST['text_prix']) ) {
 
    $title_prix = $_POST['title_prix'];
    $subtitle_prix = $_POST['subtitle_prix'];
    $text_prix = $_POST['text_prix'];
    
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	//include 'db_connect.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query($conn,"INSERT INTO prix(title_prix, subtitle_prix, text_prix) VALUES('$title_prix', '$subtitle_prix', '$text_prix')");
 
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