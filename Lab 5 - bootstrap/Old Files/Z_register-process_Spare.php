<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>

    <body>
    
    register-proccess.php
    
	<?php
	
	$nameValid = "";
	$email = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (isset($_POST["necroName"]) && isset($_POST["pwd2"]) && isset($_POST["necroLastName"]) && isset($_POST["necroEmail"]) ) {
			$name = trim($_POST["necroName"]);
			if (empty($name)) {
				$nameValid = true;
			}
			else {
				$nameValid = true;
			}

			$passwd = $_POST["pwd2"];
			$passwdPattern = "/\w{8,}/";
			$passwdValid = preg_match($passwdPattern, $passwd);
			
			$name = trim($_POST["necroLastName"]);
			if (empty($name)) {
				$nameValid2 = false;
			}
			else {
				$nameValid2 = true;
			}
			
			
			$email = $_POST["necroEmail"];
			$emailPattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
			$emailValid = preg_match($emailPattern, $email);
			
		}
		else
		{
			echo $_POST["pwd1"];
		}
		
		if ($nameValid && $passwdValid && $nameValid2 )
			{
				header('Location: success.php');
				echo $_POST["necroName"];
			}
		else 
		{
			echo $_POST["necroName"];
			}
		
	}
	
	?>
    
    
    </body>
</html>