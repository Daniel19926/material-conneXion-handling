<?php
include 'dbconfig.php';
$eventtype = 'Delete';
function materialdelete(){
		sleep(1);
		header('location: deletematerial.php?successmessage=Material is deleted from library!');
		exit; }

function wrongmaterial(){
		sleep(1);
		header('location: deletematerial.php?errormessage=Material ID does not exist in database'); 
		exit; }
$null = 'null';

$id = $_POST['id'];
		if(!preg_match('/^[0-9][0-9][0-9][0-9][\-][0-9][0-9]$/', $id)){ //Ser till att ID har rätt format
			userdemand();
		}
		else {
			$id = $_POST['id']; //Kollar om material ID finns i databasen
			$searchqueryuser = $DB_con->prepare("SELECT id FROM library WHERE id= :id");
			$searchqueryuser->bindParam(':id', $id);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() < 1){
				wrongmaterial(); //körs om ID inte finns
			} else { 
					$insertqueryrows='update rowposition set id=null where id=:id';
					$stmt = $DB_con->prepare($insertqueryrows);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->execute();
				
					
					$insertquerymaterial='delete from library where id=:id';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->execute();
					materialdelete();
					
}
		}
?>