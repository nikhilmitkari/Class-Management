<?php
if($_SERVER['REQUEST_METHOD']== "POST"){

	require '../connection.php';
	
	$name = $_POST['std_name'];
	$rollno = $_POST['std_rollno'];
	$gender = $_POST['std_gender'];
	$class = $_POST['std_class'];
	$mob = $_POST['std_mob'];
	$email = $_POST['std_mail'];
	$lastName = $_POST['l_name'];
	$message= " ";
	
	$query = "insert into cm_student_details(student_roll_no, student_name,last_name, student_gender, student_class, student_phone_no, student_mailid) values('$rollno','$name','$lastName','$gender','$class','$mob','$email')";
	$row = mysqli_query($conn, $query);
	
	if($row){
		$message = "Student details added succesfully!";
	}else{
		$message = mysqli_error($conn);
	}
	header ("Location: add_student.php?msg= $message");
}
?>