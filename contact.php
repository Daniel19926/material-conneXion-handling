 <?php 
$to = "daniel.rosmark@gmail.com";
$from = $_SESSION["email"];
$subject = 'Supportärende Material Handling';
$phone = $_POST["phone"];
$name = $_SESSION["user"];
$message = $_POST["message"];

// HEADERS for subject and textkoding
$headers = "Content-Type: text/plain; charset=utf-8 \r\n";
$headers .= "From:".$name." ".$phone." <".$from.">"."\r\n";
$headers .= "MIME-Version: 1.0 \r\n";


// convert to UTF-8
$subject='=?UTF-8?B?'.base64_encode($subject).'?=';

// mailfunktion sending confirmation
if (mail($to, $subject, $message, $headers))

header("location: support.php?successmessage=We will contact you as soon as possible");
else
echo "location: support.php?errormessage=Something went wrong, please try again later";


?>