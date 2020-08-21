<!DOCTYPE html>
<?php
	require 'connection.php';
	$count = 1;
	$query= "select student_class,count(*) as cnt from cm_student_details group by student_class";
	#$query1= "SELECT map_sname, count(*)as total from cm_mapping group by map_sname";
	$row= mysqli_query($conn, $query);
#	$row1= mysqli_query($conn, $query1);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
body{
	background: linear-gradient(to right bottom, gold, chocolate)
}

.column {
  float: left;
  width: 50%;
  padding: 10px;
  margin-top:20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
table {
				border-collapse: collapse;
				width: 100%;
			}
			th {
				background-color: #4CAF50;
				border: 1px solid #54585d;
				font-size:25px;
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
			td {
				padding: 10px;
				border: 1px solid #dddfe1;
				text-align:center;
			}
			tr {
				background-color: #FFFF99;
			}
			tr .highlight {
				background-color: #FFFF99;
			}
			h2{
	  font-size: 35px;
  background: #000000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0f9b0f, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0f9b0f, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;}
  h1{
  font-size:45px;
	background: #8E0E00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1F1C18, #8E0E00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1F1C18, #8E0E00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;}


.auto-style2 {
	text-align: center;
	font-family: "Cooper Black";
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
		  margin: 5px;
		  background-position:right;
		}

</style>
</head>
<body>

<h1 class="auto-style2">Manage Section</h1>
<button class="button1" style=" background-color: lime;"><a href="default.php" style="color:black; text-decoration:blink"><span><i class="fas fa-home"></i>Home </span></a></button>

<div class="row">
  <div class="column">
    <h2>Student by Class</h2>
   <table style="width:100%; border:2px black">
   	<tr>
   		<th>Sr. No.</th>
   		<th>Class</th>
   		<th>Total student</th>
   	</tr>
   	<?php 
   		while($result = mysqli_fetch_array($row)){ 
   	?>
   	<tr>
   		<td><?php echo $count; $count += 1;?></td>
   		<td><?php echo $result['student_class'];?></td>
   		<td><?php echo $result['cnt'];?></td><?php } ?>
   	</tr>
   </table>
  </div>
  
  <div class="column">
    <h2>Teacher by Subject</h2>
   <table style="width:100%; border:2px black;">
 	<?php 
   	
   	$query_eng = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'English'"; 
   	$query_hind = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'Hindi'";
	$query_mar = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'Marathi'";
	$query_math = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'Math'"; 
   	$query_sci = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'Science'"; 
	$query_soc = "SELECT distinct map_tid FROM cm_mapping WHERE map_sname = 'Social Studies'";
   	
   	$row1 = mysqli_query($conn, $query_eng);
   	$row2 = mysqli_query($conn, $query_hind);
   	$row3 = mysqli_query($conn, $query_mar);
   	$row4 = mysqli_query($conn, $query_math);
   	$row5 = mysqli_query($conn, $query_sci);
   	$row6 = mysqli_query($conn, $query_soc);

   	$count = 1;
   		
   	?>
   	  
   	<tr>
   		<th>Sr. No.</th>
   		<th>Subject</th>
   		<th>Total Teacher</th>
   	</tr>
   	
   	<tr>
   		<td>1.</td>
   		<td>English</td>
   		<td><?php echo $result1 = mysqli_num_rows($row1); ?></td>
   	</tr>
   	<tr>
   		<td>2.</td>	
   		<td>Hindi</td>
   		<td><?php echo $result2 = mysqli_num_rows($row2); ?></td>
   	</tr>
   	<tr>
   		<td>3.</td>
   		<td>Marathi</td>
   		<td><?php echo $result3 = mysqli_num_rows($row3); ?></td>
   	</tr>
   	<tr>	
   		<td>4.</td>
   		<td>Math</td>
   		<td><?php echo $result4 = mysqli_num_rows($row4); ?></td>
   	</tr>
   	<tr>	
   		<td>5.</td>
   		<td>Science</td>
   		<td><?php echo $result5 = mysqli_num_rows($row5); ?></td>
   	</tr>
   	<tr>	
   		<td>6.</td>
   		<td>Social Studies</td>
   		<td><?php echo $result6 = mysqli_num_rows($row6); ?></td>
   	</tr>
   </table>
  </div>
</div>

</body>
</html>
