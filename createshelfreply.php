
<?php
include 'dbconfig.php';

function shelfadded(){
		sleep(1);
		header('location: createshelf.php?successmessage=Shelf added to library!');
		exit; }

$insertqueryshelf='INSERT INTO shelf(shelfname, placename, placeposition)
VALUES(:shelfname, :placename, :placeposition);';
$stmt = $DB_con->prepare($insertqueryshelf);
$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
$stmt->execute();



for($is = 0; $is < $_POST['rownumber']; $is++){
  $rownumber = $is;

 $insertqueryrow='INSERT INTO shelfrow(rownumber, shelfname, placename, placeposition)
VALUES(:rownumber, :shelfname, :placename, :placeposition);';
$stmt = $DB_con->prepare($insertqueryrow);
$stmt->bindValue(':rownumber', $rownumber+1, PDO::PARAM_INT);
$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
$stmt->execute();

 
for($i = 0; $i < $_POST['position']; $i++ ){
	$position = $i;

$insertquerymaterial='INSERT INTO rowposition(position, rownumber, shelfname, placename, placeposition)
VALUES(:position, :rownumber, :shelfname, :placename, :placeposition);';
$stmt = $DB_con->prepare($insertquerymaterial);
$stmt->bindValue(':position', $position+1, PDO::PARAM_INT);
$stmt->bindValue(':rownumber', $rownumber+1, PDO::PARAM_INT);
$stmt->bindParam(':shelfname', $_POST['shelfname'], PDO::PARAM_STR);
$stmt->bindParam(':placename', $_POST['placename'], PDO::PARAM_STR);
$stmt->bindParam(':placeposition', $_POST['placeposition'], PDO::PARAM_STR);
$stmt->execute(); 
}


}

shelfadded();

?>
