<?php
	include "dbcon.php";
	$err=""; 
	
	if(isset($_POST['company'])){
		$company=trim(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['company']))));
		$loc=trim(strtolower(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['loc'])))));
		$phone=trim($_POST['phone']);
		$email=trim(strtolower(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['email'])))));
		$service=trim($_POST['service']);
		
		$check=mysqli_query($con,"SELECT *FROM `technicians` WHERE `email`='$email'");
		$check2=mysqli_query($con,"SELECT *FROM `technicians` WHERE `phone`='$phone'");
		if(! filter_var($email,FILTER_VALIDATE_EMAIL)){
			$err= "Invalid email address";
		}
		else if(! is_numeric($phone)){
			$err= "Phone number should be numbers only";
		}
		else if(strlen($phone) !=10){
			$err= "Phone number should be 10 numbers";
		}
		else if(mysqli_num_rows($check)===1){
			$err= "Email address $email is already in the system";
		}
		else if(mysqli_num_rows($check2)===1){
			$err= "Phone number $phone is already in use";
		}
		else{
			if(mysqli_query($con,"INSERT INTO `technicians` VALUES('','$company','$email','$phone','$loc','$service','0')")){
				$err="Account creation success";
			}
			else{
				$err= "Failed to create account at the moment";
			}
		}
	}

?>


<html lang="en">
<head>
	
	<title>TECH REPAIR</title>

	<!-- stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i,700" rel="stylesheet">

	<script language="JavaScript" src="gen_validatorv4.js"
    type="text/javascript" xml:space="preserve"></script>
</head>
<body>


	<script language="JavaScript" src="gen_validatorv4.js"
    type="text/javascript" xml:space="preserve"></script>
	<div class="w3ls-banner">
	<div class="heading">
			         <h2>REGISTRATION</h2>
	</div>
		<div class="container">
			<div class="heading">
				
			<?php echo $err; ?>
			</div>
			<div class="agile-form">
				<form  method="post" name="myform">
					<ul class="field-list">
						<li>
							<label class="form-label"> 
								Company name
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="company" placeholder="Company name " required >
							</div>
						</li>
						<li>
							<label class="form-label">Email<span class="form-required"> * </span></label>
							<div class="form-input">
								<input type="email" name="email" placeholder="Email address" required >
							</div>
						</li>
						<li> 
							<label class="form-label">
					Phone
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="phone" placeholder="Phone number" required >
							</div>
						</li>
						<li>
							<label class="form-label">Location<span class="form-required"> * </span></label>
							<div class="form-input">
								<input type="text" name="loc" placeholder="Company location" required >
							</div>
						</li>
						
						<li>
							<label class="form-label">Services<span class="form-required"> * </span></label>
							<div class="form-input">
								<select name="service">
									<option value="SmartPhone repair"> smart Phone repair</option>
									<option value="Tablet-ipad repair">Tablet -ipad repair</option>
									<option value="WIFI-network problem">WIFI-network problem</option>
									<option value="laptop and desktop repair">laptop and desktop repair</option>
									<option value="All computers">ALL computers</option>
								</select>
							</div>
						</li>
						
					</ul>
					<input type="submit" value="Submit" name = "create">
				</form>	
				<p style="text-align:right"><a href="../../user_registration/login.php">Login Here</a></p>


				<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.addValidation("FirstName","req","Please enter your First Name");
  frmvalidator.addValidation("FirstName","maxlen=20",	"Max length for FirstName is 20");
  frmvalidator.addValidation("FirstName","alpha","Alphabetic chars only");
  
  frmvalidator.addValidation("LastName","req","Please enter your Last Name");
  frmvalidator.addValidation("LastName","maxlen=20","Max length is 20");
  
  frmvalidator.addValidation("Email","maxlen=50");
  frmvalidator.addValidation("Email","req");
  frmvalidator.addValidation("Email","email");
  
  frmvalidator.addValidation("Phone","maxlen=50");
  frmvalidator.addValidation("Phone","numeric");
  
  frmvalidator.addValidation("Address","maxlen=50");
  frmvalidator.addValidation("Country","dontselect=000");

//]]></script>

			</div>
		</div>
	
	</div>







</body>
</html>