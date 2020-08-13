<!DOCTYPE HTML>

	<?php 
		require('connection.php'); 
		
		$query= "select * from cm_student_details";
		$query1 = "select * from cm_teacher_details";
		
		$result = mysqli_query($conn, $query);
		$res=mysqli_num_rows($result);
		$result1 = mysqli_query($conn, $query1);
		$res1=mysqli_num_rows($result1);
	?>
<html>
<head>
	<link href="default.css" type="text/css" rel="stylesheet">
	<title>Class Manegement</title>
	
<style>
h1{
	 font-size: 5rem;
     text-align: center;
     height:90vh;
     line-height: 15vh;
     color: #fcedd8;
   	 margin-bottom:-500px;
     font-family: 'Niconne', cursive;
       /* font-weight: 200;*/
     text-shadow: 5px 5px 0px #eb452b, 
                  10px 10px 0px #efa032, 
                  15px 15px 0px #46b59b, 
                  20px 20px 0px #017e7f, 
                  25px 25px 0px #052939, 
                  30px 30px 0px #c11a2b, 
                  35px 35px 0px #c11a2b, 
                  40px 40px 0px #c11a2b, 
                  45px 45px 0px #c11a2b;
}
</style>
	
</head>
<body>
<center>
<h1>Class Management</h1><br>
  
<nav>
  <ul>
    <li><a><span>Home</span></a></li>
    <li><a style="text-decoration:none" href="student/student_data.php"><span>Student(<?php echo $res;?>)</span></a></li>
    <li><a style="text-decoration:none" href="teacher/teacher_data.php"><span>Teacher(<?php echo $res1;?>)</span></a></li>
    <li><a style="text-decoration:none" href="mapping/teacher_mapping.php"><span>Teacher Mapping</span></a></li>
    <li><a style="text-decoration:none" href="manage_section.php"><span>Total Count</span></a></li>
  </ul>
</nav>
<p><span>Created By 201_Nikhil Mitkari</span></p>
</center>
</body>
</html>