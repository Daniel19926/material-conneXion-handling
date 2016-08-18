<?php
include 'navbar.php';
include 'dbconnect.php';
ini_set( "display_errors", 0);
?>

<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<link type="text/css" media="screen" rel="stylesheet" href="responsive-tables.css" />
<script type="text/javascript" src="responsive-tables.js"></script>
<link href="custom.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
        <!--Load the Ajax API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>

<body>
<div class="container">
     <div class="right_col" role="main" >
          <div class="row tile_count">
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"> Total Visitors</span>
						<div class="count"><?php foreach($pdo->query( 'CALL totalvisitors();' ) as $row){ if (!empty($row['SUM(visitors)'])){ echo $row['SUM(visitors)'];} else {echo "0"; }} ?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL totalvisitors();' ) as $row);
									foreach($pdo->query( 'CALL thismonth();' ) as $rows);
										$percent = ( $row['SUM(visitors)'] / $rows['visitors']) * 100;

								if ($percent < 10) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> from this year</span>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"></i> This year <?php echo "(".date("Y").")"?></span>
						<div class="count"><?php foreach($pdo->query( 'CALL thisyear();' ) as $row){ if (!empty($row['total'])){ echo $row['total'];} else {echo "0"; }}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL totalvisitors();' ) as $row);
										foreach($pdo->query( 'CALL thismonth();' ) as $rows);
											$percent = ( $rows['visitors']  / $row['SUM(visitors)']) * 100;

								if ($percent < 10) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> From this month</span>

				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"></i> This month <?php echo "(".date("M").")"?></span>
						<div class="count"><?php foreach($pdo->query( 'CALL thismonth()' ) as $row){  if (!empty($row['visitors'])){ echo $row['visitors'];} else {echo "0"; }}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL lastmonth();' ) as $row);
										foreach($pdo->query( 'CALL thismonth();' ) as $rows);
											$percent = ( $rows['visitors'])  / $row['SUM(visitors)'] * 100;

								if ($percent < 50) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>';}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> then last month</span>

				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"> This week <?php echo "(".date("W").")"?></span>
						<div class="count"><?php foreach($pdo->query( 'CALL week();' ) as $row){ if (!empty($row['SUM(visitors)'])){ echo $row['SUM(visitors)'];} else {echo "0"; }}?></div>
							<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL week();' ) as $row);
										foreach($pdo->query( 'CALL thismonth();' ) as $rows);
											$percent = ( $row['SUM(visitors)'] / $rows['visitors']) * 100;

								if ($percent < 25) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> Of this month</span>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Today <?php echo "(".date("D").")"?></span>
					<div class="count"><?php foreach($pdo->query( 'call today();' ) as $row){ if (!empty($row['today'])){ echo $row['today'];} else {echo "0"; }} ?></div>
						<span class="count_bottom">
								<?php foreach($pdo->query( 'CALL today();' ) as $row);
										foreach($pdo->query( 'CALL thismonth();' ) as $rows);
											$percent = ( $row['today'] / $rows['visitors']) * 100;

								if ($percent < 10) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> from this week</span>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top">Avg visitors</span>
					<div class="count"><?php foreach($pdo->query( 'Select ROUND (AVG (visitors)) AS avg from visitor;' ) as $row) { if (!empty($row['avg'])){ echo $row['avg'];} else {echo "0"; }}?></div>
					<span class="count-bottom">
													<?php foreach($pdo->query( 'CALL totalvisitors();' ) as $row);
										 				foreach($pdo->query( 'SELECT SUM(visitors) as his from visitor where organisation LIKE "%skola%" OR "%his%" OR "%högskola%";' ) as $rows);
															$percent = ( $rows['his'] / $row['SUM(visitors)'] ) * 100;


								if ($percent < 10) {
									echo '<i class="fa fa-sort-desc"></i><i class="red">'. number_format ($percent,1).'%','</i>' ;}
								else {
									echo '<i class="fa fa-sort-asc"></i><i class="green">'. number_format ($percent,1).'%','</i>';}?> from H.I.S</span>

				</div>
			</div>
		</div>
	</div>

<div class="container">
	<div class="row ">
		<div class="col-xs-4">
			<div class="form-group">
				<table class = "table table-hover">
          <!--
					<h3>Top visitors <i class="fa fa-star" aria-hidden="true"></i></h3>
						<thead>
							<tr>
								<th>Organisation</th>
								<th>Visitors</th>
							</tr>
						</thead>!-->
			<tbody>

				<?php		/*
					foreach($pdo->query( 'SELECT organisation, SUM( visitors ) AS visitors FROM visitor GROUP BY organisation ORDER BY SUM( visitors ) DESC LIMIT 5;' ) as $row)
					{

					echo '<tr><td>'.$row['organisation'].'</td>';
					echo '<td>'.$row['visitors'].'</td></tr>';
				}*/
				?>

			</tbody>
		</table>
	</div>
</div>
</div>
<?php
include 'dbconnect.php';
/*
    $result = $pdo->query("SELECT

    SUM(IF(MONTH = 01, numRecords, NULL)) AS 'January',
    SUM(IF(MONTH = 02, numRecords, NULL)) AS 'Feburary',
    SUM(IF(MONTH = 03, numRecords, NULL)) AS 'March',
    SUM(IF(MONTH = 04, numRecords, NULL)) AS 'April',
    SUM(IF(MONTH = 05, numRecords, NULL)) AS 'May',
    SUM(IF(MONTH = 06, numRecords, NULL)) AS 'June',
    SUM(IF(MONTH = 07, numRecords, NULL)) AS 'July',
    SUM(IF(MONTH = 08, numRecords, NULL)) AS 'August',
    SUM(IF(MONTH = 09, numRecords, NULL)) AS 'September',
    SUM(IF(MONTH = 10, numRecords, NULL)) AS 'October',
    SUM(IF(MONTH = 11, numRecords, NULL)) AS 'November',
    SUM(IF(MONTH = 12, numRecords, NULL)) AS 'December'

    FROM (
        SELECT  MONTH(dt) AS MONTH, SUM(visitors) AS numRecords
        FROM visitor
        GROUP BY  MONTH
    ) AS permonth;");
*/
 $result = $pdo->query("SELECT DATE_FORMAT(dt, '%M') AS month, SUM(visitors) as visitors from visitor GROUP BY DATE_FORMAT(dt, '%m') ");
      $rows = array();
      $table = array();
      $table['cols'] = array(

        array('label' => 'Month', 'type' => 'string'),
        array('label' => 'Visitors', 'type' => 'number')

	);

        foreach($result as $row) {

		//	print_r ($row);

			$temp = array();

			$temp[] = array('v' =>  $row['month']);
			$temp[] = array('v' =>  $row['visitors']);

			$rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;

    ?>
    <div class="col-1-2">
	<div id="chart_div" class="chart"></div>
</div>
			<div class="row">
				<div class="col-xs-8">
				<div class="form-group">

						<h3>Add visitor <i class="fa fa-user-plus" aria-hidden="true"></i></h3>
							<form class="form" method="post" role="form" action="visitorinsert.php">

									<?php
											if (!empty($_GET['successmessage'])) {

												$msg=$_GET['successmessage'];
												echo '<div class="alert alert-success">',$msg,'</div>';
											}

											else {
													echo "<div class='alert alert-info form-group'>";
													echo "Add visitors that have been entering the library";
													echo "</div>";
											}
									?>
							</div>
						</div>
				</div>

					<div class="row">
						<div class="col-xs-4  pull-left">
							<div class="form-group">

								<input type="text" class="form-control" id="vname" name="vname" placeholder="Name"/>
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">

								<input type="text" class="form-control" id="organisation" name="organisation" placeholder="Organisation"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 pull-left">
							<div class="form-group">

								<input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">

								<input type="number" class="form-control" id="visitors" name="visitors" placeholder="Number of visitors"/>
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">

								<input type="email" class="form-control" id="email" name="email" placeholder="Email"/>
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">
								<a href="visitorexcel.php" "target="_blank"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Export visitors to excel</button></a>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>


				</form>
			</div>
		</div>
	</body>
	        <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);

          var options = {
               title: 'Visitors per month',
              is3D: 'false',
			  backgroundColor: 'transparent',
			  chartArea : { left: '5%', top: '8%',bottom: '8%', width: '70%', height: '70%' },
			  pointSize: 5,
              width: '100%',
              height: 300
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        $(window).resize(function(){
  drawChart();
});
        </script>
</html>
