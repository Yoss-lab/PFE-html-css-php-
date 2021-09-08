<?php
  ob_start();
	require_once __DIR__ . '/db_connect.php';
	
?>





<html>
    <head>
        <title>Blood Bank</title>
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />
       <!-- <script src="uikit/js/jquery.js"></script> -->
        
        <!-- Jquery JS File -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>
        
       
        
        
 

    
      
    </head>
    <body>
    
   <?php
require_once 'header.php';
?> 


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
$query1=mysqli_query($conn,"select * from user where id='$id'");
$query2=mysqli_fetch_array($query1);
?>
<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        
    </div>
    <div>
 <form method="post" action="" enctype="multipart/form-data">
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="First Name" name="firstname" value="<?php echo $query2['pseudo']; ?>">
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Last Name" name="lastname" value="<?php echo $query2['prenom']; ?>">
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Phone Number" name="phone" value="<?php echo $query2['phone']; ?>">
        </div>
        
        <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Age" name="age" value="<?php echo $query2['email']; ?>">
        </div>
        
        
        
         <div class="uk-margin">
           Blood Group  <input class="uk-input" type="text" placeholder="bloodgroup" name="bloodgroup" value="<?php echo $query2['ville']; ?>">
           
      
        </div>
       
      
     
         
           <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="address" name="address" value="<?php echo $query2['adresse']; ?>">
        </div>
         <div class="uk-margin">
             
          City 
          
          <input class="uk-input" type="text" placeholder="city" name="city" value="<?php echo $query2['password']; ?>">
          
        </div>
       
        
        
       
        
        
        
         <button class="uk-button uk-button-primary " type="submit" name="submit">Submit</button>
</form>
</div>

<div></div>
</div>
<?php
}
?>
</body>
</html>