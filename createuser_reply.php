<?php

include 'dbconnect.php';



	function wrongpass(){ //Funktion som skickar tillbaka användaren till föregående sida. Körs bara när den kallas
		sleep(1);
		header('location: createuser.php?errormessage=The password do not match');
		exit; }
		
	function matchpass(){ 
		sleep(1);
		header('location: createuser.php?errormessage=The password do not meet the cirteria');
		exit; }

	function wrongmail(){
		sleep(1);
		header('location: createuser.php?errormessage=The email already exists');
		exit; }
		
	function wronguser(){
		sleep(1);
		header('location: createuser.php?errormessage="The username already exists');
		exit; }
		
	function wrongrole(){
		sleep(1);
		header('location: createuser.php?errormessage=There is no such role: Admin, User or Guest');
		exit; }
	function usercreated(){
		sleep(1);
		header('location: createuser.php?successmessage=User created!');
		exit; }
	function userdemand(){
		sleep(1);
		header('location: createuser.php?errormessage=Username example: Anders.Andersson');
		exit; }

	if (($_POST['pass'] === $_POST['pass2'])) { //Kollar att att lösenorden är lika
		$pass = $_POST['pass'];
		if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pass)){ //reguljära uttryck. =Ser till att lösenordet följer en viss säkerhet
			matchpass();
		}
		else{
	
			$username = $_POST['username']; //Kollar om användaren finns i databasen
			$searchqueryuser = $pdo->prepare("SELECT username FROM user WHERE username= :username");
			$searchqueryuser->bindParam(':username', $username);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() > 0){
				wronguser(); //körs om användare finns
			} else { 
		
		
			$role = $_POST['role']; //Kollar om användaren finns i databasen
			$searchqueryuser = $pdo->prepare("SELECT role FROM role WHERE role= :role");
			$searchqueryuser->bindParam(':role', $role);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() < 1){
				wrongrole(); //körs om role inte finns i databas
			} else { //Kollar om emailen finns i databasen

				$email = $_POST['email'];
				$searchqueryemail = $pdo->prepare("SELECT email FROM user WHERE email= :email");
				$searchqueryemail->bindParam(':email', $email);
				$searchqueryemail->execute();
				if($searchqueryemail->rowCount() > 0){
					wrongmail();//körs om email finns
				} else { //Lägger till användaren
					$pass = $_POST['pass'];
					$hashAndSalt = password_hash($pass, PASSWORD_BCRYPT);
					
					$insertqueryuser='INSERT INTO user (username,pass,email,role) VALUES(:username,:pass,:email,:role);';
					$stmt = $pdo->prepare($insertqueryuser);
					$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->bindParam(':pass', $hashAndSalt, PDO::PARAM_STR);
					$stmt->bindParam(':role', $_POST['role'], PDO::PARAM_STR);
					$stmt->execute();	
					usercreated();
				}
				}
			}
		}
		
	}

		 else{
		wrongpass(); //körs om lösenorden inte är lika
	}

	
?>

</div>

</body>
</html>
