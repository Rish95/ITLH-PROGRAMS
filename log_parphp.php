<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="\lib\css\bootstrap.min.css">
		
		<link rel="shortcut icon" href="\img\favicon.ico">
	</head>
	<body>
	<?php
// define variables and set to empty values
$emailErr = $pswdErr = "";
$email = $pswd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["password"])) {
    $pswdErr = "Password is required";
  } else {
    $pswd = test_input($_POST["password"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	<div class="container" id="cont">	
<div class="col-md-4 col-md-offset-4">
		<!-- <header>
			<div class="logo" align="center">
				<img src="C:\Users\Rishabh\Documents\ITLH\Prac\img\l1.gif" width="50%" height="50%">
			</div>
		</header> -->
		<div class="log"><h2>Login</h2></div>
		<div class="well">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
			<div class="form-group">
				<label for="input-email">E-Mail</label>
				<input type="email" name="email" value="<?php echo $email;?>" placeholder="E-Mail" id="input-email" class="form-control">
								<span class="error"><?php echo $emailErr;?></span>
			</div>
			<div class="form-group">
				<label for="input-password">Password</label>
				<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control"><span class="error"><?php echo $pswdErr;?></span>
			</div>
						
			<div class="checkbox" align="center">
				<label><input type="checkbox"> Remember me</label>
				&emsp;&emsp;&emsp;&emsp;&emsp;<a href="forgotPWD.html">Forgot Password</a>
			</div>
			<div class="signup" align="center">
				<a href="regp.php">Register as a new user</a>
				<br><br>
			</div>
			<button type="submit" class="btn btn-primary center-block">Sign In</button>
		</form>
		</div>
		</div>
		</div>
		<script type="text/javascript">
		$('#btn_lgn').on('click',function()
		{
			$.ajax({
				url:"log_parphp.php",
			}).done(function(response){
				console.log(response);
				$('li#lgbtn').attr("class","active");
				$('li#rgbtn').attr("class","");
				$('div#cont').html(response);
			});
		});
		$('#btn_rgst').on('click',function()
		{
			$.ajax({
				url:"reg_parphp.php",
			}).done(function(response){
				console.log(response);
				$('li#rgbtn').attr("class","active");
				$('li#lgbtn').attr("class","");
				$('div#cont').html(response);
			});
		});
	</script>
		</body>
		</html>