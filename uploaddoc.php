<?php
include 'navbar.php';
include 'dbconnect.php';
include 'dbconfig.php';
?>
<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>
<html>
   <body>
		<div class='container'>
			<div class='row'>
				<div class='col-md-6'>
					<div class = 'form-group'>
<?php
function docadded(){
		sleep(1);
		header('location: uploaddoc.php?successmessage=Document added');
		exit; }

function wrongformat(){
		sleep(1);
		header('location: uploaddoc.php?errormessage=Extension not allowed, please choose a PDF, JPG or PNG file.');
		exit; }

function docexists(){
		sleep(1);
		header('location: uploaddoc.php?errormessage=This file exists, choose a different name');
		exit; }
		

		
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
					echo 'Add delivery documents';
					echo '</div>';
			}
			
		
?>
			</div>
		</div>
	</div>
	<form action="uploaddoc.php" class="form" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-3">
		<div class = "form-group">
			
			
				<input type="text" id="id" class="form-control" name="id" placeholder="Signature" maxlength="7" required = "required" />
			</div>
		</div>
    <div class="form-group">
        <div class="col-xs-3 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control" name="date" placeholder="Delivery date" />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    </div>
	<div class='row'>
		<div class='col-md-6'>
			<div class = 'form-group'>
				
					<input type="file" name="image" id="file" class="inputfile" />
					<label for="file" class="btn btn-success">Choose file <i class="fa fa-upload" aria-hidden="true"></i></label>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				
			</div>
		</div>
	</div>
	</form>

<?php
/****** upload files ****/
/*
   if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("pdf","jpg","png");
   
      if(in_array($file_ext,$expensions)=== false){
         wrongformat();
      }
	   /*
		if (file_exists('/files'.$file_name)) {

		docexists();
		}*/
/*		
      else{
			move_uploaded_file($file_tmp,"files/".$file_name);
			docadded();
      }
   }
 */
/******* retrive files ****/
/*
	$path    = './files';
	$files = scandir($path);
	$files = array_diff(scandir($path), array('.', '..'));

		foreach($files as $file){
			
			echo "<table class = 'table table-striped'>";	
			echo'<tr><object data><a target="_blank" type="application/pdf" href=".files/'.$file.'">'.$file.'</a></tr>';
		}*/
?>
<?php



 foreach($pdo->query( 'SELECT * from pdf' ) as $row){ 
		
echo '<table class="table table-bordered">';	
	echo '<thead class="cf">';
		echo '<tr>';
            echo '<th>Name</th>';
			echo '<th>Date</th>';
            echo '<th>Type</th>';
            echo '<th>Size</th>';
            echo '<th>Signature</th>';
		echo '</tr>';
	echo '</thead>';
		
	echo '<tbody>'; 		
        echo '<tr>';
			echo '<td>'.$row['file'].'</td>';
			echo '<td>'.$row['type'].'</td>';
			echo '<td>'.$row['size'].'</td>';
			echo '<td><a target="_blank" href="files/'.$row['file'].'">view file</a></td></tr>';
	

	echo '</tbody>'; 
echo '</table>';
 }

 
if(isset($_FILES['image'])){
 
     
 $file = rand(1000,100000)."-".$_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
 $file_size = $_FILES['image']['size'];
 $file_type = $_FILES['image']['type'];
 $folder="files/";
 
  // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file)){
 //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 $insertpdf="INSERT INTO pdf(file, type, size, signature) 
					VALUES(:file, :type, :size, :signature);";
					$stmt = $DB_con->prepare($insertpdf);
					$stmt->bindParam(':file', $final_file, PDO::PARAM_STR);
					$stmt->bindParam(':type', $file_type, PDO::PARAM_STR);
					$stmt->bindValue(':size', $file_size, PDO::PARAM_INT);
					$stmt->bindParam(':signature', $_POST['signature'], PDO::PARAM_STR);
					$stmt->execute();
 
}}
?>
    </div>	

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'yyyy-mm-dd',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
		</div>
	</body>
</html>