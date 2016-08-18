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
		<form class="form"  action="deletematerial_reply.php" method="post">       
			<h3 class="form-signin-heading">Delete material <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></h3>		
				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
						
						<?php
								if (!empty($_GET['successmessage'])) { 

									$msg=$_GET['successmessage'];
									echo '<div class="alert alert-success">',$msg,'</div>';	
								}	
								
								else if (!empty($_GET['errormessage'])) { 
								
									$msg=$_GET['errormessage'];
									echo '<div class="alert alert-danger">',$msg,'</div>';	
								}
								
								else {
									
									echo "<div class='alert alert-warning'>";
									echo "Warning! No information about the material will be left.";
									echo "</div>";
								}
						?>
						</div>
					</div>
				</div>
	 
				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<input type="text" id="id" class="form-control" name="id" placeholder="MC#" maxlength="7" required = "required" /><br>
						</div>
					</div>
				</div>
	
				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<button class="btn btn-primary" type="submit">Submit</button>   
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>