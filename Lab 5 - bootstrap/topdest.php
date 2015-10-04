<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>top destination</title>
        
        <link href="CSS/pewpew.css" rel="stylesheet" media="screen">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="CSS/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
    </head>
    
    <?php
	include "header.inc.php";
		
	$idPattern = '/[A-Z][A-Z]/';
	$continent = 'AF';
	$country = 'NL';
	
	require_once('../../../protected/config.php');
	
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			
			if (preg_match($idPattern,$id))
			{
				$sql = "SELECT id FROM continents WHERE id ='".$id."'";
				$result = mysqli_query($connection,$sql);
				
				if (mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_assoc($result);
					$continent = $row['id'];
					mysqli_free_result($result);
					
					if (isset($_GET['cid']))
					{
						$cid = $_GET['cid'];
						
						if (preg_match($idPattern,$cid))
						{
							$sql = "SELECT cid FROM countries WHERE cid='".$cid."' AND continent='".$continent."'";
							$result = mysqli_query($connection,$sql);
							
							if (mysqli_num_rows($result) > 0)
							{
								$row = mysqli_fetch_assoc($result);
								$country = $row['cid'];
								mysqli_free_result($result);
							}
						}
					}
				}
			}
		}
	}
		
		if ($country == 'NL')
		{
			$sql = "SELECT cid FROM countries WHERE continent='".$continent."' ORDER BY country";
			
			if ($result = mysqli_query($connection,$sql))
			{
				$row = mysqli_fetch_assoc($result);
				$country = $row['cid'];
			}
		}
		mysqli_close($connection);
	?>

    <body>
		
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-2">
            	<div class="panel panel-default">
                	
                    <div class="panel-heading">
                    	<h3 class="panel-title">Around the World</h3>
                    </div>
                    
                    <div class="panel-body">
                    	<ul class="nav nav-pills nav-stacked">
                        	<?php
								require_once('../../../protected/config.php');
								$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);   
								
								$sql = "SELECT * FROM continents ORDER BY continent";
								
								if ($result = mysqli_query($connection,$sql))
								{
									while ($row = mysqli_fetch_assoc($result))
									{
										echo '<li ';
										if ($row['id'] == $continent)
										{
											echo 'class="active"';
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
            
            <div class="col-md-8">
            	<div class="well">
                	<?php
						$sql = "SELECT vid, src, alt FROM itineraries WHERE ccode='".$country."' ORDER BY src";
						
						if ($result = mysqli_query($connection,$sql))
						{
							while ($row = mysqli_fetch_assoc($result))
							{
								echo '<div class="col-sm-6 col-md-3">';
								echo '<a href="itinerary.php?vid='.$row['vid'].'" class="thumbnail">';
								echo '<img src="images/'.$continent.'/'.$country.'/'.$row['src'].'" alt="'.$row['alt'].'">';
								echo '</a>';
								echo '</div>';
							}
						}
						mysqli_close($connection);
					?>
                </div>
            </div>
            
        </div>
    </div>

    </body>
	<?php
	include "footer.inc.php";
	?>
    
</html>