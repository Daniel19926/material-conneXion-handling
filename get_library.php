<?php 
header('Content-type: text/plain; charset=utf-8');
include('dbconfig.php');

if($_POST['location'])
{
	$location=$_POST['location'];
		
	$stmt = $DB_con->prepare("SELECT * FROM placepos WHERE placename=:location");
	$stmt->execute(array(':location' => $location));
	?><option selected="selected">Select library:</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['placeposition']; ?>"><?php echo $row['placeposition']; ?></option>
        <?php
	}
}

if($_POST['library'])
{
	$library=$_POST['library'];
	
	$stmt = $DB_con->prepare("SELECT * FROM shelf WHERE placeposition=:library");
	$stmt->execute(array(':library' => $library));
	?><option selected="selected">Select shelf:</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['shelfname']; ?>"><?php echo $row['shelfname']; ?></option>
		<?php
	}
}
if($_GET['shelf'])
{
	$shelf=$_GET['shelf'];
	$library=$_GET['library'];
	
	$stmt = $DB_con->prepare("SELECT rownumber FROM shelfrow WHERE shelfname=:shelf AND placeposition='$library' ORDER by rownumber ASC");
	$stmt->execute(array(':shelf' => $shelf));
	?><option selected="selected">Select row :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['rownumber']; ?>"><?php echo $row['rownumber']; ?></option>
		<?php
	}
}

if($_GET['rownumber'])
{
	$shelf=$_GET['shelf'];
	$rownumber=$_GET['rownumber'];
	$location=$_GET['location'];
	
	$stmt = $DB_con->prepare("SELECT position FROM rowposition WHERE (shelfname=:shelf AND rownumber=:rownumber AND placename=:location) and (id is null) ORDER by position ASC");
	$stmt->execute(array(':shelf' => $shelf, ':rownumber' => $rownumber, ':location' => $location));

	
	?><option selected="selected">Select row position:</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['position']; ?>"><?php echo $row['position']; ?></option>
		<?php
	}
}

?>