<?php
	if(isset($_GET['roll_no'])){
	require('../connection.php');

	$query= "delete from cm_student_details where student_roll_no=" . $_GET['roll_no'] ;
	$res =mysqli_query($conn, $query);
	$message= " ";
	
	if($res){
		echo $message="Deleted Successfully!";
	}else{
		echo $message=mysqli_error($conn);
	}
	header ("Location: student_data.php?u_msg=$message");
   }
?>