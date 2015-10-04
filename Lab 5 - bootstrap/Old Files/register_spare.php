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
                  
                    <h2 class="form-signin-heading">Register Account</h2>
                    <p>If you already have an account with us, Please login at the login page.</p>
                    
				    <input type="text" class="form-control" placeholder="First Name" name="necroName" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
                      <input type="text" class="form-control" placeholder="Last Name" name="necroLastName" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
                    		<input type="email" class="form-control" placeholder="Email address" name="necroEmail">
                    	  <input type="password" class="form-control" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd1" onchange="form.pwd2.pattern = this.value;">
                    	<input type="password" class="form-control" placeholder="Password confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd2">
                    		 
                        <label class="checkbox">
                      <input type="checkbox" value="remember-me" required> I agree to the privacy policy
                    </label>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                 
  
                  </form>



			</div>

		</div>
	</div>

<!--

                  <form action="register-process.php" method="post">
                    <h2 class="form-signin-heading">Register Account</h2>
                    <p>If you already have an account with us, Please login at the login page.</p>
                    
                     
                    <div class="form-group form-group-lg">
                    	<label class="col-sm-2 control-label" for="formGroupInputLarge">First Name</label>
                        <div class="col-sm-7">
                           <input type="text" class="form-control" placeholder="First Name" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
                     	</div>
                    </div>
 
                    <div class="form-group form-group-lg">
                    	<label class="col-sm-2 control-label" for="formGroupInputLarge">Last Name</label>
                        <div class="col-sm-7">
                           <input type="text" class="form-control" placeholder="Last Name" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
                    	</div>
                    </div>

                    <div class="form-group form-group-lg">
                    	<label class="col-sm-2 control-label" for="formGroupInputLarge">Email address</label>
                        <div class="col-sm-7">
                           <input type="email" class="form-control" placeholder="Email address" required autofocus>
                    	</div>
                    </div>

                    <div class="form-group form-group-lg">
                    	<label class="col-sm-2 control-label" for="formGroupInputLarge">Password</label>
                        <div class="col-sm-7">
                           <input type="password" class="form-control" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd1" onchange="form.pwd2.pattern = this.value;">
                    	</div>
                    </div>
                    
                    <div class="form-group form-group-lg">
                    	<label class="col-sm-2 control-label" for="formGroupInputLarge">Password</label>
                        <div class="col-sm-7">
                           <input type="password" class="form-control" placeholder="Password confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd2">
                    	</div>
                    </div>                    
                                                        				
                    <label class="checkbox">
                      <input type="checkbox" value="remember-me" required> I agree to the privacy policy
                    </label>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                  </form>

-->


           
    </body>
</html>


    <?php
	include "footer.inc.php";
	?>
    