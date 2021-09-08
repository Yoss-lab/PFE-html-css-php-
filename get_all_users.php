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
$sql = "SELECT * from user WHERE grade ='employe' ";
$result = $conn->query($sql);

//$result = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		</head>
		<body>
		
		
		 <div>Utilisateurs</div>
        <table>
            <tr>
                <th>Nom</th> 
                <th>Prenom</th>
                
            </tr>
			
		<?php foreach($result as $user){ ?>
		
			  <tr>          
                            <td><?= $user['pseudo'] ?></td>
                            <td><?= $user['prenom'] ?></td>
                            <td><?= $user['email'] ?></td>
                            
                        </tr>
			 
		<?php } ?>
		</table>
		</body>
