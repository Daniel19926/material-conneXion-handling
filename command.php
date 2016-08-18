<?php

function materialadded(){
		sleep(1);
		header('location: addmaterial.php?successmessage=Material added to library!');
		exit; }

function error(){
		sleep(1);
		header('location: addmaterial.php?errormessage=Something went wrong trying to store the material');
		exit; }

function userdemand(){
		sleep(1);
		header('location: addmaterial.php?errormessage=ID is in incorrect format input');
		exit; }
		

function materialupdate(){
		sleep(1);
		header('location: updatematerial.php?successmessage=Material is updated!');
		exit; }

function userdemand(){
		sleep(1);
		header('location: updatematerial.php?errormessage=ID is in incorrect format input');
		exit; }

function wrongmaterial(){
		sleep(1);
		header('location: updatematerial.php?errormessage=Material ID does not exist in database');
		exit; }
		
?>