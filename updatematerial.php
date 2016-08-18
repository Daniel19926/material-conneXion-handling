<?php
include 'dbconfig.php';
include 'navbar.php';

?>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" media='all' />
</head>

	<div class="container">
		<div class="controls">
			<form class="form" action="updatematerial_reply.php" method="post">  
				<h3 class="form-signin-heading">Update material <i class="fa fa-refresh" aria-hidden="true"></i></h3>
					<div class="row">  
						<div class="col-xs-12">	
							<div class="form-group"> 
							
					<?php
							if (!empty($_GET['successmessage'])) { 

								$msg=$_GET['successmessage'];
								echo '<div class="alert alert-success">',$msg,'</div>';	
							}

							else if (!empty($_GET['errormessage'])) { 
	
									$msg=$_GET['errormessage'];
									echo '<div class="alert alert-danger">',$msg,'</div>';
							}
							
							else {
									echo '<div class="alert alert-info">';
									echo 'Change location and status on material';
									echo '</div>';
							}
					?>
					
						</div>
					</div>
				</div>
				
				<div class="row">  
					<div class="col-xs-6">	
						<div class="form-group"> 
							<fieldset id="form">			
									<div id="imaginary_container"> 
										<div class="input-group stylish-input-group">
											<input type="tel"  id="id" class="form-control" name="id" placeholder="MC#" maxlength="7" required = "required" value="">
												<span class="input-group-addon">
													<button type="submit" id="import"  name="import" >
														<span class="glyphicon glyphicon-search"></span>
													</button>  
												</span>
										</div>
									</div>
								</div>
							</div>
							
					<div class="col-xs-6">
						<div class="form-group">
							<select required="required" name="matstatus" class="category form-control" >
								<option value="" selected="selected">Select reason</option>
								<option>Structuring library shelfs</option>
								<option>Material on event</option>
								<option>Return material to supplier</option>
								<option>Material moved to storage</option>
								<option value="other">Other</option>
							</select>
						</div>
					</div>
				</div>
				
			
					
			

		<div id="editContent">
			<div id="fupdate">
				<div class="row">
					<div class="col-xs-6">	
						<div class="form-group">
							<select required data-nr="0" name="placename" id="location" class="form-control">
								<option value="" selected="selected">Location</option>
							</select>
						</div>
					</div>
					
					
					<div class="col-xs-6">	
						<div class="form-group">
							<select required data-nr="1" name="placeposition" id="library" class="form-control">
								<option value="" selected="selected">Library</option>
							</select>
						</div>
					</div>
				</div>
			
			<div class="row">
				<div class="col-xs-6">	
					<div class="form-group">
						<select required data-nr="2" name="shelfname" id="shelf" class="form-control">
							<option value="" selected="selected">Shelf</option>
						</select>
					</div>
				</div>
				
				<div class="col-xs-6">	
					<div class="form-group">
						<select required data-nr="3" name="rownumber" id="rownumber" class="form-control">
							<option value="" selected="selected">Row</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6">	
					<div class="form-group">
						<select required data-nr="4" name="position" id="position" class="form-control">
							<option value="" selected="selected">Position</option>
						</select>
					</div>
				</div>
				
				<div class="col-xs-6">	
						<div class="form-group">
							<div id="othersnote">
								<input name="notes" class="form-control" type="text" placeholder="Specify selection 'Others'"/>
							</div>
						</div>
					</div>
			</div>
	
	
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<button class="btn btn-primary" name="submit" type="submit">Submit</button>  
					</div>
				</div>
			</div>
		</div>
	</div>
</fieldset>
</form>

</div>
</div>

<script type="text/javascript">

	var editLevel = 5;
	var data = null;

	var buildSelect = function(clean) {
		console.log(data);

		var id = $( "#id" ).val();

		var data_placename = [];
		var data_placeposition = [];
		var data_shelfname = [];
		var data_rownumber = [];
		var data_position = [];	

		var ref = {};
		if(clean){

	  		$.each(data, function(i, item) {
	  			if(item.id === id){
					ref = item;
	  			}
			});
	  		console.log(ref);

	  		$('#fupdate').find('select').each(function(i, item) {
	  			$(item).html('<option value="'+ref[i]+'" selected>' + ref[i] + '</option>');
	  		});

		} else {
			ref = {};
			$('#fupdate').find('select').each(function(i, item) {
				if((editLevel-1) >= i){
					ref[i] = $(item).val();
				}
				
	  		});

	  		$('#fupdate').find('select').each(function(i, item) {

	  			if(ref.hasOwnProperty(i)){
					$(item).html('<option value="'+ref[i]+'" selected>' + ref[i] + '</option>');
	  			} else {
					$(item).html('<option default>Select item</option>');

					if(editLevel >= i){
						$(item).prop('disabled', false);
					} else {
						$(item).prop('disabled', 'disabled');
						
					}
	  			}
	  			
	  		});

		}

		$('#fupdate').find('select').each(function(i, item) {

				switch(i) {
			    case 0:
			    	if(editLevel >= i){

						$.each(data, function(i, item) {
							if(jQuery.inArray( item.placename, data_placename) == -1){
								data_placename.push(item.placename);
							}
						});
						console.log(data_placename);

						$.each( data_placename, function( i, val){
							if($(item).val() !== val){
								$(item).append('<option value="' + val + '" >' + val + '</option>');
							}
						});

			    	}
   
			        break;
			    case 1:
			    	if(editLevel >= i){

				   	 	$.each(data, function(i, item) {
							if(
								ref[0] === item.placename &&
								 (jQuery.inArray( item.placeposition, data_placeposition) == -1)
								){
								data_placeposition.push(item.placeposition);
							}
						});
						console.log(data_placeposition);

				       $.each( data_placeposition, function( i, val){
							if($(item).val() !== val){
								$(item).append('<option value="' + val + '" >' + val + '</option>');
							}
						});

			   		}
			        break;
				case 2:
					if(editLevel >= i){

						$.each(data, function(i, item) {
							if(
								ref[0] === item.placename &&
								ref[1] === item.placeposition &&
								 (jQuery.inArray( item.shelfname, data_shelfname) == -1)
								){
								data_shelfname.push(item.shelfname);
							}
						});
						console.log(data_shelfname);

				        $.each( data_shelfname, function( i, val){
							if($(item).val() !== val){
								$(item).append('<option value="' + val + '" >' + val + '</option>');
							}
						});

				    }
			        break;
			    case 3:
			    	if(editLevel >= i){

				    	$.each(data, function(i, item) {
							if(
								ref[0] === item.placename &&
								ref[1] === item.placeposition &&
								ref[2] === item.shelfname &&
								 (jQuery.inArray( item.rownumber, data_rownumber) == -1)
								){
								data_rownumber.push(item.rownumber);
							}
						});
						console.log(data_rownumber);

				     	$.each( data_rownumber, function( i, val){
							if($(item).val() !== val){
								$(item).append('<option value="' + val + '" >' + val + '</option>');
							}
						});

				     }
			        break;
			    case 4:
			    	if(editLevel >= i){

				    	$.each(data, function(i, item) {
							if(
								ref[0] === item.placename &&
								ref[1] === item.placeposition &&
								ref[2] === item.shelfname &&
								ref[3] === item.rownumber &&
								 (jQuery.inArray( item.position, data_position) == -1)
								){
								data_position.push(item.position);
							}
						});
						console.log(data_position);

				        $.each( data_position, function( i, val){
							if($(item).val() !== val){
								$(item).append('<option value="' + val + '" >' + val + '</option>');
							}
						});

				    }
			        break;
			    default:  
			} 
	  	});

	};
	

	

	//var input = (category, location, library, shelf, rownumber, position);


	$( "#import" ).click(function() {

		$(this).prop('disabled', 'disabled');

		var id = $( "#id" ).val();

		$.getJSON( "updatematerial_reply.php", { get: "get", id: id } )
	  	.done(function( json ) {
	  		data = json;

	  		$("#editContent").show();

	  		buildSelect( true);
	  	});
	});

	$('#fupdate').find('select').change(function() {
  		editLevel = $(this).data('nr') + 1;

		buildSelect( false);
	});

	/* ********************************** */
	
	$('select[name=matstatus]').change(function () {
    if ($(this).val() == 'other') {
        $('#othersnote').show();
    } else {
        $('#othersnote').hide();
    }
});


</script>

<script type="text/javascript">

</script>




</body>
</html>
