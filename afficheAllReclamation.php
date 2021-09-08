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
$sql = "SELECT * from reclamation WHERE statut='non lu'";
$result = $conn->query($sql);

$sqlreclam = "SELECT * from reclamation ";
$resultreclam =$conn->query($sqlreclam);
												

$sqlconge = "SELECT * from conge WHERE statut ='en cours de traitement' ";
$resultconge = $conn->query($sqlconge);

//$result = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEONI</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="acceuil.php">LEONI </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                        <li><a href="#"><i class="icon-eye-open"></i></a></li>
                        <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                    </ul>
                    <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Item No. 1</a></li>
                                <li><a href="#">Don't Click</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Example Header</li>
                                <li><a href="#">A Separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Support </a></li>
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/user.png" class="nav-avatar" />
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="acceuil.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                            <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                            </li>
                            <li><a href="afficheAllReclamation.php"><i class="menu-icon icon-inbox"></i>Reclamations <b class="label green pull-right">
                                 <?php $num=mysqli_num_rows($result); echo"$num"; ?></b> </a></li>
                            <li><a href="afficheAllConge.php"><i class="menu-icon icon-tasks"></i>Congés <b class="label orange pull-right">
                                <?php $num=mysqli_num_rows($resultconge); echo"$num"; ?></b> </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> offres d'emplois </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>offres des stages </a></li>
                                <!--<li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>-->
                            </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                            </i>More Pages </a>
                                <ul id="togglePages" class="collapse unstyled">
                                    <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                    <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                    <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Reclamations</h3>
                            </div>
                            <div class="module-option clearfix">
                                <form>
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filter by name...">
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
								
								 <div class="input-append pull-right">
                                   
									<!--<input type="button" class="btn"  onclick=window.location.href='ajoutEmploye.html';  value="Nouveau Employeé">-->
                                   
                                </div>
                                </form>
                                
                            </div>
							<!--<form method="post" action="#">
                            <div class="module-body">
					
                                <div class="row-fluid">
								
                                    <div class="span6">-->
									
									   <?php
									   
									   
									   if(isset($_POST['submit']))
												{
												
													//$idDemandConge = $_POST['idDemandConge'];
													
													$commentaire = $_POST['commentaire'];
													
													$query3=mysqli_query($conn,"UPDATE reclamation SET statut = 'lu' WHERE idReclam = '$idReclam'");
													if($query3)
													{
													  
														header("Location:http://localhost/leoni/reclamation.php");
														//echo"alert('Employee modifier avec succee')";
														 ob_end_flush();
														die();

													}
												}
									   
									   
												//$query1=mysqli_query($conn,"select * from user");
												echo "<table class='uk-table uk-table-striped'><tr><td>ID</td><td>Reclamation</td><td>répondre</td>";
												
												
												while($query2=mysqli_fetch_array($resultreclam))
												{
												echo "<tr><td>".$query2['idReclam']."</td>";
												echo "<td>".$query2['commentaire']."</td>";
												
												/*echo" <td><button class='btn' type='submit' name='submit' ><a href='reclamation.php?idReclam=".$query2['idReclam']."' name='submit'><span  class='btn btn-primary'>voir plus</span></a></button></td>";
			*/
												
												
												echo "<td><a href='reclamation.php?idReclam=".$query2['idReclam']."' name='submit'><span  class='btn btn-primary'>voir plus</span></a></td>";

												}
											?>
									</ol>
								</table>


									
                                  <!--  </div>
                                   
                                </div>
                                
                                <br />
                               
                            </div>
								
                             </form>   -->
                                <br />
                                <div class="pagination pagination-centered">
                                    <ul>
                                        <li><a href="#"><i class="icon-double-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="icon-double-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
        </div>
    </div>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
	
</body>
</html>
