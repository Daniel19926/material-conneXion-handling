 <?php 
include 'navbar.php';

$to = 'daniel.rosmark@gmail.com';

$subject = 'Support material conneXion handling';
$message = "<h3>Issue regarding: ".$_POST['issue']."</h3>"."<h3>Phone: ".$_POST['phone']."</h3>"."<h3>Message: </h3>".$_POST['message'];
$headers = "From: " . strip_tags($_SESSION['email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_SESSION['email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//$phone = $_POST['phone'];
//$issue = $_POST['issue'];


// mailfunktion sending confirmation
if (mail($to, $subject, $message, $headers))

header("location: support.php?successmessage=We will contact you as soon as possible");
else
header("location: support.php?errormessage=Something went wrong, please try again later");


?>