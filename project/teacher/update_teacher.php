<!DOCTYPE HTML>
<html>
<head>


<title>modify data</title>

</head>
<body style="background: linear-gradient(to right bottom, gold, chocolate)">
<center>
	<h2>Update Teacher Information</h2><br>
	<h3>Edit the respective input field, that you wished to update</h3>
	<?php
		if(isset($_GET['u_msg'])){
			echo $_GET['u_msg'], "<br>";
		}
	?>
	
	<?php
	if($_SERVER['REQUEST_METHOD']== "GET"){
		require '../connection.php';
		
		$id = $_GET['id'];
		$message=" ";

		$query = "select * from cm_teacher_details where t_id = '$id'";
		$row = mysqli_query($conn, $query);
		$res = mysqli_fetch_array($row);
		
	?>
	
	<form method="post" action="t_backend2.php?id=<?php echo $res['t_id']?>">
	<fieldset style="width:600px">
	<legend style="text-align:right"><button><a href="teacher_data.php" style="text-decoration:none">Go Back</a></button></legend>	
	<table style="width:100%">
			  
			  <tr>
			    <td>Teacher Id:</td>
			    <td><h3><?php echo $res['t_id'] ;?></h3></td>
			  </tr>
			  
			  <tr>
			    <td>Enter full name:</td>
			    <td><input type="text" name="t_name" required value = "<?php echo $res['t_name'] ;?>"> </td>
			  </tr>
	 
			  <tr>
			    <td>Select Gender:</td>
			    <td>  <input type="radio" id="male" name="t_gender" value="Male" <?php if($res['t_gender'] == 'Male'){echo "checked=checked";}?>>
					  <label for="male">Male</label>
					  <input type="radio" id="female" name="t_gender" value="Female" <?php if($res['t_gender'] == 'Female'){echo "checked=checked";}?>>
					  <label for="female">Female</label>
					  <input type="radio" id="other" name="t_gender" value="Other" <?php if($res['t_gender'] == 'Other'){echo "checked=checked";}?>>
					  <label for="other">Other</label>
				</td>			    
			  </tr>
			  
			   <tr>
			    <td>Enter Qualification Details:</td>
			    <td><input type="text" name="t_qua" value = "<?php echo $res['t_qualification'];?>" required></td>
			  </tr>
			  
			   <tr>
			    <td>Enter Experience:</td>
			    <td><input type="number" name="t_exp" value = "<?php echo $res['t_experience'];?>" required></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Phone no:</td>
			    <td><input type="tel" name="t_phone" value = "<?php echo $res['t_phone_no'];?>" required></td>
			  </tr>
			  
			  <tr>
			    <td>Enter Email Id:</td>
			    <td><input type="email" name="t_mail" value = "<?php echo $res['t_mail_id'];?>" required></td>
			  </tr>

			</table><br>
			
			<button type="submit" name="t_update" style="width:50%; height:40px; background:#FFFF66; color:green; font-size:20px; border-radius: 12px;"> Update Data</button>
			
</form>	

</center>
<?php	
	}
?>
</body>
</html>
