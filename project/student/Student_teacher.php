<!DOCTYPE html>
<?php
	require '../connection.php';
	if(isset($_GET['no'])){
		$count =0;
		$no = $_GET['no'];
		$name = $_GET['std_id'];
		$query = "SELECT a.map_tid,b.t_name,a.map_sname,a.map_clsname from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id WHERE map_clsname=" .$_GET['no'];
		$query1 = "select * from cm_student_details where student_roll_no =" .$_GET['std_id'];
		$exc = mysqli_query($conn, $query);
		$row= mysqli_query($conn, $query1);	
?>
<html lang="en">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style>
	td {
	border:1px gray double;
	}
	th{
	border-right:1px black groove;
}
body{
	background: linear-gradient(to right bottom, gold, chocolate)
}
table {
				border-collapse: collapse;
				width: 100%;
			}
			th {
				background-color: #4CAF50;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #FFFF99;
			}
			tr .highlight {
				background-color: #FFFF99;
}
</style>
<title>Student details</title>
</head>

<body>
	<h3>All the Subject with respective Teacher to a following Student : </h3><br>
	<center><fieldset name="Group1" style="width:600px; text-align:center;">
				<legend>Student details</legend>

				<table>
				<tr>
					<td></td>
					<td style=" text-align:right"><button><a href="student_data.php">Go Back</a></button></td>
				</tr>
				<?php while($result = mysqli_fetch_array($row)){ ?>
					<tr>
						<td style="text-align:right">Enrollment No: </td>
						<td style="color:red"><?php echo $result['student_roll_no'];?></td>
					</tr>
					<tr>	
						<td style="text-align:right">Student Name: </td>
						<td style="color:red"><?php echo $result['student_name'] ." " .$result['last_name'];?></td>
					</tr>
					<tr>	
						<td style="text-align:right">Gender: </td>
						<td style="color:red"><?php echo $result['student_gender'];?></td>
					</tr>
					<tr>	
						<td style="text-align:right">Class: </td>
						<td style="color:red"><?php echo $result['student_class'];?></td>

					</tr>	
						<td style="text-align:right">Email Address: </td>
						<td style="color:red"><?php echo $result['student_mailid'];?></td>
					<tr>	
						<td style="text-align:right">Phone No: </td>
						<td style="color:red"><?php echo $result['student_phone_no'];?></td>
					</tr>
				</table><?php }?>
			</fieldset></center>
	
	<table style="border:1px black solid">
		<tr>
			<th>Sr. No</th>
			<th>Teacher</th>
			<th>Subject</th>
		</tr>
		
		<?php 
			while($result = mysqli_fetch_array($exc)){
		?>
		<tr>
			<td><?php echo $count +1; $count += 1;?></td>
			<td><?php echo $result['t_name'];?></td>
			<td><?php echo $result['map_sname'];?></td><?php }?>
		</tr>
	</table>

</body>
<?php
	}
?>
</html>