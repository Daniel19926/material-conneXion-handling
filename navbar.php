<?php
// initiera sessionen
session_start();

// kontroll, om användar sessionen inte är initierad blir man omdirigerad till login.php
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>
<html>
<head>
<title>IDC Material Handling</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/font-awesomes/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
<body> 


<?php
//If session user = Guest
 if($_SESSION['role'] == 'Guest') {
	echo '
	<nav class="navbar navbar-default">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		<span class="icon-bar"></span>
		
      </button>
	  <a href="index.php" class="pull-left"><img src="assets/img/logo-idcwestsweden.jpg" height="50px;" width="170px;"></a>
    </div>  
	


    <!-- Collect the nav links, forms, and other content for toggling -->
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
		
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
		<li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search material</a></li>

      </ul> 
	  		   <ul class="nav navbar-nav navbar-right">
		   
		   <li><a><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '; echo $_SESSION['username']; echo '</a><li>
        <li><a href="logout.php">Log out</a></li> 
		

    </div>

     
</div><!-- /.navbar-collapse -->
</nav>
';}

//If session user = User
else if($_SESSION['role'] == 'User') { 
	echo '
<div class="container-fluid">
	<nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		
      </button>
	  <a href="index.php" class="pull-left"><img src="assets/img/logo-idcwestsweden.jpg" height="50px;" width="170px;"></a>
    </div>  
	
</form>


    <!-- Collect the nav links, forms, and other content for toggling -->
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
		
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
		<li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search material</a></li>
		<li><a href="visitors.php">Library visitors</a></li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material handling <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addmaterial.php">Add material</a></li>
			<li><a href="updatematerial.php">Update material</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="tracematerial.php">Trace</a></li>
            
          </ul>
        </li>
      </ul>
		   <ul class="nav navbar-nav navbar-right">
		   
		   <li><a href="user.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ';
		   echo $_SESSION['username']; 
		   echo ' </a><li>
        <li><a href="logout.php">Log out</a></li> 
		

    </div>

     
</div><!-- /.navbar-collapse -->
</nav>
 

';} //If session user = Admin
else {echo '
<div class="container-fluid">
	<nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		
      </button>
	  <a href="index.php" class="pull-left"><img src="assets/img/logo-idcwestsweden.jpg" height="50px;" width="170px;"></a>
    </div>  
	
</form>


    <!-- Collect the nav links, forms, and other content for toggling -->
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
		
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
		<li><a href="visitors.php"><i class="fa fa-users" aria-hidden="true"></i> Visitors</a></li>
				<li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search material</a></li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material handling <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addmaterial.php">Add material</a></li>
			<li><a href="updatematerial.php">Update material</a></li>
			<li><a href="deletematerial.php">Delete material</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="uploaddoc.php">Delivery</a></li>
			<li><a href="tracematerial.php">Trace</a></li>
            
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Library handling <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="createshelf.php">Add shelf</a></li>
			<li><a href="createlibrary.php">Add library</a></li>
			<li><a href="createplace.php">Add location</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="shelfavalible.php">Available shelfs</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="createuser.php">Add user</a></li>
			
            
          </ul>
        </li>
      </ul>
		   <ul class="nav navbar-nav navbar-right">
		   <li><a href="support.php"><i class="fa fa-ambulance" aria-hidden="true"></i> Support</a></li>
		   <li><a href="list.php" onclick="return false" style="cursor:not-allowed;"><i class="fa fa-tags" aria-hidden="true"></i> My materials</a></li>
		   <li><a href="user.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ';
		   
		   echo $_SESSION['username']; 
		   echo ' </a><li>';
			echo '<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li> 
	</ul>	

    </div>

     
</div><!-- /.navbar-collapse -->
</nav>
 

';}
	
?>

</body>
</html>
