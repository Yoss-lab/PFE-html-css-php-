<?php

require_once __DIR__ . '/db_connect.php';

// récolte des données du fichier:
$image_tmp = $_FILES["image"]["tmp_name"];

// ajout dans la table:
$donnees = addslashes(fread(fopen($image_tmp, "r")));
$result = mysql_query("INSERT INTO photos (photodata) VALUES ('$donnees')");
$id = mysql_insert_id();
mysql_close();
?>