<?php
include 'dbconfig.php';
include 'navbar.php';

function materialadded(){
		sleep(1);
		header('location: addmaterial.php?successmessage=Material added to library!');
		exit; }

function error(){
		sleep(1);
		header('location: addmaterial.php?errormessage=Something went wrong trying to store the material');
		exit; }

function userdemand(){
		sleep(1);
		header('location: addmaterial.php?errormessage=ID is in incorrect format input');
		exit; }
		
if(isset($_POST['submit'])){ 

$id = $_POST['id'];
		if(!preg_match('/^[0-9][0-9][0-9][0-9][\-][0-9][0-9]$/', $id)){ //Ser till att ID har rätt format
			userdemand();
		}
		else {
		
					$insertquerymaterial='INSERT INTO library(username, position, id, category, rownumber, shelfname, placename, placeposition)
					VALUES(:username, :position, :id, :category, :rownumber, :shelfname, :placename, :placeposition);';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
					$stmt->bindValue(':position', $_POST['position'], PDO::PARAM_INT);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
					$stmt->bindValue(':rownumber', $_POST['rownumber'], PDO::PARAM_INT);
					$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
					$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
					$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
					$stmt->execute();				
					
					$insertquerymaterial='update rowposition set id=:id where position=:position and rownumber=:rownumber
					and shelfname=:shelfname and placename=:placename and placeposition=:placeposition';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindValue(':position', $_POST['position'], PDO::PARAM_INT);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->bindValue(':rownumber', $_POST['rownumber'], PDO::PARAM_INT);
					$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
					$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
					$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
					$stmt->execute();
					
		}
	}
materialadded();
?>