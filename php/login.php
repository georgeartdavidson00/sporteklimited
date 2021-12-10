<?php 

session_start();
    
require __DIR__ ."/database_credentials.php";
$error = "";
  if (isset($_POST['submit']))  {
$conn = new mysqli(servername,username,password,dbname);


if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
	echo "Connection failed";
}
else {
	//checking user credentials
	$Email = $_POST["email"];
	$Password=$_POST["password"];

	$stmt = $conn -> prepare("select * from users where Email=? and Password=?");
	$stmt -> bind_param("ss",$Email,$Password);
	



$user = null;

$stmt->execute();

$result = $stmt->get_result();
$_SESSION["user"] = $result -> fetch_all(MYSQLI_ASSOC);

if($_SESSION["user"]) {
	header( 'Location: index.php');
	
}
else {
	$error = " Please Check your credentials and Try again!!";
}

	
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
            <?php if ($error){ ?>
	<p style="color:red;margin:500px;margin-left:570px; " ><?php echo $error ?> </p> 

<?php }?>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>