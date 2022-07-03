<?php
include("config.php");

 session_start();
    if(isset($_SESSION['ID']))
    {
      $email=$_SESSION['ID'];

    }
    else
    {
      $site= "<script type='text/javascript'>window.location='login.php'</script>";
        echo $site;
    }
$stmt = $db->prepare("select *from users where email like ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);
$originalpass=$row['Password'];

if(isset($_POST['submit']))
{
  $old=md5($_POST['oldpass']);
  $new=md5($_POST['newpass']);
  if($old==$originalpass)
  {
      $stmt = $db->prepare("UPDATE users SET Password = ? WHERE email=?");
      $stmt->bind_param("ss", $new, $email);
      if ($stmt->execute()) {
      echo "Password Changed Successfully";
 header("Location:login.php");
 }else {
 	 echo "<script type='text/javascript'>alert('Error updating record: ".$mysqli_error($db)."')</script>";
}

  }
  else
  {
    echo "<script type='text/javascript'>alert('Invalid Password')</script>";
  }

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password - Mi Blog Demo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.regi{
			margin-top: 20px;
			width:700px;
			border-radius: 10px;
			border: 1px solid #833299;
			height: 430px;
			box-shadow: 10px 10px #f5e7e7;
		}
		p
		{
			font-family: Arial;
			font-size: 4;
			color: #833299;
		}
		 label,input[type=text],input[type=email],input[type=password],label a
		 {
		 	width:200px;
		 	margin-top: 5px;
		 	font-family: Arial;
			font-size: 4;
			color: #833299;
			border-radius: 5px;
			padding: 5px 10px 5px 5px;
		 }
		 input[type=submit]
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
	</style>
</head>
<body>
	<div align="center">
	 <div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      <font color="yellow" size="5"><b>Mi</b></font> <font color="#cf8cea">Blog</font>
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
  <a class="active" href="../index.php">Ir al Blog</a>
  <a href="index.php">Panel 1</a>
  <a href="all-posts.php">Mensajes</a>
  <a href="add-post.php">Agregar Publicación</a>
  <a href="all-comments.php">Comentarios</a>
  <a href="changepass.php">Contraseña</a>

    <?php  if(!isset($_SESSION['ID']))
      {
        
        echo "<a href='login.php'>&nbsp;<img src='../images/user.png' width='20px'>&nbsp;Login/Register</a>";
      }
        else {
        
        echo "<a href='logout.php'><img src='../images/user.png' width='20px'>&nbsp;Logout</a><a href='index.php'><img src='../images/settings-gears.png' width='20px'>&nbsp;Dashboard</a>";
      }
        ?>
  

  </div>

	<div class="regi" >
		<p align="center"><br><b>CAMBIA LA CONTRASEÑA</b></p><br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			
			<label>Contraseña Actual</label>
			<br>
			<input type="Password" name="oldpass" placeholder="Ingrese su contraseña actual" required/>
			<br><br>
			<label>Nueva Contraseña</label><br>
			<input type="Password" name="newpass" id="pass" placeholder="Introduzca nueva contraseña" required/><br><br>
			
			<input type="submit" name="submit" value="CAMBIAR CONTRASEÑA"/>
		</form><br>
		
		
	</div>
</div>
<footer class="fut" align="center"><p>Mi Blog 2022</p></footer>
</body>

</html>