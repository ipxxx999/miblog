<?php
session_start();
if(!isset($_SESSION['ID']))
{
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.views
		{
			border:1px solid #833299;
			width: 530px;
			float: left;
			margin-left: 10px;
			margin-top: 10px;
			height: 100px;
			border-radius: 20px;
			background-color: #e1d6e2;
		}
		th, td {
    text-align: left;
    padding: 2px;
    padding-left: 10px;
}
		 
		 tr:nth-child(even){background-color: #d59cd6}
		 tr:nth-child(odd){background-color: #e9b0f7}
		 table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial;
    font-size: 15;
    line-height: 1.6;
}
.views
{
	color: #833299;
	font-family: Arial;
	font-size: 20px;
	padding: 5px 5px 5px 5px;
	
}
.rightt{
	background-color: #e1d6e2;
	width: 32.5%;
	float: left;
	margin-left: 10px;
	height: 700px;
}
a
{
	text-decoration: none;
}
th
{

    background-color: #e276e4;

}
	</style>
</head>
<body>

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



	<div class="container">
				<div class="rightt">
			<?php
			include('config.php');
$uid=$_SESSION['ID'];
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
            $stmt = $db->prepare("SELECT * FROM posts where author=? order by visitors desc limit 10");
            $stmt->bind_param("s", $uid);
            $stmt->execute();
            $result = $stmt->get_result();
echo "<h1 align='center'>Publicaciones Más Vistas</h1>";
echo "<table style='overflow-x:auto;'>
<tr>

<th>Título</th>
<th>Vistas</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $stmt = $db->prepare("SELECT * from comments where Post_ID=? ");
    $stmt->bind_param("s", $row['Post_ID']);
    $stmt->execute();
    $res = $stmt->get_result();
	$rowcount=mysqli_num_rows($res);

echo "<tr>";

echo "<td>" ."<a href='../view-post.php?pid=". $row['Post_ID']."'>". $row['title'] . "</a></td>";
echo "<td>" . $row['visitors'] . "</td>";
echo "</tr>";
}
echo "</table>";


?>
		</div>
		<div class="rightt">
			<?php

$uid=$_SESSION['ID'];
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

            $stmt = $db->prepare("SELECT * FROM posts where author=? and status='draft' order by date desc limit 10");
            $stmt->bind_param("s", $uid);
            $stmt->execute();
            $result = $stmt->get_result();
echo "<h1 align='center'>Tus Borradores</h1>";
echo "<table style='overflow-x:auto;'>
<tr>
<th>ID Mensaje</th>
<th>Título</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $stmt = $db->prepare("SELECT * from comments where Post_ID=? ");
    $stmt->bind_param("s", $row['Post_ID']);
    $stmt->execute();
    $res = $stmt->get_result();
	$rowcount=mysqli_num_rows($res);

echo "<tr>";
echo "<td>" . $row['Post_ID'] . "</td>";
echo "<td>" ."<a href='../view-post.php?pid=". $row['Post_ID']."'>". $row['title'] . "</a></td>";
echo "</tr>";
}
echo "</table>";


?>
		</div>
		<div class="views" align="center">
<br>
			<?php
$res = mysqli_query($db,'select sum(visitors) from posts');
if (FALSE === $res) die("Select sum failed: ".mysqli_error);
$roww = mysqli_fetch_row($res);
$sum = $roww[0];
echo "Visitantes: ".$sum;

			?>
			
		</div>
		<br><br>
		<div class="views" align="center"><br>

			<?php
$res2 = mysqli_query($db,'select count(C_ID) from comments');
if (FALSE === $res2) die("Select sum failed: ".mysqli_error);
$roww2 = mysqli_fetch_row($res2);
$sum2 = $roww2[0];
echo "Comentarios: ".$sum2;

			?>
			
		</div>
	</div>
<footer class="fut" align="center"><p>Mi Blog 2022</p></footer>

</body>
</html>