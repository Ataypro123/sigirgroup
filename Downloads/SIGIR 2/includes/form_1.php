<?php	
	if (empty($_POST['name']) && strlen($_POST['name']) == 0 || empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['message']) && strlen($_POST['message']) == 0)
	{
		return false;
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$input_1699 = $_POST['input_1699'];
	$input_2444 = $_POST['input_2444'];
	$input_384 = $_POST['input_384'];
	$select_571 = $_POST['select_571'];
	$select_454 = $_POST['select_454'];
	$input_2878 = $_POST['input_2878'];
	$input_322 = $_POST['input_322'];
	$optin = $_POST['optin'];
	
	$to = 'dzheenbekovatay@gmail.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\n".
				  "Name: $name \nEmail: $email \nMessage: $message \nInput_1699: $input_1699 \nInput_2444: $input_2444 \nInput_384: $input_384 \nSelect_571: $select_571 \nSelect_454: $select_454 \nInput_2878: $input_2878 \nInput_322: $input_322 \nOptin: $optin \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $email";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>