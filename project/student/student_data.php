<!--
		*******Created by Nikhil Mitkari**********
		Dated:- 2/08/2020 11:13 pm

-->

<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'project');


$columns = array('student_roll_no','student_name','student_gender','student_class','student_phone_no','student_mailid');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];


$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


if ($result = $mysqli->query('SELECT * FROM cm_student_details ORDER BY ' .  $column . ' ' . $sort_order)) {

	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Student Information | Class Management</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
			<style>
			body{
	background: linear-gradient(to right bottom, gold, chocolate)
}
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
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
			.button, .button1 {
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
					
					.button span {
					  cursor: pointer;
					  display: inline-block;
					  position: relative;
					  transition: 0.5s;
					}
					
					.button span:after {
					  content: '\00bb';
					  position: absolute;
					  opacity: 0;
					  top: 0;
					  right: -20px;
					  transition: 0.5s;
					}
					
					.button:hover span {
					  padding-right: 25px;
					}
					
					.button:hover span:after {
					  opacity: 1;
					  right: 0;
					}
					td a {
							text-decoration:none;
							color: #636363;
						}
			</style>
		</head>
		<body>
		
		<h1 style="text-align:center">Student Information</h1>

		<button class="button" style="vertical-align:middle"><a href="add_student.php" style="color:white"><span>Add Student </span></a></button>
		<button class="button1" style="float:right; background-color: lime;"><a href="../default.php" style="color:black; text-decoration:blink"><span><i class="fas fa-home"></i>Home </span></a></button><br>
		<button class="button1" style="float:right; background-color: lime;"><a href="student_data.php" style="color:black; text-decoration:blink"><i class="fas fa-sync-alt"></i><span>Refresh </span></a></button>
		<p style="text-align:center"><?php
			if(isset($_GET['u_msg'])){
			echo $_GET['u_msg'] ;
		}
		?></p>
			<table>
				<tr>
					<th><a href="student_data.php?column=student_roll_no&order=<?php echo $asc_or_desc; ?>">Enrollment No<i class="fas fa-sort<?php echo $column == 'student_roll_no' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="student_data.php?column=student _name&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'student_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="student_data.php?column=student_gender&order=<?php echo $asc_or_desc; ?>">Gender<i class="fas fa-sort<?php echo $column == 'student_gender' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="student_data.php?column=student_class&order=<?php echo $asc_or_desc; ?>">Class<i class="fas fa-sort<?php echo $column == 'student_class' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="student_data.php?column=student_phone_no&order=<?php echo $asc_or_desc; ?>">Phone No<i class="fas fa-sort<?php echo $column == 'student_phone_no' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="student_data.php?column=student_mailid&order=<?php echo $asc_or_desc; ?>">Email Addreess<i class="fas fa-sort<?php echo $column == 'student_mailid' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th></th>
					<th></th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'student_roll_no' ? $add_class : ''; ?> > <?php echo $row['student_roll_no']; ?></td>
					<td<?php echo $column == 'student_name' ? $add_class : ''; ?>><a <?php echo "href='student_teacher.php?no={$row['student_class']}&&name={$row['student_name']}'";?> ><?php echo $row['student_name']; ?></a></td>
					<td<?php echo $column == 'student_gender' ? $add_class : ''; ?>><?php echo $row['student_gender']; ?></td>
					<td<?php echo $column == 'student_class' ? $add_class : ''; ?>><?php echo $row['student_class']; ?></td>
					<td<?php echo $column == 'student_phone_no' ? $add_class : ''; ?>><?php echo $row['student_phone_no']; ?></td>
					<td<?php echo $column == 'student_mailid' ? $add_class : ''; ?>><?php echo $row['student_mailid']; ?></td>
					<td> <a id="icon" <?php
											 echo "href='update_data.php?roll_no={$row['student_roll_no']}'";
									?> style="text-decoration:none; color:green"><i class="fa fa-cog"></i><span><?php echo " Modify";?></span></a></td>
			   	    <td> <a <?php
								echo "href='delete_data.php?roll_no={$row['student_roll_no']}'";
							?> style="text-decoration:none; color:red"><i class="fa fa-trash"></i><span><?php echo " Delete";?></span></a></td>
				</tr>
				<?php endwhile; ?>
			</table>
		</body>
	</html>
	<?php
	$result->free();
}
?>