<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
//$db = new DB_CONNECT();

$sqlreclam = "SELECT * from reclamation WHERE statut='non lu'";
$resultreclam = $conn->query($sqlreclam);

$sqlconge = "SELECT * from conge WHERE statut ='en cours de traitement' ";
$resultconge = $conn->query($sqlconge);

//$result = $result->fetch_assoc();
 

   // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image_emploi = $_FILES['image_emploi']['name'];
  	// Get text
	$title_emploi = mysqli_real_escape_string($conn, $_POST['title_emploi']);
  	$desc_emploi = mysqli_real_escape_string($conn, $_POST['desc_emploi']);
  	$annonce_de = mysqli_real_escape_string($conn, $_POST['annonce_de']);
  	

  	// image file directory
  	$target = "images/".basename($image_emploi);

  	$sql = "INSERT INTO emplois (title_emploi,desc_emploi,annonce_de,image_emploi,dat) VALUES ('$title_emploi', '$desc_emploi','$annonce_de','$image_emploi',CURDATE())";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image_emploi']['tmp_name'], $target)) {
  		//$msg = "Image uploaded successfully";
		header("Location:http://localhost/leoni/afficheAllEmploi.php");
  	}else{
		header("Location:http://localhost/leoni/afficheAllEmploi.php");
  	}
  }
  
  //$resultact = mysqli_query($conn, "SELECT * FROM actualite");

?>
<!DOCTYPE html>
<html lang="fr">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LEONI</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="acceuil.php">
			  		LEONI
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>
								
								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
															</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="acceuil.php">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
							 <li><a href="afficheAllAct.php"><i class="menu-icon icon-bullhorn"></i>Actualités </a>
                            </li>
                           <li><a href="afficheAllReclamation.php"><i class="menu-icon icon-inbox"></i>Reclamations <b class="label green pull-right">
                                 <?php $num=mysqli_num_rows($resultreclam); echo"$num"; ?></b> </a></li>
                            <li><a href="afficheAllConge.php"><i class="menu-icon icon-tasks"></i>Congé <b class="label orange pull-right">
                                <?php $num=mysqli_num_rows($resultconge); echo"$num"; ?></b> </a></li>
						</ul><!--/.widget-nav-->

						 <ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> offres d'emplois </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>offres des stages </a></li>
                                <!--<li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>-->
                            </ul>

						<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="other-login.html">
											<i class="icon-inbox"></i>
											Login
										</a>
									</li>
									<li>
										<a href="other-user-profile.html">
											<i class="icon-inbox"></i>
											Profile
										</a>
									</li>
									<li>
										<a href="other-user-listing.html">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->

			<?php
/*
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
			*/
			?>
			
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>EMPLOI</h3>
							</div>
							<div class="module-body">
							
					 <?php
						/*while ($rowact = mysqli_fetch_array($resultact)) {
						  echo "<div id='img_div'>";
							echo "<img src='images/".$rowact['image']."' >";
							echo "<p>".$rowact['image_text']."</p>";
						  echo "</div>";
						}*/
					  ?>
							
			 <form method="post" action="ajoutEmploi.php" enctype="multipart/form-data" class="form-horizontal row-fluid">
					
					
				   <div class="control-group">
						 <label class="control-label" for="basicinput">Titre</label>
					
						<input class="uk-input" class="span8" type="text"  name="title_emploi"  id="basicinput">
					</div>
					 <div class="control-group">
					
					 <input type="hidden" name="size" value="1000000" class="uk-input" class="span8">
					 </div>
						
						<div class="control-group">
						 <label class="control-label" for="basicinput">Description</label>
						  <textarea 
							id="text" 
							cols="40" 
							rows="4" 
							name="desc_emploi" 
							class="uk-input" class="span8"
							placeholder="Say something about this image..."></textarea>
						</div>
						
						 <div class="control-group">
						 <label class="control-label" for="basicinput">Annonce par</label>
					
						<input class="uk-input" class="span8" type="text"  name="annonce_de"  id="basicinput">
					</div>
						
						<div class="control-group">
						<label class="control-label" for="basicinput">Image</label>
						  <input type="file" name="image_emploi" class="uk-input" class="span8">
						</div>
						
						<div class="control-group">
				<div class="controls">
							<button type="submit" class="btn" name="upload">AJOUTER</button>
					 
					<!--	<label class="control-label" for="basicinput">Image</label>
						<input type="file" name="image_act" ></span>
					-->
					</div>
					</div>
					
					
			<div class="control-group">
				<div class="controls">
				
				<!--<input  class="btn" type="submit" name="submit" value="publier" >-->
				</div>
			</div>
			
			</form>
			</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			<?php
			//}
			?>

			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>