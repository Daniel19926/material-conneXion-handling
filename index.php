<?php
include 'navbar.php';
include 'dbconnect.php';
ini_set( "display_errors", 0);
?>
<html>
<head>
<link type="text/css" media="screen" rel="stylesheet" href="responsive-tables.css" />
<script type="text/javascript" src="responsive-tables.js"></script>
<link href="custom.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="right_col" role="main" >
			<!-- top tiles -->
			<div class="row tile_count">
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				
					<span class="count_top">Materials</span>
						<div class="count"><?php foreach($pdo->query( 'CALL counttotalmaterials();' ) as $row){ 
							echo $row['total']; } ?></div>
					<span class="count_bottom"><i class="green">100% </i> All materials</span>
				</div>			
			
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Skövde plant</span>
						<div class="count"><?php foreach($pdo->query( 'CALL skovdeplant();' ) as $row){ echo $row['COUNT(id)'];}?>  </div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL skovdeplant();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['COUNT(id)'] / $rows['total']) * 100;  
								
						if ($percent < 10) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Tibro plant</span>
						<div class="count"><?php foreach($pdo->query( 'CALL tibroplant();' ) as $row){ echo $row['COUNT(id)'];} ?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL tibroplant();' ) as $row); 
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['COUNT(id)'] / $rows['total']) * 100; 
							
						if ($percent < 10) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?></i> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Main library Skövde</span>
						<div class="count"><?php foreach($pdo->query( 'CALL countmainlibrary();' ) as $row){ echo $row['count(id)'];}?>  </div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countmainlibrary();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['count(id)'] / $rows['total']) * 100; 
								
						if ($percent < 10) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Metals</span>
						<div class="count" style="color:#99ccff"><?php foreach($pdo->query( 'CALL countmetal();' ) as $row){ echo $row['metal'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countmetal();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['metal'] / $rows['total']) * 100; 
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Polymers</span>
						<div class="count" style="color:#ff4d4d;"><?php foreach($pdo->query( 'CALL countpolymers();' ) as $row){ echo $row['polymers'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countpolymers();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['polymers'] / $rows['total']) * 100;
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Naturals</span>
						<div class="count" style="color:#33cc33;"><?php foreach($pdo->query( 'CALL countnaturals();' ) as $row){ echo $row['naturals'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countnaturals();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['naturals'] / $rows['total']) * 100;
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Process</span>
						<div class="count" style="color:#ff3300;"><?php foreach($pdo->query( 'CALL countprocess();' ) as $row){ echo $row['process'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countprocess();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['process'] / $rows['total']) * 100; 
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Glass</span>
						<div class="count" style="color:#0099ff;"><?php foreach($pdo->query( 'CALL countglass();' ) as $row){ echo $row['glass'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countglass();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);  
										$percent = ( $row['glass'] / $rows['total']) * 100; 
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div> 
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Cement-Based</span>
						<div class="count" style="color:#adad85;"><?php foreach($pdo->query( 'CALL countcementbased();' ) as $row){ echo $row['cementbased'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countcementbased();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['cementbased'] / $rows['total']) * 100; 
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Carbon-Based</span>
						<div class="count" style="color: #5c5c3d;"><?php foreach($pdo->query( 'CALL countcarbonbased();' ) as $row){ echo $row['carbonbased'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countcarbonbased();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['carbonbased'] / $rows['total']) * 100;
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
				
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Ceramics</span>
						<div class="count" style="color: #ff9900;"><?php foreach($pdo->query( 'CALL countceramics();' ) as $row){ echo $row['ceramics'];}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL countceramics();' ) as $row);  
									foreach($pdo->query( 'CALL counttotalmaterials();' ) as $rows);                                                                                                                            
										$percent = ( $row['ceramics'] / $rows['total']) * 100;
										
						if ($percent < 14.28571) {
							echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
						else {
							echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of total materials</span>
				</div>
			</div>
		</div>
	</div>	
</body>	
</html>

     

	  
