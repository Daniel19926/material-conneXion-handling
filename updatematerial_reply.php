<?php
include 'dbconfig.php';

function materialupdate(){
		sleep(1);
		header('location: updatematerial.php?successmessage=Material is updated!');
		exit; }

function userdemand(){
		sleep(1);
		header('location: updatematerial.php?errormessage=ID is in incorrect format input');
		exit; }

function wrongmaterial(){
		sleep(1);
		header('location: updatematerial.php?errormessage=Material ID does not exist in database');
		exit; }
		

	if(isset($_GET['get'])) {
		
		
			
			
			if($_GET['get'] == 'get'){
				$id = $_GET['id'];
				$stmt = $DB_con->prepare("SELECT placename, placeposition, shelfname, rownumber, position, id from rowposition where id=:id OR id IS NULL");
				$stmt->bindParam(':id', $id);
				$stmt->execute(); 
				$result = $stmt->fetchALL();
			
				exit(json_encode($result, JSON_UNESCAPED_UNICODE));
			}
		}
include 'navbar.php';

if(isset($_POST['submit'])){ 

	$eventtype = 'Update';
	$id = $_POST['id'];
		if(!preg_match('/^[0-9][0-9][0-9][0-9][\-][0-9][0-9]$/', $id)){ //ID in correct format
			userdemand();
		}
		else {
			$id = $_POST['id']; //Check if ID is in database
			$searchqueryuser = $DB_con->prepare("SELECT placename, placeposition, shelfname, rownumber, position FROM rowposition where id=:id");
			$searchqueryuser->bindParam(':id', $id);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() < 1){
				wrongmaterial(); //Goes of when id is not in database
			} else { 

			
					$insertquerymaterial='update library set matstatus=:matstatus, username=:username, position=:position, rownumber=:rownumber, shelfname=:shelfname,
					placename=:placename, placeposition=:placeposition, eventtype=:eventtype, category=category where id=:id ';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindParam(':matstatus', $_POST['matstatus'], PDO::PARAM_STR);
					$stmt->bindParam(':eventtype', $eventtype, PDO::PARAM_STR);
					$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
					$stmt->bindValue(':position', $_POST['position'], PDO::PARAM_INT);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->bindValue(':rownumber', $_POST['rownumber'], PDO::PARAM_INT);
					$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
					$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
					$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
					$stmt->execute();
		
	
					$insertquerymaterial='update rowposition set id=null where id=:id';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
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
		
				
					$insertquerymaterial='INSERT INTO logtable (id, matstatus, username, eventtype)
					VALUES(:id, :matstatus, :username, :eventtype);';
					$stmt = $DB_con->prepare($insertquerymaterial);
					$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
					$stmt->bindParam(':matstatus', $_POST['matstatus'], PDO::PARAM_STR);
					$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
					$stmt->bindParam(':eventtype', $eventtype, PDO::PARAM_STR);
					$stmt->execute();
				
		}	
	}				
}	
		materialupdate();

?>
