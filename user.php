<?php
include 'dbconfig.php';
include 'navbar.php';

?>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" media='all' />
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>

</head>
<body>
<div class="container">
	<div class = "form-group">
		<div class="col-md-12">
			<form class="form" action="user_reply.php" method="post">       
				<h3>Current user <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h3>

<fieldset>
<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly="readonly" /><br>

<input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>"/><br>

<input type="password"  class="form-control" name="currentpass" placeholder="Enter your current password" required = "required"/>

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

<input type="password" class="form-control" name="newpass" placeholder="Enter new password"/>

<input type="password" class="form-control" name="newpass2" placeholder="Enter new password again"/>

<button class="btn btn-primary" name="submit" type="submit">Submit</button>   
</div>
</div>

</fieldset>
</form>

</div>


</body>
</html>