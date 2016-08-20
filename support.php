<?php
include 'navbar.php';
include 'dbconnect.php';
?>
<html>
<head>
		<link type="text/css" media="screen" rel="stylesheet" href="responsive-tables.css" />
		<script type="text/javascript" src="responsive-tables.js"></script>
		<link href="style.css" rel="stylesheet">
		<script type="text/javascript"></script> 
</head>

<body>        
	<div class="container">
	
		<h2 class="section-title"><h3 class="form-signin-heading">Contact support</h3>
            <div class="item">
			
				<?php
					if (!empty($_GET['successmessage'])) { 

						$msg=$_GET['successmessage'];
						echo '<div class="alert alert-success" style="margin: -20 0 10 0;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ',$msg,'</div>';	
						}
						
					else if (!empty($_GET['errormessage'])) { 
					
						$msg=$_GET['errormessage'];
						echo '<div class="alert alert-danger" style="margin: -20 0 10 0;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> ',$msg,'</div>';	
						}
						
					else {
						
						echo '<div class="alert alert-info" style="margin: -20 0 10 0;">';
						echo 'Describe your problem and provide the error code, if available';
						echo '</div>';
						}
			
				?>
				
			<form id="fields" name="fields" method="post" action="contact.php" role="form">
						
					<div class="controls">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
									
										<select required="required" name="issue" class="category form-control">
											<option value="">Select issue</option>
											<option>Storing materials and shelfs</option>
											<option>User and user settings</option>
											<option>I got an error code while working in the system</option>
											<option>Other</option>
											<div class="help-block with-errors"></div>
										</select>
										
                                    </div>
                                </div>
								
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="4" required="required" data-error="Lämna ett medelande."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								
                                <div class="col-xs-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>	
                            </div>
							
						</div>
                    </div>
				</div>
			</form>
		</div><!--//main-body-->
	</div>
</body>
</html>