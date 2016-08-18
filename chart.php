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
 $result = $pdo->query("SELECT DATE_FORMAT(dt, '%W') AS month, SUM(visitors) as visitors from visitor GROUP BY DATE_FORMAT(dt, '%w') ");
      $rows = array();
      $table = array();
      $table['cols'] = array(

        array('label' => 'Month', 'type' => 'string'),
        array('label' => 'Visitors', 'type' => 'number')

	);

        foreach($result as $row) {
			
			print_r ($row);

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


    <html>
      <head>
        <!--Load the Ajax API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
              width: 800,
              height: 600
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
      </head>

      <body>
        <!--this is the div that will hold the pie chart-->
        <div id="chart_div"></div>
      </body>
    </html>

