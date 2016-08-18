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
<script type="text/javascript">
$(document).ready(function()
{
	$(".location").change(function()
	{
		var location=$(this).val();
		var dataString = 'location='+ location;
	
		$.ajax
		({
			type: "POST",
			url: "get_library.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".library").html(html);
			} 
		});
	});
});
</script>
</head>

<body>
	<div class="container">
	<div class="controls">
	
			<div class="col-xs-12">
				<div class = "form-group">
					<form class="form" action="createshelfreply.php" method="post">       
						<h3>Create shelf <span class=" glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></h3>

						<?php
							if (!empty($_GET['successmessage'])) { 

							$msg=$_GET['successmessage'];
							echo '<div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ',$msg,'</div>';	
							}
							
							else {
							echo "<div class='alert alert-info'>";
							echo "Add shelfs to your library. EX: AA: AB: AC: ER: FA.";
							echo "</div>";
							}
						?>
				</div>
			</div>

		
			<div class="col-xs-12">
				<div class = "form-group">
					<select required name="placename" class="location form-control">
						<option value="" selected="selected">Select location</option>
						
						<?php
							$stmt = $DB_con->prepare("SELECT * from place");
							$stmt->execute();
							while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						?>
							<option value="<?php echo $row['placename']; ?>"><?php echo $row['placename']; ?></option>
						<?php
						} 
						?>

					</select>
				</div>
			</div>

			<div class="col-xs-12">
				<div class = "form-group">
					<select required name="placeposition" class="library form-control">
						<option value="" selected="selected">Select library</option>
					</select>
				</div>
			</div>

			<div class="col-xs-12">
				<div class = "form-group">
					<input type="text" id="name" class="form-control" name="shelfname" placeholder="Shelf name" maxlength="100" required = "required"  />
				</div>
			</div>

			<div class="col-xs-6">
				<div class = "form-group">
					<input type="text" id="rows" class="form-control" name="rownumber" placeholder="Number of rows (Vertical)" maxlength="255" minlength="8" required = "required"  />
				</div>
			</div>

			<div class="col-xs-6">
				<div class = "form-group">
					<input type="number" id="position" class="form-control" name="position" placeholder="Number of positions in each row (Horizontal)" maxlength="255" minlength="8" required = "required"  />
				</div>
			</div>
			
			<div class="col-xs-10">
				<div class = "form-group">
					<button class="btn btn-primary" type="submit">Submit</button>  
				</div>
			</div> 
		
	</form>
</div>

</body>
</html>