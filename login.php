<?php
 session_start();
 $dbname="imageupload";
$servername = "localhost:3307";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connections
if ($conn->connect_error) {
    echo $conn->connect_error;
} 

if(isset($_POST['name']) && isset($_POST['pass1'])){
	$name=$_POST['name'];
	$pass=$_POST['pass1'];

 $res=mysqli_query($conn, "select name, password from users where name= '$name' AND password= '$pass'");
 if (mysqli_num_rows($res)>0) {
 	$row=mysqli_fetch_array($res);
 	$val=$row['name'];
 	$_SESSION['name']=$val;
 	header("Location:userinfo.php");
 }

 else{
 	echo 'Wrong credentials';
 }
}
 $conn->close();


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body>
   <form onsubmit="" method="post" id="form1">
             
            <h3>
                Name
            </h3>
            <input type="text" placeholder="Name" name="name" id="Username">
            <h3>
                Password
            </h3>
            <input type="password" name="pass1">
            <div>
            <button type="submit" class="sbutton">
                Submit
            </button>
            </div>
            </form>
 
 </body>
 </html>