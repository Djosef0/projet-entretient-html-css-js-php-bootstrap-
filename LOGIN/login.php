<?php 

include '../GESTION/php/conx.php';
$conn=returnConn();



session_start();


	if (isset($_SESSION['name'])) {
    	header("Location: ../GESTION/index.php");
	}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   	     
		$result = mysqli_query($conn, $sql);
	
		// die();
			if ($result->num_rows > 0) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['name'] = $row['name'];
				header("Location: ../GESTION/index.php");
			}else{
				echo "<script>alert('Email Ou Password ErronerX.')</script>";
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../GESTION/assets/login.css">
<link rel="stylesheet" href="../GESTION/assets/media.css">
 	<title>Login Form</title>
</head>
<body>
	<section style="background-size:cover ; min-height: 100vh ; background-repeat: no-repeat ; background-image:url('../GESTION/icons/loginback.gif') ; background-position:center; ">
	<button style="position:absolute; top:4% ; right:3%" class="btn btn-info" ><a style="text-decoration:none ; color:white" href="../index.php">Page d'acceuil</a></button>
	<div class="container">
		<form action="" method="POST" class="bg-light" >
			<legend class="login-text" style="font-size: 2rem; font-weight: 800;">Login</legend>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn-primary">Login</button>
			</div>
			<p class="login-register-text">Je n'ai pas encore de compte?<br><a href="registre.php">Register Ici</a>.</p>
		</form>
	</div>
	</section>
</body>
</html>