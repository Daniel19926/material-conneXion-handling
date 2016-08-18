<?php
include 'dbconfig.php';

function libraryadded(){
		sleep(1);
		header('location: createlibrary.php?successmessage=Library added!');
		exit; }


$insertquerylibrary='INSERT INTO placepos(placeposition, placename)
VALUES(:placeposition, :placename);';
$stmt = $DB_con->prepare($insertquerylibrary);
$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
$stmt->execute();
libraryadded();

?>