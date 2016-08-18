<?php
include 'dbconfig.php';
include 'navbar.php';

function updateuser(){
		sleep(1);
		header('location: user.php?successmessage=Information updated');
		exit; }

function changeduser(){
		sleep(1);
		header('location: user.php?errormessage=Incorrect');
		exit; }
		
function checkpass(){
		sleep(1);
		header('location: user.php?errormessage=Incorrect current password');
		exit; }
		
function matchpass(){ 
		sleep(1);
		header('location: user.php?errormessage=The password do not meet the cirteria');
		exit; }
		
function newpass(){ 
		sleep(1);
		header('location: user.php?errormessage=Please enter a new password');
		exit; }
function match(){ 
		sleep(1);
		header('location: user.php?errormessage=The password do not match');
		exit; }

$currentpass = $_POST['currentpass'];
$hashAndSalt = $_SESSION['pass'];
$pass=$_POST['newpass'];

if (!password_verify($currentpass, $hashAndSalt)) {	 //Kontrollera nuvarande lösenord
checkpass();
}
elseif (($_POST['newpass'] !== $_POST['newpass2'])) { 
	match();
}
elseif (($_POST['newpass'] === $_POST['currentpass'])){
		newpass();
}

elseif (($_POST['newpass'] === $_POST['newpass2'])) { 
		if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pass)){ //reguljära uttryck. =Ser till att lösenordet följer en viss säkerhet
			matchpass();
		}				
	}	
if ($_POST['email']){
					$userupdate="update user set email=:email where username='".$_SESSION['username']."';";
					$stmt = $DB_con->prepare($userupdate);
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->execute();	
	
				}
			
					$hashAndSalt = password_hash($pass, PASSWORD_BCRYPT); // Hash och salt av lösenordet

					$userupdate="update user set pass=:newpass where username='".$_SESSION['username']."';";
					$stmt = $DB_con->prepare($userupdate);
					$stmt->bindParam(':newpass', $hashAndSalt, PDO::PARAM_STR);
					$stmt->execute();	
					Updateuser();

					
?>