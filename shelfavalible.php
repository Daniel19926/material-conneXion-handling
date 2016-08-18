<?php 
include 'navbar.php';
include 'dbconnect.php';
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" media='all' />
		<link rel="stylesheet" href="search.css" type="text/css" media='all' />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" type="text/css" media='all' />
		<script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
</head>
<body>
<?php                                                                                                                                                                                                                                                                                            
    echo "<div class='container'>";
	echo "<div class='row'>";
	echo "<div id='no-more-tables'>";
		echo "<table id='example' class='table table-striped table-bordered table-condensed cf' cellspacing='0' width='100%'>";
        echo '<thead class="cf">';
			echo '<tr>';
            echo '<th>Location</th>';
            echo '<th>Library</th>';
            echo '<th>Shelf</th>';
            echo '<th>Row</th>';
            echo '<th>Pos</th>';
			echo '</tr>';
	
		echo '</thead>';
		
        echo '<tfoot class="cf">';
        echo '<tr>';
            echo '<th>Location</th>';
            echo '<th>Library</th>';
            echo '<th>Shelf</th>';
            echo '<th>Row</th>';
            echo '<th>Pos</th>';
        echo '</tr>';
        echo '</tfoot>';
		
        echo '<tbody>';     
			foreach($pdo->query("SELECT * FROM rowposition where (id is null)") as $row){ 
			
				echo "<tr>";  
				echo "<td>".$row['placename']."</td>"; 
				echo "<td>".$row['placeposition']."</td>"; 
				echo "<td>".$row['shelfname']."</td>";  
				echo "<td>".$row['rownumber']."</td>";  
				echo "<td>".$row['position']."</td>"; 
				echo "</tr>";   
			}
			echo '</tbody>'; 
		echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>	

</html>
</body>