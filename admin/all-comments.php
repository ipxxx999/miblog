<?php
session_start();
if(!isset($_SESSION['ID']))
{
header("Location:login.php");	
}
?>
<html>
<head>
	<title>All Comments - Mi Blog Demo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
	.redkaro
{
	padding: 5px 15px 5px 15px;
	border-radius: 8px;
	background-color: red;
	color: white;
}
		.articimg
		{
			width: 60%;
			border:1px solid green;
			height: 300px;
			
			margin-top: 10px;
			margin-left: 350px;
		}
		.artic
		{
			width: 60%;
			
			height: 100%;
			
			margin-top: 10px;
			margin-left: 350px;
		}
		.read
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 	margin-left: 10px;
		 }
		 label{
		
		 font-family: Arial;
		 color: #833299;
		 margin-left: 10px;
		 }
		 .title
		 {
		 	font-size: 25;
		 }
		 table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial;
    font-size: 15;
}
th
{

    background-color: #e276e4;

}
a
{
	text-decoration: none;
}

th, td {
    text-align: left;
    padding: 2px;
    padding-left: 10px;
}
		 
		 tr:nth-child(even){background-color: #d59cd6}
		 tr:nth-child(odd){background-color: #e9b0f7}
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

	
<div class="artic" >

		<div class="individual">
			<?php
			include('config.php');
$uid=$_SESSION['ID'];
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
        $stmt = $db->prepare("SELECT Post_ID FROM posts where author=? order by date desc");
        $stmt->bind_param("s", $uid);
        $stmt->execute();
        $result = $stmt->get_result();
echo "<h1 align='center'>Todos Los Comentarios</p></br></h1>";
echo "<table style='overflow-x:auto;'>
<tr>
<th>Comment ID</th>
<th>Comment</th>
<th>Author</th>
<th>Comment Date</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $stmt = $db->prepare("SELECT * from comments where Post_ID=? ");
    $stmt->bind_param("s", $row['Post_ID']);
    $stmt->execute();
    $res = $stmt->get_result();
	$rowcount=mysqli_num_rows($res);
	while($row2=mysqli_fetch_array($res))
	{

echo "<tr>";
echo "<td>" . $row2['C_ID'] . "</td>";
echo "<td>" ."<a href='../view-post.php?pid=". $row2['Post_ID']."'>". $row2['content'] . "</a></td>";
echo "<td>" . $row2['author'] . "</td>";
echo "<td>" . $row2['date'] . "</td>";

echo "<td>" . "&nbsp;&nbsp;<form action='delete-comment.php' method='POST'><input type='text' name='cid' value='".$row2['C_ID']."' style='display:none;'></input>&nbsp;&nbsp;<input type='submit' class='redkaro' name='delete' class='actions' value='Delete'></form> &nbsp;". "</td>";
echo "</tr>";
	}

}
echo "</table>";

mysqli_close($db);
?>
		</div>
	</div>

<footer class="fut" align="center"><p>Mi Blog 2022</p></footer>
</body>
</html>