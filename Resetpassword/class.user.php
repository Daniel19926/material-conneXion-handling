<?php

require_once 'dbconfig.php';

class USER
{	

	private $con; 
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}

	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		//$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "mx1.hostinger.se";      
		$mail->Port       = 25;             
		$mail->AddAddress($email);
		$mail->Username="daniel@danielrosmark.me";  
		$mail->Password="grosso15";            
		$mail->SetFrom('daniel.rosmark@gmail.com','Material Handling');
		$mail->AddReplyTo("daniel.rosmark@gmail.com","Material Handling");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}