<html> 
	<head> 
		<title>PHP Test</title>
	</head>
	<body> 
		<?php 
			$name = $_POST['name']; 
			$visitor_email = $_POST['email']; 
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			/*Validation*/
			if(empty($name)||empty($visitor_email)||empty($message)) 
			{
			    echo "Name, email, and message are mandatory!";
			    exit;
			}

			if(IsInjected($visitor_email))
			{
			    echo "Bad email value!";
			    exit;
			}

			

			$email_from = "vampredfire44@gmail.com";
			$email_subject = "New Form Submission";
			$email_body = "You have received a new message from the user $name.\n Here is the message:\n $message"; 

			$to = "vampredfire44@gmail.com"; 
			$headers = "From: $email_from \r\n"; 
			$headers .= "Reply-To: $visitor_email \r\n"; 
			mail($to, $email_subject, $email_body, $headers); 

			//done. redirect to thank-you page.
			header('Location: index.html');
			/*@TODO: make a thank you pop up*/ 


			/*isInjected code taken from http://form.guide/email-form/php-form-to-email.html*/
			function IsInjected($str)
			{
			  $injections = array('(\n+)',
			              '(\r+)',
			              '(\t+)',
			              '(%0A+)',
			              '(%0D+)',
			              '(%08+)',
			              '(%09+)'
			              );
			  $inject = join('|', $injections);
			  $inject = "/$inject/i";
			  if(preg_match($inject,$str))
			    {
			    return true;
			  }
			  else
			    {
			    return false;
			  }
			}
		?> 

	</body>
</html>
