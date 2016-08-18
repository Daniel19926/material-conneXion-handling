<?php
include 'dbconfig.php';

function placeadded(){
		sleep(1);
		header('location: createplace.php?successmessage=Location added!');
		exit; }


$insertqueryplace='INSERT INTO place(placename)VALUES(:placename);';
$stmt = $DB_con->prepare($insertqueryplace);
$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
$stmt->execute();
placeadded();

?>