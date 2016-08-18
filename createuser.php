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
			<form class="form-vertical" action="createuser_reply.php" method="post">       
      <h3>Create user <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h3>

<fieldset>

<label for="user"></label>
<input type="text" id="username" class="form-control" name="username" placeholder="Username" maxlength="50" required = "required" /><br>

<?php
if (!empty($_GET['successmessage'])) { 

		$msg=$_GET['successmessage'];
		echo '<div class="alert alert-success">',$msg,'</div>';	
}
else
		if (!empty($_GET['errormessage'])) { 
			$msg=$_GET['errormessage'];
			echo '<div class="alert alert-danger">',$msg,'</div>';	
}
else {
			echo "<div class='alert alert-info'>";
			echo "Password must contain number, big and small letter. 
			Password must be greater than 8 signs and contain special 
			caracter ex: !@#$%^&*()\-_=+{};:,";
			echo "</div>";
}
?>

<label for="password"></label>
<input type="password" id="pass" class="form-control" name="pass" placeholder="Password" maxlength="255" minlength="8" required = "required"  />


<label for="password2"></label>
<input type="password" id="pass2" class="form-control" name="pass2" placeholder="Enter password again" maxlength="255" minlength="8" required = "required"  />

<select required name="role" class="Role form-control">
<option value="" selected="selected">Select Role</option>
<?php
	$stmt = $DB_con->prepare("SELECT role from role");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
        <?php
	} 
?>

</select><br>

<label for="E-mail"></label>
<input type="email" id="email" class="form-control" name="email" placeholder="Email adress" maxlength="100" required = "required"  />

<div class="checkbox"style="margin-left:-20px;">
 <label for="chkPassport"><b>The information entered will be stored</b>
<input type="checkbox" id="chkPassport" name="checkbox" />    
<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>	
</label>
</div>

<button class="btn btn-primary" type="submit">Submit</button>   
</fieldset>
</form>
</div>
</div>
</div>


</body>
</html>