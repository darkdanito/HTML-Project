<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>

    <body>
    
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
            
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="#">Vacation Rentals</a> 
                           
            </div>    	
            
            <div class="navbar-collapse collapse">
				<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']);?>
                <ul class="nav navbar-nav">
               
               	<!--
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                -->
                
                    <li <?php if ($currentPage == "index.php") {echo 'class="active"';} ?>><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li <?php if ($currentPage == "topdest.php") {echo 'class="active"';} ?>><a href="topdest.php"><span class="glyphicon glyphicon-star"></span> Top Destinations</a></li>
                    <li <?php if ($currentPage == "register.php") {echo 'class="active"';} ?>><a href="register.php"><span class="glyphicon glyphicon-lock"></span> Book Tickets</a></li>
                  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> About Us<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Company Details</a></li>
                              <li><a href="#">Contact Us</a></li>
                            </ul>
                    </li>
                    
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
        
                </ul>
            </div> 
        </div>
    </div>
    
     <div class="container-fluid">
        <div class="jumbotron">
            <h1>Best Vacation Rentals</h1>
	        <p>Sed placerat fringilla quam et.</p>
 	        <p><a class="btn btn-primary btn-lg">Start Now!</a></p>
        </div>
    </div>
    
    </body>
</html>