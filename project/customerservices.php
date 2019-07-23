	<?php
	include "dbcon.php";
	
	$techs=$err="";
	//saving customer details
	if(isset($_POST['tech'])){
		$tech=trim($_POST['tech']);
		$service=trim($_POST['service']);
		$phone=trim($_POST['phone']);
		$user=trim(strtolower(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['name'])))));
		$loc=trim(strtolower(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['loc'])))));
		$time=time();
		
		if(strlen($phone)!=10){
			$err= "Phone number should be 10 numbers";
		}
		else{
			if(mysqli_query($con,"INSERT INTO `customers` VALUES('','$user','$phone','$loc','$tech','$service','$time')")){
				$err="Success,you will be contacted for more information";
			}
			else{
				$err="Failed to save,try again later";
			}
		}
	}
	
	if(isset($_GET['s'])){
		$serv=trim($_GET['s']);
		$s=html_entity_decode($serv);
	}
	
	//getting technicians
	$sql=mysqli_query($con,"SELECT *FROM `technicians` WHERE `services`='$s'");
	while($row=mysqli_fetch_array($sql)){
		$tid=$row['id']; $tech=html_entity_decode(strip_tags(stripslashes(ucfirst($row['company'])))).' in '.$row['location'].',Cost Ksh.'.$row['cost'];
		$techs.="<option value='$tid'>$tech</option>";
	}
	
	?>
	<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Customer services</title>
	
	<head>
	<style>
		*{margin:0px;}
		.main{
			background:#fff;width:600px;margin:0 auto;min-height:400px;
		}
		input,select{
			padding:8px;width:250px;border:1px solid grey;color:#191970;
		}
		.btn{
			padding:8px;border:1px solid #2f4f4f;color:#fff;background:#6495ed;float:right;cursor:pointer;width:100px;font-weight:bold;
		}
	</style>
	</head>
	
	<body>
		<div class="main"><br><br>
		<h3 style="font-family:lucida calligraphy;text-align:center;color:#008080">Customer services</h3>
		<h4 style="text-align:center;color:#191970"><?php echo $serv; ?></h4><br>
		<p style="color:#ff4500;padding:10px;text-align:center"><?php echo $err; ?></p>
		<form method="post" id="cform">
			<input type="hidden" name="service" value="<?php echo $serv; ?>">
			<table cellpadding="10" style="margin:0 auto">
				<tr><td>Full name</td><td><input type="text" name="name" required></td></tr>
				<tr><td>Phone number</td><td><input type="number" name="phone" required></td></tr>
				<tr><td>Location</td><td><input type="text" name="loc" required></td></tr>
				<tr><td>Technician</td><td><select name="tech"><?php echo $techs; ?></select></td></tr>
				<tr><td></td><td><button class="btn">Submit</button></td></tr>
			</table>
		</form>
		</div>
	</body>
	</html>