<?php
	session_start();
	if(isset($_POST['submit'])){
		$dbhost = 'localhost:3307';
	$dbuser = 'root';
	$dbpass = '';
	$db_name = 'imageupload';
	$tbl_name = 'imagepath';
	$name=$_SESSION['name'];


	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db_name);

	if (!$conn)
	{
	    die('Could not connect: ' . mysqli_connect_error());
	}

	$result = mysqli_query($conn, "SELECT * FROM `$tbl_name` where name='$name'");

	while ($row = mysqli_fetch_array($result))
	{
	    echo '<tr><td><img src="'.$row['path'].'"></td>' ;
	}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <h3>Welcome <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];} ?></h3>
   <form name="f" method="post" action="upload.php">
		<input type="submit" name="upload" value="Upload Image">
   </form>
   <div>
   <form name="f1" action="userinfo.php" method="post">
      	<input type="submit" name="submit" value="Your Images">
	</form>
   </div>
   <div id="img">
   	
   </div>
</body>
</html>