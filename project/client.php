

<!DOCTYPE html>
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
			         <h2>TECH REPAIR CLIENT REGISTRATION</h2>
	</div>
		<div class="container">
			<div class="heading">
				<h2>User Registration</h2>
			
			</div>
			<div class="agile-form">
				<form action="clientprocess.php" method="post" name="myform">
					<ul class="field-list">
						<li>
							<label class="form-label"> 
								Name 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="Name" placeholder="Enter  Name "  >
							</div>
						</li>
						<li> 
							<label class="form-label">
						Contact
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="Contact" placeholder="Enter contact" required >
							</div>
						</li>
						
						
						
				<li>
							<label class="form-label">
						Services
							   <span class="form-required"> * </span>
							</label>
                    
							<div class="form-input">
								<select class="form-dropdown" name="Service" required>
								<option value="Phone">Phone </option>
			<option value="Tablet">Tablet</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="Desktop">Desktop</option>
								</select>
                    
							
							</div>
						</li>
               	<li>
							<label class="form-label">
						Technician
							   <span class="form-required"> * </span>
							</label>
                    
                    
                    
                    
                     <div class="form-input">
								<select class="form-dropdown" name="Technician" required>
								<option value="carlos">Carlos </option>
		                         	<option value="Calebr">Caleb</option>
                                    <option value="Lewis">Lewis</option>
                                    <option value="Duncun">Duncun</option>
								</select>
							</div>
							
						</li>
							
						</li>
					</ul>
					<input type="submit" value="Register" name = "create">
				</form>	


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