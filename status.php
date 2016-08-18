<?php 
include 'index.php';
include 'dbconnect.php';
$pdo = new PDO('mysql:dbname=material_conneXion;host=localhost', 'sqllab', 'Tomten2009');                                                            
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
foreach($pdo->query( 'CALL counttotalmaterials();' ) as $row){ 
echo "<div class='container'>";                                                          
echo "<table class = 'table table-striped'>";	
echo '<tr><br>';                                                                                                                                       
echo '<td><b>Stored materials: </b>'.$row['count(id)'].'</td>';    
}
foreach($pdo->query( 'CALL countmainlibrary();' ) as $row){                                                                                                                                     
echo '<td><b>Main library Skövde: </b>'.$row['count(id)'].'</td>';    
}  
foreach($pdo->query( 'CALL countmainlibrarytibro();' ) as $row){                                                                                                                                     
echo '<td><b>Main library Tibro: </b>'.$row['count(id)'].'</td>';    
}   
foreach($pdo->query( 'CALL countmetal();' ) as $row){ 
echo "<div class='container'>";                                                          
echo "<table class = 'table table-striped'>";	
echo '<tr>';                                                                                                                                       
echo '<td><b>Metals: </b>'.$row['count(category)'].'</td>';    
}  
foreach($pdo->query( 'CALL countpolymers();' ) as $row){                                                                                                                                   
echo '<td><b>Polymers: </b>'.$row['count(category)'].'</td>';    
} 
foreach($pdo->query( 'CALL countnaturals();' ) as $row){                                                                                                                                    
echo '<td><b>Naturals: </b>'.$row['count(category)'].'</td>';    
}   
foreach($pdo->query( 'CALL countprocess();' ) as $row){                                                                                                                                       
echo '<td><b>Process: </b>'.$row['count(category)'].'</td>';    
}  
foreach($pdo->query( 'CALL countglass();' ) as $row){                                                                                                                                      
echo '<td><b>Glass: </b>'.$row['count(category)'].'</td>';    
}     
foreach($pdo->query( 'CALL countcementbased();' ) as $row){                                                                                                                                     
echo '<td><b>Cement-based: </b>'.$row['count(category)'].'</td>';    
}    
foreach($pdo->query( 'CALL countcarbonbased();' ) as $row){                                                                                                                                       
echo '<td><b>Carbon-based: </b>'.$row['count(category)'].'</td>';    
}  

?>