<?php
session_start();

if(isset($_POST['submit'])&&isset($_FILES['image'])){
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "imageupload";
$name=$_SESSION['name'];
$conn= new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	echo $conn->connect_error;
}

$img=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], "picture/$img");

$file="picture/".$_FILES["image"]["name"];
     
$sql="INSERT INTO imagepath (name, path) VALUES ('$name','$file')";

if($conn->query($sql)){
	echo "<script>alert('Successful');</script>";
}
else{
	echo "Error:".$conn->error;
}
$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
</head>
<body>
	<form method="post" action="upload.php" enctype="multipart/form-data">
		<div>
			Select image to upload
		</div>
		<input type="file" name="image">
		<div>
			<input type="submit" name="submit" value="Upload">
		</div>
	</form>
</body>
</html>