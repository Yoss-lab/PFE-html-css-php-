<?php
ob_start();

	//include'connect.php';
	require_once __DIR__ . '/db_connect.php';
	
?>


<?php

if(isset($_POST['submit']))
{

$first=mysql_real_escape_string($_POST['first']);
$last=mysql_real_escape_string($_POST['last']);
$phone=mysql_real_escape_string($_POST['phone']);
$age=mysql_real_escape_string($_POST['age']);
$gender=mysql_real_escape_string($_POST['gender']);
$blood=mysql_real_escape_string($_POST['blood']);
$occupation=mysql_real_escape_string($_POST['occupation']);
$qualification=mysql_real_escape_string($_POST['qualification']);
$address=mysql_real_escape_string($_POST['address']);
$city=mysql_real_escape_string($_POST['city']);



	if(!empty($_FILES['image'])){
		$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                $image = time().'.'.$ext;
                move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
		//echo $image;
	}else{
		echo "Image Is Empty";
	}
	
		




$query1=mysql_query("insert into register values('','$first','$last','$phone','$age','$gender','$blood','$occupation','$qualification','$address','$image','$city')");
//echo "insert into addd values('','$name','$age')";
if($query1)
{
	header("Location:http://localhost/dash/blood.php");
 ob_end_flush();
    die();
}
}
?>
<!DOCTYPE html>
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
    



    <!-- App Define -->
    <body >
           <?php
require_once 'header.php';
?> 
       
        
          <p uk-margin >
  
    <button class="uk-button uk-button-primary uk-align-center" uk-toggle="target: #modal-close-default">ADD Blood Bank Member </button>
   
</p>

<!-- This is the modal with the default close button -->
<div id="modal-close-default" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">ADD Blood Bank Member</h2>
       
          <form method="post" action="" enctype="multipart/form-data">
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="First Name" name="first" required>
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Last Name" name="last" required>
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Phone Number" name="phone" required>
        </div>
        
        <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Age" name="age" required>
        </div>
        
        
             
            <div class="uk-margin">
            Gender<select class="uk-select" name="gender" required>
                <option selected>Male</option>
                <option>Female</option>
            </select>
        </div>
        
         <div class="uk-margin">
           Blood Group <select class="uk-select" name="blood" required>
                 <option  selected >A+</option>
      <option >A-</option>
      <option >B+</option>
      <option >B-</option>
      <option >O+</option>
      <option >O-</option>
      <option>AB+</option>
      <option >AB-</option>
            </select>
        </div>
       
       <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="occupation" name="occupation" required>
        </div>
     
          <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="qualification" name="qualification" required>
        </div>
        
           <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="address" name="address" required>
        </div>
         <div class="uk-margin">
             
          City <select class="uk-select" name="city" required>
                <option selected >Harihar</option>
      <option >Davanagere</option>
      <option >Hubli</option>
       <option >Ranibennur</option>
       <option >Gadag</option>
            </select>
        </div>
       
        
          <div class="uk-margin">
             
           Your Photo :<input type="file" name="image" id="image" required>
        </div>
       
        
        
        
         <button class="uk-button uk-button-primary " type="submit" name="submit">Submit</button>
</form>

    </div>
</div>
        
        
        
        
        
        
        
        
        
        
        
        <?php
        $query1=mysqli_query($conn,"select * from user");
echo "<table class='uk-table uk-table-striped'><tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Age</td><td>Blood Group</td><td>Phone</td><td>Address</td><td>City</td><td>EDIT</td><td>DELETE</td>";
while($query2=mysqli_fetch_array($query1))
{
echo "<tr><td>".$query2['id']."</td>";
echo "<td>".$query2['pseudo']."</td>";
echo "<td>".$query2['prenom']."</td>";
echo "<td>".$query2['email']."</td>";
echo "<td>".$query2['ville']."</td>";
echo "<td>".$query2['phone']."</td>";
echo "<td>".$query2['adresse']."</td>";
/*echo "<td><img class='uk-border-circle' width='40' height='40' src='http://amsatechnologies.com/dash/images/".$query2['image']."'></td>";*/
echo "<td>".$query2['ville']."</td>";

echo "<td><a href='editblood.php?id=".$query2['id']."'><span  class='uk-icon-button' uk-icon='icon: file-edit' style='color:#0090C1;'></span></a></td>";

echo "<td><a href='deleteblood.php?id=".$query2['id']."'><span  class='uk-icon-button' uk-icon='icon: trash' style='color:#E63462;'></span></a></td><tr>";

}
?>
</ol>
</table>


        
        
       
	</body>
</html>