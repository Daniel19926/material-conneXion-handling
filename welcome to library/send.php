<?php
include '../dbconfig.php';


function agreement(){
		sleep(1);
		header('location: index.html?Thank you');
		exit; }
/*
function userdemand(){
		sleep(1);
		header('location: addmaterial.php?errormessage=ID is in incorrect format input');
		exit; }
			


if(empty($_POST['check'])){ //Kollar att checkbox är markerad
			agreement();
		}
		else{*/


					$insertqueryvisitor='INSERT INTO visitor(vname, organisation, title, visitors, email)
					VALUES(:vname, :organisation, :title, :visitors, :email);';
					$stmt = $DB_con->prepare($insertqueryvisitor);
					$stmt->bindParam(':vname', $_POST['vname'], PDO::PARAM_STR);
					$stmt->bindParam(':organisation', $_POST['organisation'], PDO::PARAM_STR);
					$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
					$stmt->bindValue(':visitors', $_POST['visitors'], PDO::PARAM_INT);
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->execute();				
		agreement();
?>