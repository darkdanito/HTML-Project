<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>

    <body>
    
 	<?php 
		session_start();
		
		if ((!isset($_SESSION['register'])) && (!isset($_SESSION['register-process'])))
		{
			header('Location: index.php');
		}
		if (isset($_SESSION['register']))
		{
			unset($_SESSION['register']);
		}
		if (!isset($_SESSION['register-process']))
		{
			$_SESSION['register-process'] = '';
		}
		
		$fNameOk = false;
		$lNameOk = false;
		$emailOk = false;
		$pwd1Ok = false;
		$pwd2Ok = false;
		$privOk = false;
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (isset($_POST['first']))
			{
				$fName = trim($_POST['first']);
				if (!empty($fName))
				{
					if (!empty($fName))
					{
						if ($fName != 'Please do not leave your First Name empty.')
							$fNameOk = true;
					}
				}
				
				if (isset($_POST['last']))
				{
					$lName = trim($_POST['last']);
					if (!empty($lName))
					{
						if ($lName != 'Please do not leave your Last Name Empty.')
						$lNameOk = true;
					}
				}
				
				if (isset($_POST['email']))
				{
					$email = trim($_POST['email']);
					$emailPattern = '/(.+)@([^\.].*)\.([a-z]{2,})/';
					$emailOk = preg_match($emailPattern, $email);
				}
				
				if (isset($_POST['password1']))
				{
					$passwd1 = $_POST['password1'];
					$pwdPattern = '/\w{8,}/';
					$pwd1Ok = preg_match($pwdPattern, $passwd1);	
				}
				
				if (isset($_POST['password2']))
				{
					if ($pwd1Ok)
					{
						$passwd2 = $_POST['password2'];
						$pwd2Ok = ($passwd1 == $passwd2);
					}
				}
				
				if (isset($_POST['privacy']))
				{
					$privacy = $_POST['privacy'];
					if ($privacy == 'on')
					{
						$privOk = true;
					}
				}
				
				if ($fNameOk && $lNameOk && $emailOk && $pwd1Ok && $pwd2Ok && $privOk)
				{
					require_once('../../../protected/config.php');
					$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
					
					$salt = bin2hex(mcrypt_create_iv(12,MCRYPT_DEV_URANDOM));
					$hashpwd = hash('sha256',$passwd1.$salt);
					$sql = "INSERT INTO account (firstName, lastName, email, password, salt) VALUES (?,?,?,?,?)";
					
					if ($statement = mysqli_prepare($connection, $sql))
					{
						mysqli_stmt_bind_param($statement,'sssss',$fName,$lName,$email,$hashpwd,$salt);
						mysqli_stmt_execute($statement);
					}
					
					$_SESSION['fName'] = $fName;
					$_SESSION['lName'] = $lName;
					$_SESSION['email'] = $email;
					$_SESSION['agree'] = 'Yes';
					header('Location: register-welcome.php');


				}
			}
		}
		
	?>
    
    <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-3">
            	<div class="panel panel-default">
                	
                    <div class="panel-heading">
                    	Account
                    </div>
                    
                    <div class="panel-body">
                    	<ul class="nav nav-pills nav-stacked">
                        	<li><a href="#">Login</a></li>
                            <li class="active"><a href="#">Register</a></li>
                            <li><a href="#">Recover Password</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-9">
            	
                <form class="form-horizontal" action="register-process.php" method="post" id="registrationForm">
                	
                    <h2>Register Account</h2>
                    <p>If you already have an account with us, please login at the login page.</p>
                    
                    <div class="form-group <?php if ($fNameOk) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<label for="first" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                        	<input type="text" class="form-control" id="first" name="first" required
                            	value="<?php if ($fNameOk) {echo $fName;} else {echo 'Please do not leave your First Name empty.';} ?>">
							<span class="glyphicon <?php if ($fNameOk) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group <?php if ($lNameOk) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<label for="last" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                        	<input type="text" class="form-control" id="last" name="last" required
                            	value="<?php if ($lNameOk) {echo $lName;} else {echo 'Please do not leave your Last Name empty.';} ?>">
							<span class="glyphicon <?php if ($lNameOk) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group <?php if ($emailOk) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                        	<input type="text" class="form-control" id="email" name="email" required pattern="(.+)@([^\.].*)\.([a-z]{2,})"
                            	value="<?php if ($emailOk) {echo $email;} else {echo 'Please enter a valid Email address.';} ?>">
							<span class="glyphicon <?php if ($emailOk) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group <?php if ($pwd1Ok) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<label for="password1" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="<?php if ($pwd1Ok) {echo 'password';} else {echo 'text';} ?>" class="form-control" id="password1" name="password1" required pattern="\w{8,}" title="Password must contain at least 8 alphanumeric characters"
                            	value="<?php if ($fpwd1Ok) {echo $passwd1;} else {echo 'Please enter a Password with at least 8 alphanumeric characters.';} ?>">
							<span class="glyphicon <?php if ($pwd1Ok) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php if ($pwd2Ok) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<label for="password2" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                        	<input type="<?php if ($pwd2Ok) {echo 'password';} else {echo 'text';} ?>" class="form-control" id="password2" name="password2" required
                            	value="<?php if ($fpwd2Ok) {echo $passwd2;} else {echo 'Please enter a matching Password as above';} ?>">
							<span class="glyphicon <?php if ($pwd2Ok) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group <?php if ($privOk) {echo 'has-success';} else {echo 'has-error';} ?> has-feedback">
                    	<div class="col-md-offset-3 col-md-9">
                        	<div class="checkbbox">
                            	<label>
                                	<input type="checkbox" id="privacy" name="privacy" required <?php if ($privOk) echo 'checked'; ?>> I agree to the <a href="#">privacy policy</a>
                               			<?php if (!$privOk) {echo ' - Please check the box to agree. ';} ?>
                                    <span class="glyphicon <?php if ($privOk) {echo 'glyphicon-ok';} else {echo 'glyphicon-remove';} ?> form-control-feedback"></span>
                                </label>
                            </div>	
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<div class="col-md-offset-3 col-md-9">
                        	<button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                                        
                </form>
                
            </div>
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    </body>
</html>