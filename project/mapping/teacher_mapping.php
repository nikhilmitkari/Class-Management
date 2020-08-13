<!DOCTYPE html>
<?php
	require '../connection.php';
	
	$query = "SELECT * FROM cm_subject";
	$query1 = "SELECT * FROM cm_teacher_details";
	$row = mysqli_query($conn, $query);
	$row2 = mysqli_query($conn, $query1);
#	$res = mysqli_fetch_array($row);
?>


<html lang="en">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style>
	fieldset{
		width: auto; 
		background-color:#CCFFFF
	}
	.button1 {
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
	}

	legend{
	background-color: #CCFF99; 
	padding:5px; 
	border:1px black solid;
	color:black;
	text-decoration:blink; 
	}
	
	table{
	}
	th{
	background-color: #4CAF50;
	border: 1px solid #54585d;
	}
	td{
	padding: 10px;
	color: #636363;
	border: 1px solid #dddfe1;
	}
	legend{
	text-align:left;
}

</style>
<title>Teacher Allocation | Class Mangement</title>
</head>

<body style="background: linear-gradient(to right bottom, gold, chocolate)">
	
		<h1 style="text-align:center">Subject And Class Allocation</h1>

		<button class="button1" style="margin-left:950px; background-color: lime;"><a href="../default.php" style="color:black; text-decoration:blink"><span><i class="fas fa-home"></i>Home</span></a></button><br>
		<br>

		<center>
		<fieldset name="Group1" style=" width:50%">
				<legend style="text-align:left;"><strong>Allocate subject and Class </strong></legend>
				<p style="color: lime; font-style: oblique;"><?php
							if(isset($_GET['toast'])){
								echo $_GET['toast'], "<br>";
							}	
						?></p>
				<form method="post" action="process.php">
						<table>
								<tr>
								<td>Select Teacher: </td>
								<td><select name="sel_teacher" required>
									<option value="err">--Select--</option>
									<?php
										while($result= mysqli_fetch_array($row2)){
									?>
									<option value="<?php echo $result['t_id'];?>"><?php echo $result['t_name'];?></option> <?php } ?>
								</select></td>
							</tr>

								<tr>
								 <td>Select Class: </td>
								 <td><select name="sel_class" required>
								    <option value="err" disabled="disabled" selected="selected" hidden="hidden">--Select-</option>
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
								<td>Select Subject: </td>
								<td><select name="sel_sub" required>
									<option value="err">--Select--</option>
									<?php
										while($res= mysqli_fetch_array($row)){
									?>
									<option value="<?php echo $res['sub_name']?>"><?php echo $res['sub_name']?></option> <?php } ?>
								</select></td>
							</tr>
						</table><br>
						<button type="submit" value="allocate" name="allocate" style="width:50%; height:40px; background:#FFFF66; color:green; font-size:20px; border-radius: 12px; text-align:center"><strong>Allocate</strong></button><br>
				</form>
						
						<p style="color:red"><?php if(isset($_GET['toast_err'])){
								echo $_GET['toast_err'],"<br>";
							}?></p>
			</fieldset></center>
			<hr><hr>
			
	<h1 style=" text-align:center; color:purple">View Teacher by subject and Class</h1><br>
<center>
<form method="post" action="#">
	Select Subject: <select name="fsub">
						<option value="">--Select--</option>
						<?php
							require '../connection.php';
							$query6 = "select * from cm_subject";
							$exc = mysqli_query($conn, $query6);
							while($res9 = mysqli_fetch_array($exc)){
						?>
						<option value="<?php echo $res9['sub_name']?>"><?php echo $res9['sub_name']?></option> <?php } ?>
					</select>
	 <span lang="en-gb">&nbsp;&nbsp;&nbsp;&nbsp; </span>Select Class:  <select name="fclass">
					    <option value="">--Select-</option>
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
					</select><span lang="en-gb">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>				

			<button type="submit" name="filter">Search</button><br><br>
	</form>		
			<?php
			if(isset($_POST['filter'])){
				require '../connection.php';
				
				$count = 0;
				$sub = $_POST['fsub'];
				$clas = $_POST['fclass'];
				$query5 = "";
				
				if($sub and $clas){
					$query5 = "SELECT a.map_tid, b.t_name, a.map_sname, a.map_clsname from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id  WHERE map_clsname= '$clas' AND map_sname = '$sub'";
				}else if(!empty($sub) ){
					$query5 = "SELECT a.map_tid, b.t_name, a.map_sname, a.map_clsname from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id  WHERE map_sname = '$sub'";
				}else if(!empty($clas)){
					$query5 = "SELECT a.map_tid, b.t_name, a.map_sname, a.map_clsname from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id  WHERE map_clsname= '$clas'";
				} 
				$map = mysqli_query($conn, $query5);
			?>
			<h2>You have following teachers for the <?php if($sub){echo "subject: " .$sub;}  if($clas){echo " Class: " .$clas;}?></h2>
			
			<table style="border:1px black double">
				<tr>
					<th>Sr No.</th>
					<th>Teacher Name</th>
					<th>Subject</th>
					<th>Class</th>
				</tr>
				<?php while($result = mysqli_fetch_array($map)){?>
				<tr style="color:black;background-color:#FFFF99">
					<td style="color:black"><?php echo $count+1; $count += 1; ?></td>
					<td style="color:black"><?php echo $result['t_name']?></td>
					<td style="color:black"><?php echo $result['map_sname']?></td>
					<td style="color:black"><?php echo $result['map_clsname']?></td><?php }?>
				</tr>
			</table>
	<?php }?>
	</center>
</body>

</html>
<!--SELECT a.map_tid,b.t_name,a.map_sname,a.map_clsname  from cm_mapping a inner join cm_teacher_details b on a.map_tid=b.t_id  WHERE map_sname = 'Science' AND map_clsname='0'-->