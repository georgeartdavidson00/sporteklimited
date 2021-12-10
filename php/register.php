<?php
    require __DIR__ ."/database_credentials.php";

	$error = "";

    if(isset($_POST["btnSubmit"])) {
		$conn = new mysqli(servername,username,password,dbname);
    
		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
			echo "Connection failed";
		}
		else {
			$Email = $_POST['Email'];
			$stmt = $conn -> prepare("SELECT * FROM users WHERE Email = ? LIMIT 1");
			$stmt -> bind_param("s",$Email);
			$stmt -> execute();
			$result = $stmt -> get_result();
			if($result -> fetch_assoc()) {
				//$error = "An account with this email already exists. Login instead?";
                echo "<script>alert('An account with this email already exists. Login instead?')</script>";
			} else {
				$stmt = $conn -> prepare("insert into users(Username,Email,Password)values(?,?,?)");
				$stmt -> bind_param("sss",$Username,$Email,$Password);

				$Username = $_POST['Username'];
				$Password = $_POST['Password'];

				$stmt -> execute();
				
				if ($conn->error) {
					echo $conn->error ;
				    $stmt ->close();
				    $conn -> close();
				} else {
				    header("Location:login.php");
				}
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
	<title>Register Form </title>
</head>
<body>
	<div class="container">
		<form action="register.php" method="POST" class="login-email" id="register_form">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="Username"  required = "required">
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="Email"  required = "required">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="Password" id= "password1"  required = "required">
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" id ="password2" required = "required">
			</div>
			<div class="checkbox">
			<input type="checkbox" onclick="myFunction()"> Show Password 
			</div>
			<div class="input-group">
				<button name="btnSubmit" class="btn">Register</button>
			</div>
            <?php if($error) { ?>
			<p class="error-text"><?php echo $error; ?></p>
		<?php } ?>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>

    <script src= "../javascript/passwordvalidation.js"></script>
    <script src= "../javascript/validation_signup.js"></script>
</body>
</html>