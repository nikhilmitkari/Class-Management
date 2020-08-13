<!DOCTYPE html>
<?php
	require '../connection.php';
	if(isset($_GET['no'])){
		$count =0;
		$no = $_GET['no'];
		$name = $_GET['name'];
		$query = "SELECT a.map_tid,b.t_name,a.map_sname,a.map_clsname from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id WHERE map_clsname=" .$_GET['no'];
		$exc = mysqli_query($conn, $query);	
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
	

</style>
<title>Untitled 1</title>
</head>

<body>
	<h3>All the Subject with respective Teacher to a student <?php echo $name;?> for a class : <?php echo $no;?></h3><br>
	
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