<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="cleartype" content="on">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
<body>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

?>
<script type="text/javascript">
	window.location="../index.php";
</script>

</body>
</html>