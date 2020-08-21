<!DOCTYPE>
<html>

<head>

<title>Class wise Student</title>
<style>
		body{
	background: linear-gradient(to right bottom, gold, chocolate)
}

	table {
				border-collapse: collapse;
				width: 90%;
				
				
			}
			th {
				background-color: #4CAF50;
				border: 1px solid #54585d;
			}
			td {
				padding: 10px;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #FFFF99;
			}
			label{
			 	font-size:40px;
			}
			.button-success
		        {
		            color: white;
		            border-radius: 4px;
		            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
		        }
		
		        .button-success {
		            background: rgb(28, 184, 65);
		            /* this is a green */
		        }
		        select, option{
		font-size:30px;
		font-family:Chiller;
}
.button1{
	display: inline-block;
					  border-radius: 4px;
					  background-color: #ff0066;
					  border: none;
					  color: #FFFFFF;
					  text-align: center;
					  font-size: 20px;
					  padding: 15px;
					  width: 200px;
					  transition: all 0.5s;
					  cursor: pointer;
					  margin: 5px;
					  background-position:right;

}



.auto-style1 {
	font-family: Algerian;
}


</style>
</head>

<body>
<button class="button1" style=" "><a href="../default.php" style="color:black; text-decoration:blink"><span><i class="fas fa-home"></i>Home </span></a></button>
<center>
<form action="" method="post">
    <span class="auto-style1">
 <label for="std_class">Choose Class :</label></span> <select style="width:130px;height:50px" name="std_class" required>
			    			<option value="" selected="selected">--select--</option>
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
						</select>
				
				<button class="button-success pure-button" type="submit" name="send" value="send" style="width:130px;height:50px">Show Students</button>
</form>
	<table>
		<tr>
			<th>Sr. No.</th>
			<th>Student Roll No</th>
			<th>Student Name</th>
			<th>Gender</th>
			<th>Class</th>
			<th>Phone No</th>
			<th>Email Address</th>
		</tr>
	<?php
			require '../connection.php';
			
			if(isset($_POST['send'])){
			$count = 1;
			$query = "select * from cm_student_details where student_class=" .$_POST['std_class'];
			$row = mysqli_query($conn, $query);
				
			 while($result = mysqli_fetch_array($row)){?>	
		<tr>
			<td><?php echo $count; $count +=1; ?></td>
			<td><?php echo $result['student_roll_no'];?></td>
			<td><?php echo $result['student_name']." " .$result['last_name'];?></td>
			<td><?php echo $result['student_gender'];?></td>
			<td><?php echo $result['student_class'];?></td>
			<td><?php echo $result['student_phone_no'];?></td>
			<td><?php echo $result['student_mailid'];?></td>
		</tr><?php }?>
	
	</table>
</center>
<?php
	}
?>
</body>

</html>
