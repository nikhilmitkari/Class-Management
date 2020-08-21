<!DOCTYPE html>
<?php
	require '../connection.php';
?>
<html lang="en">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Add Student | Class Management</title>
</head>

<body style="background: linear-gradient(to right bottom, gold, chocolate)">
<center>
		
		
			<h1>Add student Details</h1><br>
			<h3>All fields are mandotory</h3><br>
			<!--<h5><a href="student_data.php">View Student Data</a></h5>-->
			<button style="margin-left:480px; width:10%; height:40px; font-size:15px"><a style="text-decoration:none" href="student_data.php">Student Details</a></button><br><br>
			
			<?php
			if(isset($_GET['msg'])){
				echo $_GET['msg'], "<br>";
			}
			?>
			<form method="post" action="backend1.php">
		<fieldset style="width:600px">
		<legend></legend>	
			<table style="width:100%">
			  <tr>
			    <td>Enter full name:</td>
			    <td><input type="text" name="std_name" placeholder="First Name..." required><input type="text" name="l_name" placeholder="Last name..."></td>
			    
			  </tr>
			  <tr>
			    <td>Enter Enrollment no:</td>
			    <td><input type="number" name="std_rollno" required></td>
			    
			  </tr>
			  <tr>
			    <td>Select Gender:</td>
			    <td>  <input type="radio" id="male" name="std_gender" value="Male">
					  <label for="male">Male</label>
					  <input type="radio" id="female" name="std_gender" value="Female">
					  <label for="female">Female</label>
					  <input type="radio" id="other" name="std_gender" value="Other">
					  <label for="other">Other</label>
				</td>			    
			  </tr>
			  
			  <tr>
			    <td>Choose Class :</td>
			    <td><select name="std_class" required>
			    	<option value="1">Class1</option>
			    	<option value="2">Class 2</option>
			    	<option value="3">Class 3</option>
					<option value="4">Class 4</option>
					<option value="5">Class 5</option>
					<option value="6">Class 6</option>
					<option value="7">Class 7</option>
					<option value="8">Class 8</option>
					<option value="9">Class 9</option>
					<option value="10">Class 10</option>
					<option value="11">Class 11</option>
					<option value="12">Class 12</option>
			    </select></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Phone no:</td>
			    <td><input type="number" name="std_mob" required></td>
			  </tr>
			  
			  <tr>
			    <td style="text-align:">Enter Email Id:</td>
			    <td><input type="email" name="std_mail" required></td>
			  </tr>

			</table><br>
			
			
			<button type="submit" value="submit" style="width:50%; height:40px; background:#FFFF66; color:green; font-size:20px; border-radius: 12px;">Add Details</button>
			
				</fieldset>			
		</form>
</center>	
</body>

</html>
