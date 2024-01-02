<?php
$errors = '';
$myemail = 'shreehospitalravet@gmail.com';
if(empty($_POST['dept']) ||
   empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['age']) ||
   empty($_POST['date']))
{
    $errors .= "\n Error: all fields are required";
}

$dept = $_POST['dept'];
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$date = $_POST['date'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail;
	$email_subject = "Appointment Request!!: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Phone \n $phone \n Age: $age \n Date $date";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: appointment-thanks.html');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
