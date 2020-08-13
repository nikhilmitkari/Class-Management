<!--
		*******Created by Nikhil Mitkari**********
		Dated:- 2/08/2020 11:13 pm

-->

<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'project');


$columns = array('t_id','t_name','t_gender','t_qualification', 't_experience','t_phone_no','t_mail_id');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];


$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


if ($result = $mysqli->query('SELECT * FROM cm_teacher_details ORDER BY ' .  $column . ' ' . $sort_order)) {

	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Teacher Information | Class Management</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
			<style>
			body{
				background: linear-gradient(to right bottom, gold, chocolate);
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
				color: #636363;
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
			</style>
		</head>
		<body>
		
		<h1 style="text-align:center">Teacher Information</h1>
		<button class="button" style="vertical-align:middle"><a href="add_teacher.php" style="color:white"><span>Add Teacher </span></a></button>
		<button class="button1" style="float:right; background-color: lime;"><a href="../default.php" style="color:black; text-decoration:blink"><span><i class="fas fa-home"></i>Home </span></a></button><br>
		<button class="button1" style="float:right; background-color: lime;"><a href="teacher_data.php" style="color:black; text-decoration:blink"><span><i class="fas fa-sync-alt"></i>Refresh </span></a></button>
		<p style="text-align:center"><?php
			if(isset($_GET['u_msg'])){
			echo $_GET['u_msg'] ;
		}
		?></p>
			<table>
				<tr>
					<th><a href="teacher_data.php?column=t _name&order=<?php echo $asc_or_desc; ?>">Id<i class="fas fa-sort<?php echo $column == 't_id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t _name&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 't_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t_gender&order=<?php echo $asc_or_desc; ?>">Gender<i class="fas fa-sort<?php echo $column == 't_gender' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t_qualification&order=<?php echo $asc_or_desc; ?>">Qualification<i class="fas fa-sort<?php echo $column == 't_qualification' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t_experience&order=<?php echo $asc_or_desc; ?>">Experience<i class="fas fa-sort<?php echo $column == 't_experience' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t_phone_no&order=<?php echo $asc_or_desc; ?>">Phone No<i class="fas fa-sort<?php echo $column == 't_phone_no' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="teacher_data.php?column=t_maili_&order=<?php echo $asc_or_desc; ?>">Email Addreess<i class="fas fa-sort<?php echo $column == 't_mail_id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th></th>
					<th></th>
					<!--<th>Mapping</th>
-->				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td <?php echo $column == 't_id' ? $add_class : ''; ?>><?php echo $row['t_id']; ?></td>
					<td <?php echo $column == 't_name' ? $add_class : ''; ?>><?php echo $row['t_name']; ?></td>
					<td <?php echo $column == 't_gender' ? $add_class : ''; ?>><?php echo $row['t_gender']; ?></td>
					<td <?php echo $column == 't_qualification' ? $add_class : ''; ?>><?php echo $row['t_qualification']; ?></td>
					<td <?php echo $column == 't_experience' ? $add_class : ''; ?>><?php echo $row['t_experience']; ?></td>
					<td <?php echo $column == 't_phone_no' ? $add_class : ''; ?>><?php echo $row['t_phone_no']; ?></td>
					<td <?php echo $column == 't_mail_id' ? $add_class : ''; ?>><?php echo $row['t_mail_id']; ?></td>
					<td> <a id="icon" <?php
											 echo "href='update_teacher.php?id={$row['t_id']}'";
									?> style="text-decoration:none; color:green"><i class="fa fa-cog"></i><span><?php echo " Modify";?></span></a></td>
			   	    <td> <a <?php
								echo "href='delete_teacher.php?id={$row['t_id']}'";
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