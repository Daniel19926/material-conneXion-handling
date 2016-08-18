<?php
include 'dbconfig.php';
include 'navbar.php';
if($_SESSION['role'] == 'user') {
header('Location: index.php');
useraccess();
}
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
			<form class="form-mid" action="createplace_reply.php" method="post">       
      <h3 class="form-signin-heading">Create location  <span class="glyphicon glyphicon-globe" aria-hidden="true"></span></h3>
<?php
if (!empty($_GET['successmessage'])) { 

		$msg=$_GET['successmessage'];
		echo '<div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ',$msg,'</div>';	
}
else {
		echo "<div class='alert alert-info'>";
		echo "Create a location for your material, Ex: Skövde, Göteborg, Tibro.";
		echo "</div>";

}
?>
  

<fieldset>

<label for="placename"></label>
<input type="text" id="name" class="form-control" name="placename" placeholder="Name of location" maxlength="100" required = "required"  /><br>


<button class="btn btn-primary" type="submit">Submit</button>   
</fieldset>

</form>

</div>


</body>
</html>