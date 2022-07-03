 <?php
session_start();
if(isset($_SESSION['ID']))
{
	
if(isset($_POST['publish']))
{
	$title=$_POST['title'];
	$desc=$_POST['cont'];
	
	$author=$_SESSION['ID'];
	$category=$_POST['category'];
	
	echo $author;
	echo $category;
	
	$filetmp = $_FILES["feature"]["tmp_name"];
  $filename = $_FILES["feature"]["name"];
  $filepath = "uploads/".$filename;
  if(move_uploaded_file($filetmp,$filepath))
  {
  	echo "Upload Success";
  }
  else{
  echo "Error while uploading";
}
	if(!empty($title)&&!empty($desc)&&!empty($author)&&!empty($category)&&!empty($filename))
	{

        include('config.php');
        $stmt = $db->prepare("insert into posts (title,description,date,author,status,featured,category) values(?,?,now(),?,'publish',?,?)");
        $stmt->bind_param("sssss", $title, $desc, $author, $filename, $category);
        if ($stmt->execute()) {
 echo "Posted Succesfully!";
 }
 else{
 	echo "Couldnt Post";
   echo("Error description: " . mysqli_error($db));
}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please Fill All The Fields')</script>";
	}
}
if(isset($_POST['draft']))
{
	$title=$_POST['title'];
	$desc=$_POST['cont'];
	
	$author=$_SESSION['ID'];
		$category=$_POST['category'];
	
	echo $author;
	echo $category;
	
	$filetmp = $_FILES["feature"]["tmp_name"];
  $filename = $_FILES["feature"]["name"];
  $filepath = "uploads/".$filename;
  if(move_uploaded_file($filetmp,$filepath))
  {
  	echo "Upload Success";
  }
  else{
  echo "Error while uploading";
}
	if(!empty($title)&&!empty($desc)&&!empty($author))
	{
        include('config.php');
        $stmt = $db->prepare("insert into posts (title,description,date,author,status,featured,category) values(?,?,CURDATE(),?,'draft',?,?)");
        $stmt->bind_param("sssss", $title, $desc, $author, $filename, $category);
        if ($stmt->execute()) {
 echo "Saved As Draft!";
 }
 else{
 echo "Couldn't Save As Draft";
}
	}
	else
	{
		echo "Please Fill All The Fields";
	}

}
}
else
{
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Post - Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
	.leftt
	{
		width: 67%;
		float: left;

	}
	.rightt
	{
		width: 33%;
		float: left;
	}
		
		.forg{
			color: #833299;
			font-family: Arial;
			size: 4;
			margin-left: 20px;
			width: 94%; 
			margin-left: 20px;
			margin-top: 5px; 
			padding: 5px 5px 5px 5px;
		}
		input[type=text],textarea
		{
			
			border-radius: 5px;
		}
		.publishbox{
			color: #833299;
			font-family: Arial;
			size: 4;
			margin-left: 20px;
			width: 90%; 
			border-radius: 10px;
			border: 1px solid #833299;
			margin-top: 5px; 
			padding: 10px 5px 5px 10px;
		}
		.draft
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
		 .pub
		 {
		 	background-color: green;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
		 .we{
		 	margin-top: : 20px;
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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
		<div class="leftt"><br>
			<label class="forg">Agregar Nueva Publicación</label><br>&nbsp;</p>
			<input class="forg" type="text" name="title" placeholder="Introduzca Título Aquí" />
			<br>
			<label class="forg"><p style="color:Orange">Agregar Descripción</label><br>
			<textarea id="cont" name="cont" class="forg" rows="30" cols="100"></textarea>
		</div>
		<div class="rightt"><br>

			<label class="forg">Número de Tarjeta: <span id="wordCount">0</span></label><BR><BR>&nbsp;
			<div class="publishbox">
				Category:<br><h5 style="background-color:Orange;">
				 <input type="radio" name="category" value="Technology"> TNAS<br>
                                 <input type="radio" name="category" value="Health"> QNAP<br>
                                 <input type="radio" name="category" value="Sports"> Synology<br>
                                 <input type="radio" name="category" value="Entertainment"> Ransomware<br>
                                 <input type="radio" name="category" value="Travel"> My Cloud<br></h5>
				
			</div>

			<div class="publishbox">
				<label><b><p style="color:Orange">Publicar</b></label>
				<hr>
				<input type="submit" name="draft" class="draft" value="Save Draft">
				<br><br>
				<label class="we"><p style="color:Orange">Estado: Borrador</label><br><br>
				<label class="we"><p style="color:Orange">Programar Publicación:</label></p>
                <input type="date" name="scheduledate"/>
				<br>
				<br>
				<label class="we"></label>
				
			</div>
			<BR>
			<div class="publishbox">
				<input type="file" name="feature" placeholder="Upload Featured Image"/><br><br><input type="submit" class="pub" value="PUBLICAR" name="publish"></input>
			</div>
			
		</div>
		</form>
	</div>

</p>
<footer class="fut" align="center"><p>Blog 2022</p></footer>
</body>
<script type="text/javascript">
	
	

    document.getElementById('cont').addEventListener('input', function () {


        var text = this.value;
        var newStr = text.replace(/,/g, ' ');
        var newStr = newStr.replace(/'/g, ' ');
        var newStr = newStr.replace(/"/g, ' ');
        document.getElementById('cont').value=newStr;
        count = text.length;
        document.getElementById('wordCount').textContent = count;

    });
    document.getElementById('title').addEventListener('input', function () {


        var text2 = this.value;
        var newStr2 = text2.replace(/,/g, ' ');
        var newStr2 = newStr2.replace(/'/g, ' ');
        var newStr2 = newStr2.replace(/"/g, ' ');
        document.getElementById('title').value=newStr2;
        

    });
   
</script>
</html>