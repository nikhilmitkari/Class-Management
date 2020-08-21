<!DOCTYPE HTML>
<html>
<head>


<title>modify data</title>
<style>
	.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

</head>
<body style="background: linear-gradient(to right bottom, gold, chocolate)">
<center>
	<h2>Update Student Information</h2><br>
	<h3>Edit the respective input field, that you wished to update</h3>
	<?php
		if(isset($_GET['u_msg'])){
			echo $_GET['u_msg'], "<br>";
		}
	?>
	
	<?php
	if($_SERVER['REQUEST_METHOD']== "GET"){
		require '../connection.php';
		
		$roll_no = $_GET['roll_no'];
		$message=" ";

		$query = "select * from cm_student_details where student_roll_no = '$roll_no'";
		$row = mysqli_query($conn, $query);
		$res = mysqli_fetch_array($row);
		
	?>
	
	<form method="post" action="backend2.php">
	<fieldset style="width:600px">
		<legend style="text-align:right"><button><a href="student_data.php" style="text-decoration:none">Go Back</a></button></legend>	
	<table style="width:100%">
			  <tr>
			    <td>Enter full name:</td>
			    <td><input type="text" name="std_name" placeholder="Last Name..." required value = "<?php echo $res['student_name'];?>"><input type="text" name="l_name" placeholder="Last Name..." value="<?php echo $res['last_name']?>"> </td>
			    
			  </tr>
			  <tr>
			    <td>Enter Enrollment no:</td>
			    <td><input type="number" name="std_rollno" value = "<?php echo $res['student_roll_no'];?>" required></td>
			    
			  </tr>
			  <tr>
			    <td>Select Gender:</td>
			    <td>  <input type="radio" id="male" name="std_gender" value="Male" <?php if($res['student_gender'] == 'Male'){echo "checked=checked";}?>>
					  <label for="male">Male</label>
					  <input type="radio" id="female" name="std_gender" value="Female" <?php if($res['student_gender'] == 'Female'){echo "checked=checked";}?>>
					  <label for="female">Female</label>
					  <input type="radio" id="other" name="std_gender" value="Other" <?php if($res['student_gender'] == 'Other'){echo "checked=checked";}?>>
					  <label for="other">Other</label>
				</td>			    
			  </tr>
			  
			  <tr>
			    <td>Choose Class :</td>
			    <td><select name="std_class" required>
			    	<option value="1" <?php if($res['student_class'] == '1'){echo "selected=selected";}?>>Class1</option>
			    	<option value="2" <?php if($res['student_class'] == '2'){echo "selected=selected";}?>>Class 2</option>
			    	<option value="3" <?php if($res['student_class'] == '3'){echo "selected=selected";}?>>Class 3</option>
					<option value="4" <?php if($res['student_class'] == '4'){echo "selected=selected";}?>>Class 4</option>
					<option value="5" <?php if($res['student_class'] == '5'){echo "selected=selected";}?>>Class 5</option>
					<option value="6" <?php if($res['student_class'] == '6'){echo "selected=selected";}?>>Class 6</option>
					<option value="7" <?php if($res['student_class'] == '7'){echo "selected=selected";}?>>Class 7</option>
					<option value="8" <?php if($res['student_class'] == '8'){echo "selected=selected";}?>>Class 8</option>
					<option value="9" <?php if($res['student_class'] == '9'){echo "selected=selected";}?>>Class 9</option>
					<option value="10" <?php if($res['student_class'] == '10'){echo "selected=selected";}?>>Class 10</option>
					<option value="11" <?php if($res['student_class'] == '11'){echo "selected=selected";}?>>Class 11</option>
					<option value="12" <?php if($res['student_class'] == '12'){echo "selected=selected";}?>>Class 12</option>
			    </select></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Phone no:</td>
			    <td><input type="tel" name="std_phone" value = "<?php echo $res['student_phone_no'];?>" required></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Email Id:</td>
			    <td><input type="email" name="std_mail" value = "<?php echo $res['student_mailid'];?>" required></td>
			  </tr>

			</table><br>
			
			<button type="submit" name="update" style="width:50%; height:40px; background:#FFFF66; color:green; font-size:20px; border-radius: 12px;"><strong>Update Data</strong></button>
			</fieldset>
</form>	
</center>

<?php	
	}
?>
</body>
</html>
