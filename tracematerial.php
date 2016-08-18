<?php 
include 'navbar.php';
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="searchstyle.css" type="text/css" media='all' />
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<body>                                                                                                                     
<form action="" method="post">                                                                                                                                                                                                                                
<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
		 <div class="input-group">
                <div class="input-group-btn search-panel">
				   <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" name="material"  placeholder="Trace material" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
	</div>
</div>
<br><br><br>  

<?php                                                                                                                                                                                                                                                                                            
if(isset($_POST['material'])){                                                                                                             
$material=$_POST['material'];  
echo "<div class='container'>";                                                          
echo "<table class = 'table table-striped'>";	
echo "<th>material #</th>
<th>User</th>
<th>Date of change</th>
<th>Status</th>
<th>Event</th>";   
                                                                                                                                 
foreach($pdo->query("SELECT * FROM logtable WHERE id='$material'") as $row){  

echo "<tr>";  
echo "<td>".$row['id']."</td>";   
echo "<td>".$row['username']."</td>";         
echo "<td>".$row['changedate']."</td>";     
echo "<td>".$row['matstatus']."</td>";   
echo "<td>".$row['eventtype']."</td>";                                                                                        
echo "</tr>";    
                                                                                                                              
} 
}                                                                                                                                     
?> 
      
</form>                                                                                                                                   
</body>
</html>