
<!DOCTYPE html>
<html>
<head>
	<title>Anti-Scan Defender Blog </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.left{
			margin-left: 1%;
		}
	</style>
</head>
<body>
	<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      <font color="yellow" size="5"><b>Anti-Scan Defender</b></font> <font color="#cf8cea">Blog</font>
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
    <input type="checkbox" id="nav-check">
  <div class="nav-links" >
<a class="active" href="index.php"><img src="images/home.png" width="20px"></img>&nbsp;Home</a>
  <a href="technology.php"><img src="images/technology.png" width="20px"></img>&nbsp;TNAS</a>
  <a href="sports.php"><img src="images/sports.png" width="20px"></img>&nbsp;Synology</a>
  <a href="health.php"><img src="images/health.png" width="20px"></img>&nbsp;QNAP</a>
  <a href="travel.php"><img src="images/travel.png" width="20px"></img>&nbsp;My Cloud</a>
  <a href="entertainment.php"><img src="images/entertainment.png" width="20px"></img>&nbsp;Ransomware</a>

    <?php session_start(); if(!isset($_SESSION['ID']))
      {
        
        echo "<a href='admin/login.php'>&nbsp;<img src='images/user.png' width='20px'>&nbsp;Login/Register</a>";
      }
        else {
        
        echo "<a href='admin/logout.php'><img src='images/user.png' width='20px'>&nbsp;Logout</a><a href='admin/index.php'><img src='images/settings-gears.png' width='20px'>&nbsp;Dashboard</a>";
      }
        ?>
  

  </div>

	<div class="container" align="center">
		<div class="left">
      <h1>Page Not Found</h1>

			
					
		</div>
		
	</div>

<footer class="fut" align="center"><p>Anti-Scan Blog 2022</p></footer>
</body>
</html>