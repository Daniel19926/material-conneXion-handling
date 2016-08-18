<?php
include 'dbconnect.php';


session_start();
	
	function wrongmail(){ //Funktion som skickar tillbaka användaren till föregående sida. Körs bara när den kallas
		sleep(1);
		header('location: login.php?errormessage=Incorrect username');
		exit; }
		
	function wrongpass(){
		sleep(1);
		header('location: login.php?errormessage=Incorrect password');
		exit; }
		
			$username = $_POST['username'];
			$pass = $_POST['pass'];

			
			$stmt = $pdo->prepare("SELECT role from user WHERE username= :username");
			$stmt->bindParam(':username', $username); 
			$stmt->execute();
			$role = $stmt->fetch(PDO::FETCH_COLUMN);// Hämta användarens roll 
			
			$stmt = $pdo->prepare("SELECT email from user WHERE username= :username");
			$stmt->bindParam(':username', $username); 
			$stmt->execute();
			$email = $stmt->fetch(PDO::FETCH_COLUMN);				
			
			 //Kollar om användaren finns i databasen
			$searchqueryuser = $pdo->prepare("SELECT username  FROM user WHERE username= :username");
			$searchqueryuser->bindParam(':username', $username);
			$searchqueryuser->execute();
			if($searchqueryuser->rowCount() < 1){
				wrongmail(); //körs om användare finns
			} else {
			$stmt = $pdo->prepare("SELECT pass  FROM user WHERE username= :username");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			$hashAndSalt = $stmt->fetch(PDO::FETCH_COLUMN);	
			if($stmt->rowCount() > 1){
			wrongpass(); //körs om det är fel lösenord
			}
			if (password_verify($pass, $hashAndSalt)) {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['role'] = $role;
			$_SESSION['pass'] = $hashAndSalt;
			$_SESSION['email'] = $email;
			header("location: index.php");
			}

			else{
			session_write_close();
			wrongpass();
			exit();
		}
	}
?>