<!DOCTYPE html>
<?php
	require '../connection.php';
?>
<html lang="en">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Add Teacher | Class Management</title>
</head>

<body style="background: linear-gradient(to right bottom, gold, chocolate)">
<center>
		<form method="post" action="t_backend1.php">
			<h2>Add Teacher Details</h2><br>
			<h3>All fields are mandotory</h3><br>
			
			<?php
			if(isset($_GET['msg'])){
				echo $_GET['msg'], "<br>";
			}
			?>
			<fieldset style="width:600px">
			<legend style="text-align:right"><button><a href="teacher_data.php" style="text-decoration:none">Go Back</a></button></legend>
			<table style="width:100%">
			  <tr>
			    <td>Enter full name:</td>
			    <td><input type="text" name="t_name" required></td>
			    
			  </tr>
			 
			  <tr>
			    <td>Select Gender:</td>
			    <td>  <input type="radio" id="male" name="t_gender" value="Male">
					  <label for="male">Male</label>
					  <input type="radio" id="female" name="t_gender" value="Female">
					  <label for="female">Female</label>
					  <input type="radio" id="other" name="t_gender" value="Other">
					  <label for="other">Other</label>
				</td>			    
			  </tr>
			  
			   <tr>
			    <td>Enter Qualification:</td>
			    <td><input type="text" name="t_qua" required></td>
			  </tr>

			 <tr>
			    <td>Enter Experience:</td>
			    <td><input type="number" name="t_exp" required></td>
			  </tr>

			  
			  <tr>
			    <td>Enter Phone no:</td>
			    <td><input type="tel" name="t_phone" required></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Email Id:</td>
			    <td><input type="email" name="t_mail" required></td>
			  </tr>

			</table><br>
			
			<button type="submit" value="submit" style="width:50%; height:40px; background:#FFFF66; color:green; font-size:20px; border-radius: 12px;">Add Teacher</button>
			
			</fieldset>	
			
		</form>
</center>	
</body>

</html>
