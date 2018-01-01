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

			

			$email_from = "Contact Form";
			$to = 'vampredfire44@gmail.com'; 
			$email_subject = "New Form Submission";
			$email_body = "From: $name\n Email: $email\n Message:\n $message "; 

			mail($to, $email_subject, $email_body, $email_from); 

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
