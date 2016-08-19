<?php
include 'dbconfig.php';
include 'navbar.php';

?>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" media='all' />
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
	
	
	$(".library").change(function()
	{
		var library=$(this).val();
		var dataString = 'library='+ library;
	
		$.ajax
		({
			type: "POST",
			url: "get_library.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".shelf").html(html);
			} 
		});
	});
	
		$(".shelf").change(function()
	{
		var shelf = $('.shelf').val();
		var library = $('.library').val();
		
		console.log(shelf);
		console.log(library);
		
	
	
		$.ajax
		({
			type: "GET",
			url: "get_library.php?shelf="+shelf+"&library=" + library,
			data: null,
			cache: false,
			success: function(html)
			{
				$(".rownumber").html(html);
			} 
		});
	});
	
		$(".rownumber").change(function()
	{
		
		var shelf = $('.shelf').val();
		var rownumber = $('.rownumber').val();
		var location = $('.location').val();

	
		$.ajax
		({
			type: "GET",
			url: "get_library.php?rownumber=" + rownumber+"&shelf="+shelf+"&location=" + location,
			data: null,
			cache: false,
			success: function(html)
			{
				$(".position").html(html);
			} 
		});
	});
	
});
</script>
</head>

	<body>
		<div class="container">
			<div class="controls">
					<form class="form" action="addmaterial_reply.php" method="post">
						<h3 class="form-signin-heading">Add material <i class="fa fa-plus" aria-hidden="true"></i></h3>

						<?php
								if (!empty($_GET['successmessage'])) {

										$msg=$_GET['successmessage'];
										echo '<div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ',$msg,'</div>';
								}

								else
									if (!empty($_GET['errormessage'])) {

									$msg=$_GET['errormessage'];
									echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> ',$msg,'</div>';
								}
								else {

									echo '<div class="alert alert-info">';
									echo 'Insert material to library';
									echo '</div>';
								}
						?>
			<fieldset>
				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<input type="text" id="id" class="form-control" name="id" placeholder="MC#" maxlength="7" required = "required" />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<select required name="category" class="category form-control">
								<option value="" selected="selected">Select category</option>

								<?php
									$stmt = $DB_con->prepare("SELECT * from material");
									$stmt->execute();

									while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option><?php
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
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
			</div>

				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<select required name="placeposition" class="library form-control">
								<option value="" selected="selected">Library</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class = "form-group">
							<select required name="shelfname" class="shelf form-control">
								<option value="" selected="selected">Shelf</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<select required name="rownumber" class="rownumber form-control">
								<option value="" selected="selected">Row</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class = "form-group">
							<select required name="position" class="position form-control">
								<option value="" selected="selected">Position</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class = "form-group">
							<button class="btn btn-primary" name="submit" type="submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>




</body>
</html>
