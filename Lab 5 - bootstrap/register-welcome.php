<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DarkDanito Vacation Rentals</title>
       
        <link href="CSS/pewpew.css" rel="stylesheet" media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="CSS/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
    </head>

    <?php
	include "header.inc.php";
	?>

    <body>
    
    <?php
		session_start();
		
		if ((!isset($_SESSION['register-process'])) && (!isset($_SESSION['register-welcome'])))
		{
			header('Location: index.php');
		}
		if (isset($_SESSION['register-process']))
		{
			unset($_SESSION['register-process']);
		}
		if (!isset($_SESSION['regoster-welcome']))
		{
			$_SESSION['regoster-welcome'] = '';
		}
		
		$first = '';
		$last = '';
		$email = '';
		$privacy = 'No';
		
		if (isset($_SESSION['fName']))
		{
			$first = $_SESSION['fName'];
		}
		if (isset($_SESSION['lName']))
		{
			$last = $_SESSION['lName'];
		}
		if (isset($_SESSION['email']))
		{
			$email = $_SESSION['email'];
		}
		if (isset($_SESSION['agree']))
		{
			$privacy = $_SESSION['agree'];
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
            	<h2>My Account</h2>
                <p>Welcome <?php echo $first . ' ' . $last; ?>.</p>
                
                <div class="well">
                	<p>Email: <strong><?php echo $email; ?></strong></p>
                    <p>First Name: <strong><?php echo $first; ?></strong></p>
                    <p>Last Name: <strong><?php echo $last; ?></strong></p>
                    <p>Agreed to privacy policy?: <strong><?php echo $privacy; ?></strong></p>
                </div>
                
            </div>
            
        </div>
    </div>

	</body>
</html>
    <?php
	include "footer.inc.php";
	?>