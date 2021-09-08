<?php
  ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v10 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v10">
	<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phone=$_POST['phone'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['bloodgroup'];
$occupation=$_POST['occupation'];
$qualification=$_POST['qualification'];
$address=$_POST['address'];
$city=$_POST['city'];

$query3=mysql_query("update register set firstname='$firstname', lastname='$lastname' , phone='$phone' , age='$age' , gender='$gender', bloodgroup='$bloodgroup', gender='$gender', occupation='$occupation', qualification='$qualification' , address='$address', city='$city' where register_id='$id'");
if($query3)
{
  
	header("Location:http://localhost/dash/blood.php");
     ob_end_flush();
    die();

}
}
$query1=mysql_query("select * from register where register_id='$id'");
$query2=mysql_fetch_array($query1);
?>
<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        
    </div>
    <div>
 <form method="post" action="" enctype="multipart/form-data">
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="First Name" name="firstname" value="<?php echo $query2['firstname']; ?>">
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Last Name" name="lastname" value="<?php echo $query2['lastname']; ?>">
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Phone Number" name="phone" value="<?php echo $query2['phone']; ?>">
        </div>
        
        <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Age" name="age" value="<?php echo $query2['age']; ?>">
        </div>
        
        
             
            <div class="uk-margin">
            Gender<select class="uk-select" name="gender" value="<?php echo $query2['gender']; ?>">
                <option selected>Male</option>
                <option>Female</option>
            </select>
        </div>
        
         <div class="uk-margin">
           Blood Group  <input class="uk-input" type="text" placeholder="bloodgroup" name="bloodgroup" value="<?php echo $query2['bloodgroup']; ?>">
           
      
        </div>
       
       <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="occupation" name="occupation" value="<?php echo $query2['occupation']; ?>">
        </div>
     
          <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="qualification" name="qualification" value="<?php echo $query2['qualification']; ?>">
        </div>
        
           <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="address" name="address" value="<?php echo $query2['address']; ?>">
        </div>
         <div class="uk-margin">
             
          City 
          
          <input class="uk-input" type="text" placeholder="city" name="city" value="<?php echo $query2['city']; ?>">
          
        </div>
       
        
        
       
        
        
        
         <button class="uk-button uk-button-primary " type="submit" name="submit">Submit</button>
</form>
</div>

<div></div>
</div>
<?php
}
?>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>