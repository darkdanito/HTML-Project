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
                    	<h2>Register Account</h2>
                        <p>If you already have an account with us, please login at the login page.</p>
                        
                        <div class="form-group">
                        	<label for="first" class="col-md-3 control-label">First Name</label>
                            <div class="col-md-9">
                            	<input type="text" class="form-control" name="first">
                                
                                <!--
                                <input type="text" class="form-control" name="first" required>
                                -->
                                
                            </div>
                        </div>
                        
                         <div class="form-group">
                        	<label for="last" class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-9">
                            	<input type="text" class="form-control" name="last">
                            </div>
                            
                            <!--
                            <input type="text" class="form-control" name="last" required>
                            -->
                            
                        </div>   
                        
                        <div class="form-group">
                        	<label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                            	<input type="email" class="form-control" name="email">
                            </div>
                        </div>                        
						
						<!--
                        <input type="email" class="form-control" name="email" required pattern="(.+)@([^\.].*)\.([a-z]{2,})">
                        -->

                        <div class="form-group">
                        	<label for="password1" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                            	<input type="password" class="form-control" id="password1" name="password1" > 
                            </div>
                        </div>                                                

						<!--
                        <input type="password" class="form-control" id="password1" name="password1" required pattern="\w{8,}" title="Passsword must contain at least 8 alphanumeric characters">
                        -->
                        
                        <div class="form-group">
                        	<label for="password2" class="col-md-3 control-label">Password Confirm</label>
                            <div class="col-md-9">
                            	<input type="password" class="form-control" id="password2" name="password2" required> 
                            </div>
                        </div>  
                        
                        <!--
                        <input type="password" class="form-control" id="password2" name="password2" required>
                        -->

                        <div class="form-group">
                        	 <div class="col-md-offset-3 col-md-9">
								<div class="checkbox">
                                	<label>
                                    	<input type="checkbox" name="privacy" required> I agree to thhe <a href="#">privacy policy</a>
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
    <?php
	include "footer.inc.php";
	?>