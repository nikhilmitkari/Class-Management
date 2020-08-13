<?php
if($_SERVER['REQUEST_METHOD']== "POST"){

	require '../connection.php';
	
	$name = $_POST['t_name'];	
	$gender = $_POST['t_gender'];
	$qualification = $_POST['t_qua'];
	$experience = $_POST['t_exp'];
	$phone = $_POST['t_phone'];
	$email = $_POST['t_mail'];
	$message= " ";
	
	$query = "insert into cm_teacher_details(t_name, t_gender, t_qualification, t_experience, t_phone_no, t_mail_id) values('$name','$gender', '$qualification','$experience','$phone','$email')";
	$row = mysqli_query($conn, $query);
	
	if($row){
		$message = "Teacher information added succesfully!";
	}else{
		$message = mysqli_error($conn);
	}
	header ("Location: add_teacher.php?msg= $message");
}
?>