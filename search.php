<?php 
		include 'navbar.php';
		include 'dbconnect.php';
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
		<link rel="stylesheet" href="assets/font-awesomes/css/font-awesome.min.css">
</head>
<body>
<?php                                                                                                                                                                                                                                                                                            
    echo "<div class='container'>";
	echo "<div class='row'>";
	echo "<div id='no-more-tables'>";
		echo "<table id='example' class='table table-bordered table-bordered table-condensed cf' data-click-to-select='true' cellspacing='0' width='100%'>";
        echo '<thead class="cf">';
			echo '<tr>';
            echo '<th>Category</th>';
            echo '<th>Material</th>';
            echo '<th>Location</th>';
            echo '<th>Library</th>';
            echo '<th>Shelf</th>';
			echo '<th>Row</th>';
			echo '<th>Pos</th>';
			echo '<th>Added</th>';
			echo '<th>Details</th>';
			echo '<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents"></th>';
			echo '</tr>';
	
		echo '</thead>';
		
        echo '<tfoot class="cf">';
        echo '<tr>';
            echo '<th>Category</th>';
            echo '<th>Material</th>';
            echo '<th>Location</th>';
            echo '<th>Library</th>';
            echo '<th>Shelf</th>';
			echo '<th>Row</th>';
			echo '<th>Pos</th>';
			echo '<th>Added</th>';
			echo '<th>Details</th>';
			echo '<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents"></th>';
        echo '</tr>';
        echo '</tfoot>';
		
        echo '<tbody>';   $counter=0;  
			foreach($pdo->query("SELECT * FROM library") as $row){ 
				
				$dt = new DateTime($row['dt']);
				
				echo "<tr>";
				
					if(preg_match('/Cement-Based/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#adad85;>".$row['category']."</td>";
				}
					if(preg_match('/Metals/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#99ccff;>".$row['category']."</td>"; 
				}
					if(preg_match('/Glass/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#0099ff;>".$row['category']."</td>"; 
				} 
					if(preg_match('/Naturals/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#33cc33;>".$row['category']."</td>"; 
				}  
					if(preg_match('/Process/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#ff3300;>".$row['category']."</td>"; 
				}   
					if(preg_match('/Carbon-Based/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#5c5c3d;>".$row['category']."</td>"; 
				}  
					if(preg_match('/Ceramics/',$row['category'])){
						echo "<td data-title='Category' style=background-color:#ff9900;>".$row['category']."</td>"; 
				}   
					if(preg_match('/Polymers/',$row['category'])){
						echo "<td style=background-color:#ff4d4d;>".$row['category']."</td>"; 
				} 
				
				echo "<td data-title='Material'>".$row['id']."</td>";
                echo "<td data-title='Location'>".$row['placename']."</td>";
                echo "<td data-title='Library'>".$row['placeposition']."</td>";
                echo "<td data-title='Shelf'>".$row['shelfname']."</td>";
				echo "<td data-title='Row'>".$row['rownumber']."</td>";
				echo "<td data-title='Position'>".$row['position']."</td>";
				echo "<td data-title='Added'>".$dt->format('Y-m-d')."</td>";
				echo "<td data-title='Details'><a href='#'  id='detail".$counter."' class='showdiv'>Details</a></td>";
				echo "<td data-title=''><a class='save' href='javascript:void(0)' title='Save to my materials'><i class='fa fa-tags' aria-hidden='true'></i></a></td>";

			echo "</tr>";
			}
			echo '</tbody>'; 
	/*
			foreach($pdo->query("SELECT * FROM logtable where id='".$row['id']."'") as $rows){
				

			
			$dt = new DateTime($rows['changedate']);	
	
			echo '<thead class="cf">';
			echo '<tr class="detail" id="sdetail'.$counter.'">';
			echo '<th></th>';
			echo '<th>Material</th>';
            echo '<th>Type</th>';
            echo '<th>Event</th>';
			echo '<th>Status</th>';
			echo '<th></th>';
			echo '<th></th>';
			echo '<th>Date</th>';
			echo '<th></th>';
			echo '<th></th>';
            
           
			echo '</tr>';
			echo '</thead>';

			
						echo '<tbody>'; 
						echo '<tr class="detail" id="rdetail'.$counter++.'">';
						echo "<td></td>";
						echo "<td>".$row['id']."</td>";
						echo "<td>".$rows['eventtype']."</td>";
						echo "<td>".$rows['username']."</td>";
						echo "<td>".$rows['matstatus']."</td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td>".$dt->format('Y-m-d')."</td>";
						echo "<td></td>";
						echo "<td></td>";
						
						
		  
   				
						echo "</tr>"; 
						echo '</tbody>'; 
}	
    echo '</table>';
	
	echo '</div>';
	echo '</div>';
	echo '</div>';


*/

?>
 

<script type="text/javascript">
/*

$(".detail").hide();

 $(document).ready(function () {
    $(".showdiv").click(function () {
		$(".detail"+ $(this).data("id")).show(); 
		
    });
  });
*/
$(".detail").hide();
$(document).ready(
    function(){
   

        $(".showdiv").click(function () {
			var myClass = $(this).attr("id");
            $("#r"+myClass).toggle('SlideUp');
			$("#s"+myClass).toggle('SlideUp');
        });
    });
	
 
/*
 $(".detail").hide();
$(document).ready(function(){
    $(".").click(function(){
        $("p").toggleClass("main");
    });
});
*/
/*
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
*/
$(document).ready(function() {
    $('#example').DataTable();
} );


</script>


</script>
                                                                                                                              
</body>
</html>
