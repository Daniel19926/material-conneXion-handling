<?php
include 'dbconfig.php';
include 'navbar.php';
if($_SESSION['role'] == 'user') {
header('Location: index.php');
useraccess();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" media='all' />
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
</head>
<body>
<div class="container">
	<div class = "form-group">
		<div class="col-md-12">
			<form class="form-mid" action="createlibrary_reply.php" method="post">       
      <h3>Create library  <span class="glyphicon glyphicon-book" aria-hidden="true"></span></h3>

<?php
if (!empty($_GET['successmessage'])) { 

		$msg=$_GET['successmessage'];
		echo '<div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ',$msg,'</div>';	
}
else {
		echo "<div class='alert alert-info'>";
		echo "Create a library where your material will be stored, Ex: Main library, koridoor";
		echo "</div>";

}
?>


<fieldset>
<select required name="placename" class="location form-control">
<option value="" selected="selected">Select location</option>
<?php
	$stmt = $DB_con->prepare("SELECT * from place");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['placename']; ?>"><?php echo $row['placename']; ?></option>
        <?php
	} 
?>

</select><br>

<label for="shelfname"></label>
<input type="text" id="name" class="form-control" name="placeposition" placeholder="Library name" maxlength="100" required = "required"  /><br>


<button class="btn btn-primary" type="submit">Submit</button>   
</fieldset>

</form>
</div>
</div>
</div>



</body>
</html>