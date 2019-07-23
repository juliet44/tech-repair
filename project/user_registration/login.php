	<?php
	session_start();
	include "dbcon.php";
	$err="";
	
	if(isset($_POST['email'])){
		$email=trim(strtolower(mysqli_real_escape_string($con,addslashes($_POST['email']))));
		$pass=trim(mysqli_real_escape_string($con,addslashes($_POST['pass'])));
		
		$sql=mysqli_query($con,"SELECT *FROM `technicians` WHERE `email`='$email' AND `phone`='$pass'");
		if(mysqli_num_rows($sql)===0){
			$err= "<p style='color:#ff4500'>Incorrect username or password</p><br>";
		}
		else{
			$_SESSION['juliet']=mysqli_fetch_array($sql)['id'];
			header("location:portal.php");
		}
	}

	?>
	
	<html>
	<title>User Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,user-scalable=no">
	<link rel="shortcut icon" href="../images/favicon.ico">
	
	<head>
		<style>
		*{
			margin:0px;
		}
		body{
			font-family:helvetica;background:#f0f8f8;
		}
		.main{
			width:400px;background:#fff;min-height:300px;margin:0 auto;margin-top:50px;box-shadow:0px 2px 5px rgba(0,0,0,0.5);padding:10px;
		}
		input[type=password],[type=email]{
			padding:10px;width:100%;border:1px solid #ccc;
		}
		.btn{
			padding:10px;border:1px solid #2f4f4f;background:#6495ed;color:#fff;width:100px;border-radius:3px;cursor:pointer;
		}
		</style>
	</head>
	<body>
		<div class="main">
		<p style="color:#191970;font-size:22px;text-align:center;font-family:rockwell">Technician Login</p><br><br>
		<div style="width:300px;margin:0 auto">
		<?php echo $err; ?>
		<form method="post">
		<p>Email<br><input type="email" name="email"required></p><br>
		<p>Phone<br><input type="password" name="pass"required maxlength="10" onkeyup="validate(this.value)" id="pass"></p><br><br>
		<p style="text-align:right"><button type="submit" class="btn">Login</button></p><br>
		</form>
		<p style="text-align:right;">Dont have account? <a href="../admin/reg/client2.php">Create account</a></p><br>
		</div>
		</div>
	
	</body>
	</html>
	<script>
	function validate(v){
		var exp=/^[0-9]+$/;
		if(! v.match(exp)){
			document.getElementById("pass").value="";
		}
	}
	</script>
