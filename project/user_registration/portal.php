<?php
	session_start();
	include "dbcon.php";
	
	//update account profile
	if(isset($_POST['cost'])){
		$cost=trim($_POST['cost']);
		$loc=trim(strtolower(htmlentities(mysqli_real_escape_string($con,addslashes($_POST['location'])))));
		$service=trim($_POST['service']);
		$cid=trim($_POST['tid']);
		
		if(mysqli_query($con,"UPDATE `technicians` SET `location`='$loc',`services`='$service',`cost`='$cost' WHERE `id`='$cid'")){
			?><script>alert("Account profile is updated");window.history.back();</script><?php
		}
		else{
			?><script>alert("Failed to update profile");window.history.back();</script><?php
		}
	}
	
	if(isset($_SESSION['juliet'])){
		$sid=$_SESSION['juliet'];
		
		$get=mysqli_query($con,"SELECT *FROM `technicians` WHERE `id`='$sid'");
		while($row=mysqli_fetch_array($get)){
			$company=$row['company']; $cost=$row['cost']; $loc=$row['location']; $serv=html_entity_decode($row['services']);
		}
	
	?>
	<html>
	<head>
		<style>
		*{margin:0px;}
		a{text-decoration:none;}
		.main{
			width:100%;background:#fff;padding-top:80px;
		}
		nav{
			height:60px;padding:10px 100px;background:#fff;box-shadow:0px 1px 2px rgba(0,0,0,0.3);position:fixed;width:86%;z-index:1;
		}
		input,select{
			padding:8px;width:250px;border:1px solid grey;color:#191970;
		}
		.btn{
			padding:8px;border:1px solid #2f4f4f;color:#fff;background:#6495ed;cursor:pointer;width:100px;font-weight:bold;
		}
		</style>
	</head>
	<body>
		<nav>
			<img src="../images/logo.png" alt=""style="height:60px;float:left;margin-right:20px">
			<h3 style="color:#008080;font-family:constantia;line-height:50px"> Technician account 
			<span style="float:right;color:#6495ed"><?php echo $company; ?></span></h3>
		</nav>
		<div class="main">
			<div style="padding:20px 100px">
				
				<div style="width:50%;float:left">
					<h3> My Profile</h3><br>
					<form method="post">
						<input type="hidden" name="tid" value="<?php echo $sid; ?>">
						<p>Service<br><select name="service">
							<option value="SmartPhone repair" <?php if($serv=="SmartPhone repair"){echo "selected";} ?>> smart Phone repair</option>
							<option value="Tablet-ipad repair"<?php if($serv=="Tablet-ipad repair"){echo "selected";} ?>>Tablet -ipad repair</option>
							<option value="WIFI-network problem"<?php if($serv=="WIFI-network problem"){echo "selected";} ?>>WIFI-network problem</option>
							<option value="laptop and desktop repair"<?php if($serv=="laptop and desktop repair"){echo "selected";} ?>>laptop and desktop repair</option>
							<option value="ALL computers"<?php if($serv=="computer & MAC computers"){echo "selected";} ?>>ALL computers</option>
						</select></p><br>
						<p>Service Cost<br><input type="number" name="cost"value="<?php echo $cost; ?>"required></p><br>
						<p>Location<br><input type="text" name="location"value="<?php echo $loc; ?>"required></p><br>
						<p><button type="submit" class="btn">Update</button></p><br>
					</form>
				</div>
					
				<div style="margin:0 auto;width:50%;float:left;">
					<h2 style="font-family:lucida calligraphy;color:#008080">Customer request services</h2><br>
					<?php
					$sql=mysqli_query($con,"SELECT *FROM `customers` WHERE `technician`='$sid' ORDER BY `time` DESC");
					while($row=mysqli_fetch_array($sql)){
						$name=html_entity_decode(strip_tags(stripslashes(ucwords($row['customer']))));
						$loc=html_entity_decode(strip_tags(stripslashes(ucwords($row['location']))));
						$phone=$row['phone']; $serv=$row['service']; $day=date("M d, h:i a",$row['time']);
						
						echo "<div style='padding:10px;width:400px;background:#f8f8f8;box-shadow:0px 2px 4px rgba(0,0,0,0.3)'>
						<p style='color:blue;font-family:rockwell'>$name in $loc <span style='color:purple;float:right'>$phone</span></p>
						<p style='padding:10px 0px;color:#2f4f4f;font-family:arial'><i>Service</i><br>$serv</p>
						<p style='color:grey;font-family:rockwell;font-size:14px'><i>$day</i></p>
						</div><br>";
					}
					?>
					
				</div>
			</div>
		</div>
	</body>
	</html>
	
	<?php
	}
	else{
		?>
		<script>
		alert("You must Login to continue");
		window.location.replace("login.php");
		</script>
		<?php
	}
?>