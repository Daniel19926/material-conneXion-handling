<?php
include 'dbconnect.php';

function visitoradded(){
		sleep(1);
		header('location: visitors.php?successmessage=Visitor added!');
		exit; }


					$insertqueryvisitor='INSERT INTO visitor(vname, organisation, title, visitors, email)
					VALUES(:vname, :organisation, :title, :visitors, :email);';
					$stmt = $pdo->prepare($insertqueryvisitor);
					$stmt->bindParam(':vname', $_POST['vname'], PDO::PARAM_STR);
					$stmt->bindParam(':organisation', $_POST['organisation'], PDO::PARAM_STR);
					$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
					$stmt->bindValue(':visitors', $_POST['visitors'], PDO::PARAM_INT);
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->execute();				
		visitoradded();
?>