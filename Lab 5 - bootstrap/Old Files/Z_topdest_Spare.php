<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>top destination</title>
        
        <link href="CSS/pewpew.css" rel="stylesheet" media="screen">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="CSS/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
    </head>

    <body>
    
    <?php
	include "header.inc.php";	
	?>

    

	<div class="container">
		<div class="row">


            <div class="col-md-3">
              

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Around the world</h3>
                    </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                            	<?php


								$idPattern = '/[A-Z][A-Z]/';
								$continent = "AF";
								$country = 'NL';
								
								require_once('../../../protected/config.php');
								
								$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
								
								$error = mysqli_connect_error();
								if ($error != null)
								{
									$output = "<p>Unable to connect to database<p>" . $error;
									exit($output);
								}

								if ($_SERVER['REQUEST_METHOD'] == 'GET')
								{
									if (isset($_GET['id']))
										{
										$id = $_GET['id'];
										
										if (preg_match($idPattern,$id))
											{
											$sql = "SELECT id FROM continents WHERE id ='".$id."'";
											
											if ($result = mysqli_query($connection,$sql))
												{
													$row = mysqli_fetch_assoc($result);
													$continent = $row['id'];
													
													mysqli_free_result($result);
												}	
											}
										}
								
								}
								
								
								$sql = "SELECT * FROM continents ORDER BY continent";
								if ($result = mysqli_query($connection,$sql))
								{
									while ($row = mysqli_fetch_assoc($result))
									{
									echo '<li ';
									if ($row['id'] == $continent)
										{
											echo ' class="active"';
										}
										echo '>';
										echo '<a href="topdest.php?id='.$row['id'].'">';
										echo $row['continent'];
										echo '</a>';
										echo '</li>';
									}
								}
								mysqli_free_result($result);
								
								?>
                            </ul>
                        </div>
                </div>            
			</div>
            
            <div class="col-md-2">
            	<div class="panel panel-default">
                	
                    <div class="panel-heading">
                    	<h3 class="panel-title">Popular Countries</h3>
                    </div>
                    
                    <div class="panel-body">
                    	<ul class="nav nav-pills nav-stacked">
                        	<?php
							$sql = "SELECT cid, country FROM countries WHERE continent='".$continent."' ORDER BY country";
							
							if ($result = mysqli_query($connection, $sql))
								{
									while ($row = mysqli_fetch_assoc($result))
										{
											echo '<li ';
											if ($row['cid'] == $country)
												{
													echo 'class="active"';																									
												}
												echo '>';
												echo '<a href="topdest.php?id='.$continent.'&cid='.$row['cid'].'">';
												echo $row['country'];
												echo '</a>';
												echo '</li>';
										}
										mysqli_free_result($result);
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>

		</div>
	</div>


           


    <?php
	include "footer.inc.php";
	?>

    </body>
</html>